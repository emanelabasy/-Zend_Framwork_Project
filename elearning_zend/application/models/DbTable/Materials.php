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
        
        function imageMaterialById($id_type,$id_cours){
            $select=$this-> select()->from("materials",'*')-> where('id_type='.$id_type ,' id_cours='.$id_cours);
            return $this->fetchAll($select);
	}
        
        function videoMaterialById($id_type,$id_cours){
            $select=$this-> select()->from("materials",'mat_video')-> where('id_type='.$id_type,'id_cours='.$id_cours);
            return $this->fetchAll($select);
	}
        
        function PDFMaterialById($id_type,$id_cours){
            $select=$this-> select()->from("materials",'mat_pdf')-> where('id_type='.$id_type ,'id_cours='.$id_cours);
            return $this->fetchAll($select);
	}
        
        function PPTMaterialById($id_type,$id_cours){
            $select=$this-> select()->from("materials",'mat_ppt')-> where('id_type='.$id_type,'id_cours='.$id_cours);
            return $this->fetchAll($select);
	}
        
        function wordMaterialById($id_type,$id_cours){
            $select=$this-> select()->from("materials",'mat_word')-> where('id_type='.$id_type,'id_cours='.$id_cours);
            return $this->fetchAll($select);
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
                $row->lock=$matInfo[0];
		$row->state=$matInfo[1];
		$row->id_type = $matInfo[2];
		$row->id_user=$matInfo[3];
                $row->id_cours=$matInfo[4];
                $row->no_users=$matInfo[5];
//		$row->id_cato=$matInfo['id_cato'];

		return $row->save();
	}


}

