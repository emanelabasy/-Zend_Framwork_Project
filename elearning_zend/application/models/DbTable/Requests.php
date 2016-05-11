<?php

class Application_Model_DbTable_Requests extends Zend_Db_Table_Abstract
{

      protected $_name = 'requests';
	

	function listCategories(){
		return $this->fetchAll()->toArray();
	}
        
//        function userCategories($id){
//		$result = $this->select('*')->where('user_id='.$id);
//		return $this->fetchAll($result)->toArray();	
//	}

	
	
//	function deleteCategories($id){
//		return $this->delete('id_cato='.$id);
//	}
	
        
        function addRequest($data){
	
        $row = $this->createRow();   
        $row->title = $data['title'];
        $row->message = $data['message'];
        $row->Type_course = $data['Type_course'];
        return $row->save();
	}

}

