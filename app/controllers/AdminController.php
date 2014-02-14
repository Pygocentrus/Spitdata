<?php 

	class AdminController extends Controller {

		public function admin(){
			$username = trim(htmlentities($this->f3->get('POST.username')));
			$password = trim(htmlentities($this->f3->get('POST.password')));
			// $this->f3->set('SESSION.username', null);
			if($username && $password){
				$admin = new Admin();
				if($admin->getUser(array('username'=>$username, 'password'=>$password))){
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

		public function add($f3){
			$overwrite = true;
			$slug      = true;
			$fichier=\Web::instance()->receive(function($file){
			        
			        print_r($file);
			        
			    },
			    $overwrite,
			    $slug
			);
			exit;
			// $this->f3->set('contentType', 'html');
			// $this->f3->set('currentPage', 'admin');
			// $this->f3->set('view', 'back/staticPages/test.htm');
		}

		public function create($filename){

		}

		public function update(){

		}

		public function delete(){
			$allowedContents = array('fbpost', 'tweet', 'dates', 'location', 'user', 'item', 'article');
			$rawContentType  = $this->f3->get('PARAMS.contentType');
			$contentType     = ($rawContentType!=null) ? trim(htmlentities($rawContentType)) : null;	
			if($contentType!=null){
				if(in_array($contentType, $allowedContents)){
					$admin = new Admin($contentType);
					$status = $admin->deleteAll();
					$this->setStatus(array('messageType'=>'1', 'flashMessage'=>'Table '.$contentType.' cleared.'));
				}else
					$this->setStatus(array('messageType'=>'0', 'flashMessage'=>'Invalid content type'));
			}else
				$this->setStatus(array('messageType'=>'0', 'flashMessage'=>'Invalid content type'));
			$this->f3->set('contentType', 'html');
			$this->f3->set('currentPage', 'admin');
			$this->f3->set('view', 'back/staticPages/admin.htm');
		}

		public function setStatus($params){
			$this->f3->set('messageType', $params['messageType']);
			$this->f3->set('flashMessage', $params['flashMessage']);
		}

	}

?>