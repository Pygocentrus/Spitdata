<?php

class ImagesController extends Controller{

	function index(){

        //détermination de la limite
        $rawImageLimit = trim(htmlentities($this->f3->get('PARAMS.nbImages')));
        $userLimit    = ($rawImageLimit!=null) ? $rawImageLimit : 1;
        if(preg_match('#^[1-9][0-9]*$#', $userLimit)) {
                $limit = $userLimit;
        } else {
            $limit = 1;
        }
        $this->f3->set('limit', $limit);
        // echo $limit;

        //liste urls du dossier
        $content = $this->f3->get('PARAMS.content');
        $dirname = 'app/views/img/';
        $dir = opendir($dirname);
        $listUrls = array();
        $images = array();
        $counter = 0;
        while($file = readdir($dir)) {
            if($file != '.' && $file != '..' && !is_dir($dirname.$file) && preg_match('#.jpg$|.png$|.jpeg$|.gif$#', $file))
            {
                $counter++;
                $this->f3->set('file', 'img/'.$file);
                $img = new \Image($this->f3->get('file'),TRUE);
                array_push($images, $img);
            }
        }
        closedir($dir);
        // print_r($images);
        // print_r($listUrls);

        //resize
        $width = $this->f3->get('PARAMS.width');
        $height = $this->f3->get('PARAMS.height');
        $srcs = array();
        foreach($images as $image) {
            $src = $this->f3->base64($image->restore()->resize($width,$height,TRUE)->dump(),'image/splitdata-image');
            array_push($srcs, $src);
        }
        $this->f3->set('srcs', $srcs);

        //appel à la vue
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

