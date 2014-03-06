<?php 

class PostController extends Controller{
	
	public function index(){
		$allowedPostTypes = array('article', 'fbpost', 'tweet');
		$postType         = trim(htmlentities($this->f3->get('PARAMS.postType')));
		$rawPostLimit     = trim(htmlentities($this->f3->get('PARAMS.nbPosts')));
		$postLimit        = ($rawPostLimit!=null) ? $rawPostLimit : 1;
		if(in_array($postType, $allowedPostTypes) && preg_match('#^[1-9][0-9]{0,100}$#', $postLimit)){
			$posts = new Post($postType);
			$this->f3->set('posts', $posts->all($postLimit));
			$this->f3->set('contentType', 'json');
			$this->f3->set('finalView', 'back/post/'.$postType.'.json');
		}else{
			$this->f3->set('currentPage', '404');
			$this->f3->set('contentType', 'html');
			$this->f3->set('view', 'back/staticPages/404.htm');
		}
	}

}

?>