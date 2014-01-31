<?php 

	class AdminController extends Controller {

		function admin(){
			$username = trim(htmlentities($this->f3->get('POST.username')));
			$password = trim(htmlentities($this->f3->get('POST.password')));
			// $this->f3->set('SESSION.username', null);
			if($username && $password){
				$static = new StaticModel();
				if($static->getUser(array('username'=>$username, 'password'=>$password))){
					$this->f3->set('SESSION.username', $username);
					$this->f3->set('message', 'Welcome, '.$username.' !');
				}else{
					$this->f3->set('message', 'Wrong username or password');
				}
			}
			$this->f3->set('contentType', 'html');
			$this->f3->set('currentPage', 'admin');
			$this->f3->set('view', 'back/staticPages/admin.htm');
		}

		function add(){
			$dataFile = $this->f3->get('POST.dataFile');
			// $web->receive(function($file) {
			// 	$this->f3->set('data', $file);
			// 	$this->f3->set('ok', 'ok!');
			// 	$this->f3->set('customFile', 'back/staticPages/test.htm');
			// }, false, true);
			
			// $file = $_FILES['dataFile'];
			// $this->f3->set('data', $file);
		}

		function create(){

		}

		function update(){

		}

		function delete(){

		}

	}

?>