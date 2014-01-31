<?php

class Controller {

	protected $f3;
	protected $db;

	function beforeroute() {
		$this->f3->set('message','');
	}

	function afterroute() {	
		if($this->f3->get('contentType')=='json')
			echo Template::instance()->render($this->f3->get('finalView'), 'application/json');
		else if($this->f3->get('contentType')=='html')
			echo Template::instance()->render('back/layout.htm');
		else
			echo Template::instance()->render($this->f3->get('customFile'));
	}

	function __construct() {
        $f3=Base::instance();
		$this->f3=$f3;
	}
}
