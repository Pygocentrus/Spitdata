<?php 

	class Admin extends Model {

		public function __construct($table=NULL) {
	        parent::__construct();
	        if($table==NULL)
	        	$this->mapper=$this->getMapper('currentUser');
	        else
	        	$this->mapper=$this->getMapper($table);
	    }

	    public function getUser($user) {
	        $res = $this->mapper->find(array('username=? and password=?', $user['username'], md5($user['password'])));        
	        return ($res!=null);
	    }

	    public function all($limit) {
	        return $this->mapper->find(array(), array('limit' => $limit, "order" => 'RAND()'));
	    }

	    public function add($array, $table) {
	    	$query;
	    	$keys;
	    	$currentArray;
	    	// For each element of the array
	    	for($i=0; $i<sizeof($array); $i++){
				$keys         = array_keys($array[$i]);
				$currentArray = $array[$i];
				$query="INSERT INTO ".$table." VALUES('', ";

	    		// Creates the request for 1 element
		    	for($j=0; $j<sizeof($keys); $j++){
		    		if($j<=sizeof($array))
		    			$query .= "'".addslashes($currentArray[$keys[$j]])."', ";
		    		else
		    			$query .= "'".addslashes($currentArray[$keys[$j]])."');";
		    	}
		    	// Exec this query
		    	$this->dB->exec($query);
	    	}
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

	    public function deleteAll() {
	        return $this->mapper->erase(array('content!=?','NULL'));
	    }

	}

?>