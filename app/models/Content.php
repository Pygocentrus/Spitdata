<?php

class Content extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db, $contentType) {
        parent::__construct($db, $contentType);
    }

    public function all($limit) {
        $this->load(array(), array('limit' => $limit, "order" => 'RAND()'));
        return $this->query;
    }

    public function add() {
        $this->copyFrom('POST');
        $this->save();
    }

    public function getById($id) {
        $this->load(array('id=?',$id));
        $this->copyTo('POST');
    }

    public function edit($id) {
        $this->load(array('id=?',$id));
        $this->copyFrom('POST');
        $this->update();
    }

    public function delete($id) {
        $this->load(array('id=?',$id));
        $this->erase();
    }
}

?>