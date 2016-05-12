<?php

class TypeuploadsController extends Zend_Controller_Action
{
    
    private $model;

    public function init(){
        /* Initialize action controller here */
	$this->model = new Application_Model_DbTable_Typeuploads();
    }
    
    public function indexAction(){
     	$this->view->typeloads = $this->model->listTypeuploads();

    }
    
    public function addtypeupAction(){
        $ids = $this->getRequest()->getParams();
        $id_type=$ids['id_type'];
        $course_id=$ids['course_id'];
//        $id_up=$ids['id_up'];
        
    	$form = new Application_Form_addtypeup();
        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getParams())){
            $data = $form->getValues();
            array_push($data,$id_type);
            array_push($data,$course_id);
            if ($this->model->addTypeupload($data))
               $this->redirect('materials/single/course_id/'.$course_id.'/id_type/'.$id_type);

            }

        }
        $this->view->form = $form;

    }
    
    public function deleteAction() {
        $ids = $this->getRequest()->getParams();
        $id_type=$ids['id_type'];
        $course_id=$ids['course_id'];
        $id_up=$ids['id_up'];
        if($this->model->deleteTypeupload($id_up))
        $this->redirect('materials/single/course_id/'.$course_id.'/id_type/'.$id_type);
    }


	function editAction(){
            $ids = $this->getRequest()->getParams();
            $id_type=$ids['id_type'];
            $course_id=$ids['course_id'];
            $id_up=$ids['id_up'];
            $tyups = $this->model->getTypeuploadById($id_up);
            $form = new Application_Form_addtypeup();
            $form->populate($tyups[0]);
            if($this->getRequest()->isPost()){
                if($form->isValid($this->getRequest()->getParams())){
                $data = $form->getValues();
                // var_dump($datas);
                if($this->model->updateTypeupload($data,$id_up))
                 $this->redirect('materials/single/course_id/'.$course_id.'/id_type/'.$id_type);
                }
            }
            $this->view->form = $form;
            $this->render('addtypeup');

	} 


}

