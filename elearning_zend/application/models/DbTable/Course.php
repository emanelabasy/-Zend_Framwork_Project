<?php

class Application_Model_DbTable_Course extends Zend_Db_Table_Abstract
{
	protected $_name = 'courses';

	function listCourses($id){
		return $this->fetchAll($this->select()->where('id_cato='.$id))->toArray();
	}
	
	function addCourse($data,$user_id){
	if ($data['id_cours'] != "" )
		{
			$course = $this->fetchRow($this->select()->where('id_cours='.$data['id_cours']));
		}
		else{
			$course = $this->createRow();
		}

		$course->course = $data['course'];

		if($data['cours_image'] == "")
		{
			$img = $course['cours_image'];
			$course->cours_image = $img;
		}else{
			$course->cours_image = $data['cours_image'];
		}
		
		$course->cours_desc = $data['cours_desc'];
		$course->id_cato = $data['category_id'];
		$course->id_user = $user_id;

		return $course->save();
	}

	function getCourseById($id){
		return $this->find($id)->toArray();
	}
	
	function deleteCourse($id){
		return $this->delete('id_cours='.$id);
	}

}
