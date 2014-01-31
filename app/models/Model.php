<?php

  class Model{
    
    private $dB;

    protected function __construct(){
      $f3=\Base::instance();
      $this->dB=new DB\SQL($f3->get('db_dns').$f3->get('db_name'), $f3->get('db_user'), $f3->get('db_pass'));
    }

    protected function getMapper($table){
      return new \DB\SQL\Mapper($this->dB,$table);
    }

    protected function logdB(){
      return $this->dB->log();
    }
    
  }

?>