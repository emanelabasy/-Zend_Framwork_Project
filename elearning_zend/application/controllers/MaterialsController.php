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
       
        $form = new Application_Form_Material();
//        if($this->getRequest()->isPost()){
//            if($form->isValid($this->getRequest()->getParams())){
//            $data = $form->getValues();
//            if($this->model->addMaterial($data))
//            $this->redirect('materials/single');	  
//            }
//
//        }
        $this->view->form = $form;

    }
    


}

