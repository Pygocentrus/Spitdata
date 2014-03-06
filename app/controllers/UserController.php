<?php 

class UserController extends Controller{
	
	public function index(){
		$user           = new User();
		$allowedGenders = array('male', 'female', 'both');
		$rawUserLimit   = trim(htmlentities($this->f3->get('PARAMS.nbUsers')));
		$userLimit      = ($rawUserLimit!=null) ? $rawUserLimit : 1;
		$rawUserGender  = trim(htmlentities($this->f3->get('PARAMS.gender')));
		$userGender     = ($rawUserGender!=null) ? $rawUserGender : 'both';
		if(preg_match('#^[1-9][0-9]*$#', $userLimit))
            $this->f3->set('limit', $userLimit);
        else
        	$this->f3->set('limit', 1);
        $this->f3->set('users',$user->all(array('limit'=>$userLimit, 'gender'=>$userGender)));
        $this->f3->set('finalView', 'back/user/user.json');
        $this->f3->set('contentType', 'json');
	}

	public function getUsers($params){
		$user = new User();
        return $user->all(array('limit'=>$params['limit'], 'gender'=>$params['gender']));
	}

}

?>