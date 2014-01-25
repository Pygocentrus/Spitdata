<?php 

class PostController extends Controller{
	
	function index(){
		$allowedPostTypes = array('article', 'fbPost', 'tweet');
		$postType         = trim(htmlentities($this->f3->get('PARAMS.postType')));
		$rawPostLimit     = trim(htmlentities($this->f3->get('PARAMS.nbPosts')));
		$postLimit        = ($rawPostLimit!=null) ? $rawPostLimit : 1;
		if(in_array($postType, $allowedPostTypes) && preg_match('#^[1-9][0-9]{0,100}$#', $postLimit)){
			$posts = new Post($this->db, $postType);
			$this->f3->set('posts', $posts->all($postLimit));			
			$this->f3->set('currentPage', 'post');
			$this->f3->set('contentType', 'json');
			$this->f3->set('finalView', 'back/post/'.$postType.'.json');
		}else{
			$this->f3->set('currentPage', '404');
			$this->f3->set('contentType', 'html');
			$this->f3->set('view', 'back/staticPages/404.htm');
		}
	}

	function create(){

	}

	function update(){

	}

	function delete(){
		
	}

}

?>