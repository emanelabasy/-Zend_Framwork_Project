<?php

class Application_Model_DbTable_Requests extends Zend_Db_Table_Abstract
{

    protected $_name = 'requests';
	

	function listRequests(){
		return $this->fetchAll()->toArray();
	}
	
	
	function getRequestById($id_req){
		return $this->find($id_req)->toArray();
	}

	function updateRequest($reqInfo,$id_req){
		return $this->update($reqInfo,'id_req='.$id_req);


	}

	
	function deleteRequest($id_req){
		return $this->delete('id_req='.$id_req);
	}


	function addRequest($reqInfo){
		$row = $this->createRow();
		$row->message = $reqInfo['message'];
		$row->id_cours = $reqInfo['id_cours'];		
		$row->id_sub = $reqInfo['id_sub'];
		$row->id_user = $reqInfo['id_user'];

		return $row->save();
	}


}

