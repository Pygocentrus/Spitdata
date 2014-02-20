<?php

	class AdminController extends Controller {

		public function admin(){
			$username = trim(htmlentities($this->f3->get('POST.username')));
			$password = trim(htmlentities($this->f3->get('POST.password')));
			$this->f3->set('SESSION.username', null);
			if($username && $password){
				$admin = new Admin();
				if($admin->getUser(array('username'=>$username, 'password'=>$password))){
					$this->f3->set('SESSION.username', $username);
					$this->f3->set('message', 'Welcome, '.$username.' !');
					$this->f3->set('rowNumbers', $admin->getRowCounter());
				}else{
					$this->f3->set('message', $this->f3->get('authError'));
				}
			}
			$this->setRoutingVars(array('type'=>'html', 'page'=>'admin', 'view'=>'back/staticPages/admin.htm'));
		}

		public function add(){
			$file            = $_FILES['dataFile'];
			$fileName        = $file ? $this->f3->get('UPLOADS').$this->f3->camelcase($file['name']) : null;
			$rawTable        = $this->f3->get('PARAMS.contentType');
			$allowedContents = array('article', 'dates', 'fbPost', 'item', 'location', 'tweet', 'user');
			$table           = (isset($rawTable) && in_array($rawTable, $allowedContents)) ? htmlentities(trim($rawTable)) : null;
			if(move_uploaded_file($file['tmp_name'], $fileName) && file_exists($fileName) && !is_null($table)){
				$rawData = file_get_contents($fileName);
				$data = json_decode($rawData, true);
				if(json_last_error()===JSON_ERROR_NONE){
					$admin = new Admin($table);
					$admin->add($data['collection']['items'], $table);
					$this->f3->set('rowNumbers', $admin->getRowCounter());
					$this->setStatus(array('messageType'=>'1', 'flashMessage'=>$this->f3->get('dataAdded')));
				}
				else{
					$this->setStatus(array('messageType'=>'0', 'flashMessage'=>$this->f3->get('fileParsingError')));	
				}
			}else{
				$this->setStatus(array('messageType'=>'0', 'flashMessage'=>$this->f3->get('fileUploadError')));
			}
			$this->setRoutingVars(array('type'=>'html', 'page'=>'admin', 'view'=>'back/staticPages/adminDashboard.htm'));
		}

		public function delete(){
			$allowedContents = array('fbpost', 'tweet', 'dates', 'location', 'user', 'item', 'article');
			$rawContentType  = $this->f3->get('PARAMS.contentType');
			$contentType     = ($rawContentType!=null) ? trim(htmlentities($rawContentType)) : null;
			if($contentType!=null){
				if(in_array($contentType, $allowedContents)){
					$admin = new Admin($contentType);
					$status = $admin->deleteAll();
					$this->f3->set('rowNumbers', $admin->getRowCounter());
					$this->setStatus(array('messageType'=>'1', 'flashMessage'=>'Table '.$contentType.' cleared.'));
				}else
					$this->setStatus(array('messageType'=>'0', 'flashMessage'=>$this->f3->get('invalidContentTypeError')));
			}else
				$this->setStatus(array('messageType'=>'0', 'flashMessage'=>$this->f3->get('invalidContentTypeError')));
			$this->setRoutingVars(array('type'=>'html', 'page'=>'admin', 'view'=>'back/staticPages/admin.htm'));
		}

		public function setStatus($params){
			$this->f3->set('messageType', $params['messageType']);
			$this->f3->set('flashMessage', $params['flashMessage']);
		}

		public function setRoutingVars($params){
			$this->f3->set('contentType', $params['type']);
			$this->f3->set('currentPage', $params['page']);
			$this->f3->set('view', $params['view']);
		}

		public function create($filename){

		}

		public function update(){

		}

	}

?>