<?php

class User extends Model {

    public function __construct() {
        parent::__construct();
        $this->mapper=$this->getMapper('user');
    }

    public function all($params) {
        $gender = ($params['gender']!='both') ? array("gender=?",$params['gender']) : array();
        return $this->mapper->find($gender, array('limit'=>$params['limit'], "order"=>'RAND()'));
    }

    public function add() {
        $this->mapper->copyFrom('POST');
        $this->mapper->save();
    }

    public function getById($id) {
        $this->mapper->load(array('id=?',$id));
        $this->mapper->copyTo('POST');
    }

    public function edit($id) {
        $this->mapper->load(array('id=?',$id));
        $this->mapper->copyFrom('POST');
        $this->mapper->update();
    }

    public function delete($id) {
        $this->mapper->load(array('id=?',$id));
        $this->mapper->erase();
    }
}

?>