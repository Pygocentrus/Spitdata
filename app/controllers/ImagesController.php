<?php

class ImagesController extends Controller{
    public $limit, $dirname, $selectedDirname, $width, $height, $extension, $img;
	function index(){

        global $img;

        //imageLimit params
        $rawImageLimit = trim(htmlentities($this->f3->get('PARAMS.nbImages')));
        $imageLimit    = ($rawImageLimit!=null) ? $rawImageLimit : 1;
        $limit = (preg_match('#^[1-9][0-9]*$#', $imageLimit)) ? $imageLimit : 1;

        // extension
        $extensionParams = strtolower($this->f3->get('PARAMS.extension'));
        $extension = ($extensionParams == 'jpg') ? 'jpeg' :
            (($extensionParams == 'gif') ? 'gif' :
            (($extensionParams == 'jpeg') ? 'jpeg' : 'png'));

        // selectedDirname
        $selectedDirname = trim(htmlentities($this->f3->get('PARAMS.dirname'))).'/';
        $dirname = 'app/views/img/'.$selectedDirname;

        // width and height
        $width = $this->f3->get('PARAMS.width');
        $height = $this->f3->get('PARAMS.height');

        // action
        if ($this->f3->get('PARAMS.zip')== 'zip' && $limit <= 20) {
            $this->zip($limit, $dirname, $selectedDirname, $width, $height, $extension, $img);
        } else {
            if ($limit <= 1) {
                $this->displayOne($dirname, $selectedDirname, $width, $height, $extension, $img);
            } else {
                $this->listImages($limit, $selectedDirname , $width , $height, $extension);
            }
        }

    }

    function displayOne ($dirname, $selectedDirname, $width, $height, $extension, $img) {

        // generate image
        $this->generateImage($dirname, $selectedDirname, $width, $height, $img, $extension);
        $img = $this->f3->get('img');

        // render
        $img->render($extension);
    }

    function listImages ($limit, $selectedDirname , $width , $height, $extension) {

        // params
        $limitArray = [];
        for ($i=0;  $i < $limit ; $i++)
            array_push($limitArray, $i);
        $this->f3->set('limitArray',$limitArray);
        $this->f3->set('dirnames',$selectedDirname);
        $this->f3->set('width',$width);
        $this->f3->set('height',$height);
        $this->f3->set('extension',$extension);

        //render
        $this->f3->set('finalView', 'back/image/image.json');
        $this->f3->set('contentType', 'json');
    }

    function zip ($limit, $dirname, $selectedDirname, $width, $height, $extension, $img) {

        $this->generateImage($dirname, $selectedDirname, $width, $height, $img, $extension);

        // temporary folder
        $tmp = $this->f3->get('TMP');
        $foldername = rand(100000000,999999999);
        $url = $tmp.$foldername;
        mkdir($url);
        $zip = new ZipArchive();
        $zipName = 'Splitdata-Images-'.$width.'-'.$height;
        if (file_exists($tmp.$zipName.'.zip')) {
            unlink($tmp.$zipName.'.zip');
        }
        if($zip->open($tmp.$zipName.'.zip', ZipArchive::CREATE) === true) {
            for ($i=0; $i < $limit; $i++) {
                $this->generateImage($dirname, $selectedDirname, $width, $height, $img, $extension);
                $img = $this->f3->get('img');
                $imgString = $img->dump();
                $newImg = imagecreatefromstring($imgString);
                $file = $url.'/image'.$foldername.$i.'.'.$extension;
                if ($extension == 'jpeg' || $extension == 'jpg') {
                    imagejpeg($newImg, $file);
                } else if ($extension == 'gif') {
                    imagegif($newImg, $file);
                } else {
                    imagepng($newImg, $file);
                }
                $zip->addFile($file, $zipName.'/image-'.$width.'-'.$height.'-'.($i+1).'.'.$extension);
        }
        $zip->close();
        } else {
            echo 'Impossible d&#039;ouvrir &quot;Zip.zip<br/>';
        }

        $web = \Web::instance();
        $sent = $web->send($tmp.$zipName.'.zip', NULL, 512, true);
        if ( !$sent)  { echo "erreur"; };
        $this->deleteFloder($url);
        unlink($tmp.$zipName.'.zip');
    }

	function create(){

	}

	function update(){

	}

	function delete(){

	}

    function generateImage($dirname, $selectedDirname, $width, $height, $img, $extension)
    {
        // listing files
        if (is_dir($dirname)) {
            $dir = opendir($dirname);
        } else {
            $this->f3->reroute('/404');
        }
        $images = array();
        $counter = 0;
        while($file = readdir($dir)) {
            if($file != '.' && $file != '..' && !is_dir($dirname.$file) && preg_match('#.jpg$|.png$|.jpeg$|.gif$#', $file)) {
                $counter++;
                $img = 'img/'.$selectedDirname.$file;
                array_push($images, $img);
            }
        }
        closedir($dir);
        //create image
        $index = array_rand($images, 1);
        $img = new \Image($images[$index],FALSE, 'hello');
        //resize
        $img = $img->resize($width, $height);
        $this->f3->set('img',$img);
    }

    function deleteFloder ($directory, $empty = false) {
    if(substr($directory,-1) == "/") {
        $directory = substr($directory,0,-1);
    }

    if(!file_exists($directory) || !is_dir($directory)) {
        return false;
    } elseif(!is_readable($directory)) {
        return false;
    } else {
        $directoryHandle = opendir($directory);

        while ($contents = readdir($directoryHandle)) {
            if($contents != '.' && $contents != '..') {
                $path = $directory . "/" . $contents;

                if(is_dir($path)) {
                    supprimer_dossier($path);
                } else {
                    unlink($path);
                }
            }
        }

        closedir($directoryHandle);

        if($empty == false) {
            if(!rmdir($directory)) {
                return false;
            }
        }

        return true;
    }
}

}

