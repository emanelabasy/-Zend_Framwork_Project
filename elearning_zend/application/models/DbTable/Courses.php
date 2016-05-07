<?php

class Application_Model_DbTable_Courses extends Zend_Db_Table_Abstract
{

    protected $_name = 'courses';
	

	function listCourses(){
		return $this->fetchAll()->toArray();
	}
	
	
	function getCourseById($id_cours){
		return $this->find($id_cours)->toArray();
	}

	function updateCourse($coursInfo,$id_cours){
		return $this->update($coursInfo,'id_cours='.$id_cours);


	}

	
	function deleteCourse($id_cours){
		return $this->delete('id_cours='.$id_cours);
	}


	function addCourse($coursInfo){
		$row = $this->createRow();
		$row->course = $coursInfo['course'];
		$row->cours_image = $coursInfo['cours_image'];
		$row->cours_desc = $coursInfo['cours_desc'];
		$row->id_cato = $coursInfo['id_cato'];
		$row->id_user = $coursInfo['id_user'];

		return $row->save();
	}


}

