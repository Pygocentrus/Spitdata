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

	public function getContents($params){
		$contents = new Content($params['contentType']);
        return $contents->all($params['limit']);
	}

	public function getMovies(){
		$web = \Web::instance();
		$url = "https://api.themoviedb.org/3/discover/movie?api_key=55263b0ca3e0979c6508a2b35e765994";
		$rawYear = trim(htmlentities($this->f3->get('PARAMS.year')));
		$year = (!empty($rawYear) && preg_match('/^[1-2][0-9]{3}$/', $rawYear)) ? $rawYear : null;
		if(!is_null($year)){
			$result = $web->request($url."&year=".$year);
			if($result)
				$this->f3->set('movies', $result);
			else
				$this->f3->reroute('/api');
			print_r($result['body']);
		}else
			$this->f3->reroute('/');
		exit;
	}

}

?>