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
			$this->f3->set('currentPage', 'admin');
			$this->f3->set('view', 'back/staticPages/admin.htm');
		}

		function download(){
			
		}

		function create(){

		}

		function update(){

		}

		function delete(){

		}

	}

?>