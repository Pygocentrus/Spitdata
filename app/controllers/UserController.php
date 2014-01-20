<?php 

class UserController extends Controller{
	
	function index(){
		$user = new User($this->db);
		$userLimit = $this->f3->get('PARAMS.nbUsers');
		if(preg_match('#^[1-9][0-9]*$#', $userLimit))
            $this->f3->set('limit', $userLimit);
        else
        	$this->f3->set('limit', 1);
        $this->f3->set('users',$user->all($this->f3->get('limit')));
        $this->f3->set('finalView', 'user/user.json');
        $this->f3->set('contentType', 'json');
	}

	function create(){

	}

	function update(){

	}

	function delete(){

	}

}

?>