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

		public function add(){
			// $f3->set('UPLOADS','uploads/'); // don't forget to set an Upload directory, and make it writable!
			$web = new \Web();
			$overwrite = true; // set to true, to overwrite an existing file; Default: false
			$slug      = true; // rename file to filesystem-friendly version
			$files = $web->receive(function($file){
			        /* looks like:
			          array(5) {
			              ["name"] =>     string(19) "csshat_quittung.png"
			              ["type"] =>     string(9) "image/png"
			              ["tmp_name"] => string(14) "/tmp/php2YS85Q"
			              ["error"] =>    int(0)
			              ["size"] =>     int(172245)
			            }
			        */
			        // $file['name'] already contains the slugged name now

			        // File size must be < 2MB
			        if($file['size'] > (2 * 1024 * 1024))
			            return false; // this file is not valid, return false will skip moving it
			        return true; // allows the file to be moved from php tmp dir to your defined upload dir
			    },
			    $overwrite,
			    $slug
			);
			$this->f3->set('contentType', 'html');
			$this->f3->set('currentPage', 'admin');
			$this->f3->set('view', 'back/staticPages/test.htm');
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