<?php

class ImagesController extends Controller{

	function index(){

        //imageLimit params
        $rawImageLimit = trim(htmlentities($this->f3->get('PARAMS.nbImages')));
        $imageLimit    = ($rawImageLimit!=null) ? $rawImageLimit : 1;
        if(preg_match('#^[1-9][0-9]*$#', $imageLimit)) {
            $limit = $imageLimit;
        } else {
            $limit = 1;
        }
        $this->f3->set('limit', $limit);

        //list urls dir
        $content = $this->f3->get('PARAMS.content');
        $dirname = 'app/views/img/';
        $dir = opendir($dirname);
        $images = array();
        $counter = 0;
        while($file = readdir($dir)) {
            if($file != '.' && $file != '..' && !is_dir($dirname.$file) && preg_match('#.jpg$|.png$|.jpeg$|.gif$#', $file) && $counter < $imageLimit) {
                $counter++;
                $this->f3->set('file', 'img/'.$file);
                $img = new \Image($this->f3->get('file'),TRUE);
                array_push($images, $img);
            }
        }
        closedir($dir);

        //resize
        $width = $this->f3->get('PARAMS.width');
        $height = $this->f3->get('PARAMS.height');
        $srcs = array();
        foreach($images as $image) {
            $src = $this->f3->base64($image->restore()->resize($width,$height,TRUE)->dump(),'image/splitdata-image');
            array_push($srcs, $src);
        }
        $this->f3->set('srcs', $srcs);

        //view
		$this->f3->set('contentType', 'html');
		$this->f3->set('currentPage', 'admin');
		$this->f3->set('view', 'back/staticPages/image.htm');
    }

	function create(){

	}

	function update(){

	}

	function delete(){

	}

}

