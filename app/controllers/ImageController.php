<?php

class ImageController extends Controller{

	function index(){
		$image         = new Image();
		$rawImageLimit = trim(htmlentities($this->f3->get('PARAMS.nbImages')));
		$userLimit    = ($rawImageLimit!=null) ? $rawImageLimit : 1;
		if(preg_match('#^[1-9][0-9]*$#', $userLimit))
            $this->f3->set('limit', $userLimit);
        else
        	$this->f3->set('limit', 1);
        $this->f3->set('images',$image->all($this->f3->get('limit')));
        // $this->f3->set('images','superimage.jpg');
        // $this->f3->set('images',$image->all());

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

?>