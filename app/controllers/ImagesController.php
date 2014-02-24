<?php

class ImagesController extends Controller{
    private $limit, $dirname, $selectedDirname, $width, $height, $extension;
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

        // generate image
        $this->f3->set('img','clkqdsnc');


        //view
        if ($limit <= 1) {
            $this->displayOne($dirname, $selectedDirname, $width, $height, $extension);
        } else {
            $this->listImages($limit, $selectedDirname , $width , $height, $extension);
        }

    }

    function displayOne () {
        $this->generateImage($dirname, $selectedDirname, $width, $height, $img, $extension);
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

    function zip ()
    {
        # code...
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
        $img = new \Image($images[$index],FALSE, 'hello');
        //resize
        $img->resize($width, $height);
    }

}

