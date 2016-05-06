<?php

class Application_Model_DbTable_Typecourses extends Zend_Db_Table_Abstract
{

    protected $_name = 'typecourses';
	

	function listTypecourses(){
		return $this->fetchAll()->toArray();
	}
	
	function getTypecourseById($id_type){
		return $this->find($id_type)->toArray();
	}

	function updateTypecourse($typeInfo,$id_type){
		return $this->update($typeInfo,'id_type='.$id_type);
	}

	
	function deleteTypecourse($id_type){
		return $this->delete('id_type='.$id_type);
	}


	function addTypecourse($typeInfo){
		$row = $this->createRow();
		$row->contain_type = $typeInfo['contain_type'];


		return $row->save();
	}


}


