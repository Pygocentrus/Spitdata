<?php

class StaticController extends Controller {

	public function index(){
		$this->f3->set('currentPage', 'home');
		$this->f3->set('contentType', 'html');
        $this->f3->set('view', 'back/staticPages/home.htm');
	}

	public function generator(){
		$this->f3->set('currentPage', 'generator');
		$this->f3->set('contentType', 'html');
		$this->f3->set('view', 'back/staticPages/generator.htm');
	}

	public function api(){
		$this->f3->set('currentPage', 'api');
		$this->f3->set('contentType', 'html');
		$this->f3->set('view', 'back/staticPages/api.htm');
	}

	public function notFound(){
		$this->f3->set('currentPage', '404');
		$this->f3->set('contentType', 'html');
		$this->f3->set('view', 'back/staticPages/404.htm');
	}
}

?>