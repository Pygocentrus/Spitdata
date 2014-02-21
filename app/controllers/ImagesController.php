<?php

class ImagesController extends Controller{

	function index(){

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

        //view
        if ($limit <= 1) {

            // listing files
            $dir = opendir($dirname);
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
            $img = new \Image($images[$index],FALSE, $this->f3->get('UI'));

            //resize
            $img->resize($width, $height);

            // render
            $img->render($extension);

        } else {

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

    }

	function create(){

	}

	function update(){

	}

	function delete(){

	}

}

