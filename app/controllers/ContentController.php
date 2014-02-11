<?php 

class ContentController extends Controller {
	
	public function index() {
		$allowedContentTypes = array('location', 'dates', 'item');
		$postType            = trim(htmlentities($this->f3->get('PARAMS.contentType')));
		$rawContentLimit     = trim(htmlentities($this->f3->get('PARAMS.nbContents')));
		$contentLimit        = ($rawContentLimit!=null) ? $rawContentLimit : 1;
		if(in_array($postType, $allowedContentTypes) && preg_match('#^[1-9][0-9]{0,100}$#', $contentLimit)) {
			$posts = new Content($postType);
			$this->f3->set('contents', $posts->all($contentLimit));	
			$this->f3->set('currentPage', 'content');
			$this->f3->set('contentType', 'json');
			$this->f3->set('finalView', 'back/content/'.$postType.'.json');
		}else {
			$this->f3->set('currentPage', '404');
			$this->f3->set('contentType', 'html');
			$this->f3->set('view', 'back/staticPages/404.htm');
		}
	}

	public function create(){

	}

	public function update(){

	}

	public function delete(){
		
	}

}

?>