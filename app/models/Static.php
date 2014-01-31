<?php

class Static extends Model {

    public function __construct() {
        parent::__construct();
        $this->mapper=$this->getMapper('user');
    }

}

?>