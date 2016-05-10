<?php

class MaterialsController extends Zend_Controller_Action
{

    private $model;

    public function init(){
        /* Initialize action controller here */
        $this->model = new Application_Model_DbTable_Materials();
    }

    public function indexAction(){
     	$this->view->materials = $this->model->listMaterials();

    }
    
    public function singleAction(){
        $ids = $this->getRequest()->getParams();
        $id_type=$ids['id_type'];
        $course_id=$ids['course_id'];
        $this->view->id_type=$id_type;
        $this->view->course_id=$course_id;
        
       $typematerialss= new Application_Model_DbTable_Typematerials();
       $this->view-> typematerials= $typematerialss->listTypematerials();
       
       $typeuploadss= new Application_Model_DbTable_Typeuploads();
       $this->view-> typeuploadss= $typeuploadss->filterrTypeuploadById($id_type);
        
       $this->view-> typeimages= $this->model->imageMaterialById($id_type,$course_id);
       $this->view-> typevides= $this->model->videoMaterialById($id_type,$course_id);
       $this->view-> typePDFs= $this->model->PDFMaterialById($id_type,$course_id);
       $this->view-> typePPTs= $this->model->PPTMaterialById($id_type,$course_id);
       $this->view-> typewords= $this->model->wordMaterialById($id_type,$course_id);
       
       
        $form = new Application_Form_Material();
        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getParams())){
            $data = $form->getValues();
             $lock=0;
             $state=1;
             $user_id=2;     //will take from session when user make login
             $no_user=0;     //will ask in it what make
            array_push($data,$lock);
            array_push($data,$state);
            array_push($data,$id_type);
            array_push($data,$user_id);
            array_push($data,$course_id);
            array_push($data,$no_user);
            if($this->model->addMaterial($data))
//            $this->redirect('materials/single');	
             $this->redirect('materials/single/course_id/'.$course_id.'/id_type/'.$id_type);
            }

        }
        $this->view->form = $form;

    }
    
    
    public function showsingleAction(){
       $ids = $this->getRequest()->getParams();
       $id_mat=$ids['id_mat'];
       $this->view-> showmaterial= $this->model->getMaterialById($id_mat);

    }

    
    public function deleteAction() {
        $ids = $this->getRequest()->getParams();
        $id_type=$ids['id_type'];
        $course_id=$ids['course_id'];
//        $id_up=$ids['id_up'];
        $id_mat=$ids['id_mat'];
        if($this->model->deleteMaterial($id_mat))
        $this->redirect('materials/single/course_id/'.$course_id.'/id_type/'.$id_type);
    }


	function editAction(){
            $ids = $this->getRequest()->getParams();
            $id_type=$ids['id_type'];
            $course_id=$ids['course_id'];
//            $id_up=$ids['id_up'];
            $id_mat=$ids['id_mat'];
            $tysing = $this->model->getMaterialById($id_mat);
            $form = new Application_Form_Material();
            $form->populate($tysing[0]);
            if($this->getRequest()->isPost()){
                if($form->isValid($this->getRequest()->getParams())){
                    $data = $form->getValues();
                    // var_dump($data);
                    if($this->model->updateMaterial($data,$id_mat)){
                        $this->redirect('materials/showsingle/course_id/'.$course_id.'/id_type/'.$id_type.'/id_mat/'.$id_mat);
                    }
                }
            }
            $this->view->form = $form;
//            $this->render('showsingle');

	} 

}
