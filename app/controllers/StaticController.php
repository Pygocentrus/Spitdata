<?php 

class StaticController extends Controller {
	
	function index(){
		$this->f3->set('currentPage', 'home');
        $this->f3->set('view', 'back/staticPages/home.htm');
	}

	function generator(){
		$this->f3->set('currentPage', 'generator');
		$this->f3->set('view', 'back/staticPages/generator.htm');	
	}

	function api(){
		$this->f3->set('currentPage', 'api');
		$this->f3->set('view', 'back/staticPages/api.htm');
	}

}

?>