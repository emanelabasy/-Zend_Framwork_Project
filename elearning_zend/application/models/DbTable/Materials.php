<?php

class Application_Model_DbTable_Materials extends Zend_Db_Table_Abstract
{

    protected $_name = 'materials';
	

	function listMaterials(){
		return $this->fetchAll()->toArray();
	}
	
	
	function getMaterialById($id_mat){
		return $this->find($id_mat)->toArray();
	}

	function updateMaterial($matInfo,$id_mat){
		return $this->update($matInfo,'id_mat='.$id_mat);


	}

	
	function deleteMaterial($id_mat){
		return $this->delete('id_mat='.$id_mat);
	}


	function addMaterial($matInfo){
		$row = $this->createRow();
		$row->mat_pdf=$matInfo['mat_pdf'];
		$row->mat_word=$matInfo['mat_word'];
		$row->mat_ppt=$matInfo['mat_ppt'];
		$row->mat_video=$matInfo['mat_video'];
		$row->mat_image=$matInfo['mat_image'];
		$row->state=$matInfo['state'];
		$row->lock=$matInfo['lock'];
		$row->no_user=$matInfo['no_user'];
		$row->no_download=$matInfo['no_download'];
		$row->id_type = $matInfo['id_type'];
		$row->id_user=$matInfo['id_user'];
		$row->id_cato=$matInfo['id_cato'];
		$row->id_sub=$matInfo['id_sub'];

		return $row->save();
	}


}

