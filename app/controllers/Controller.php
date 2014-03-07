<?php

class Controller {

	protected $f3;
	protected $db;

	function __construct() {
        $f3=Base::instance();
		$this->f3=$f3;
	}

	function beforeroute() {
		$this->f3->set('message','');
	}

	function afterroute() {
		if($this->f3->get('contentType')=='json')
			echo Template::instance()->render($this->f3->get('finalView'), 'application/json');
		else if($this->f3->get('contentType')=='html')
			echo Template::instance()->render('back/layout.htm');
		else if ($this->f3->get('customFile') != '')
			echo Template::instance()->render($this->f3->get('customFile'));
	}

	protected function setStatus($params){
		$this->f3->set('messageType', $params['messageType']);
		$this->f3->set('flashMessage', $params['flashMessage']);
	}

	protected function setRoutingVars($params){
		$this->f3->set('contentType', $params['type']);
		$this->f3->set('currentPage', $params['page']);
		$this->f3->set('view', $params['view']);
	}

}