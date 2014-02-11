<?php 

class UserController extends Controller{
	
	public function index(){
		$user         = new User();
		$rawUserLimit = trim(htmlentities($this->f3->get('PARAMS.nbUsers')));
		$userLimit    = ($rawUserLimit!=null) ? $rawUserLimit : 1;
		if(preg_match('#^[1-9][0-9]*$#', $userLimit))
            $this->f3->set('limit', $userLimit);
        else
        	$this->f3->set('limit', 1);
        $this->f3->set('users',$user->all($this->f3->get('limit')));
        $this->f3->set('finalView', 'back/user/user.json');
        $this->f3->set('contentType', 'json');
	}

	public function create(){

	}

	public function update(){

	}

	public function delete(){

	}

}

?>