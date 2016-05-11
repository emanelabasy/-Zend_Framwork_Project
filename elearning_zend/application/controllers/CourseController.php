<?php

class CourseController extends Zend_Controller_Action
{

	private $model;
    public function init()
    {
        /* Initialize action controller here */
        $this->model = new Application_Model_DbTable_Course();
    }

    public function indexAction()
    {   

            $cat_id = $this->getRequest()->getParam('id');
            $category = new Application_Model_DbTable_Cateogry();
            $this->view->cateogry = $category->getCategoriesById($cat_id);
            // var_dump($this->cateogry);
            $this->view->courses = $this->model->listCourses();
    }

    public function addAction()
    {
    	$auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
            $identity = $auth->getIdentity(); 
            $user_id = $identity->id;
    	   	$form= new Application_Form_Course();
            // $form->removeElement('cimage');
	        if($this->getRequest()->isPost()) {
	            if ($form->isValid($this->getRequest()->getParams())) {
	                $course_data=$form->getValues();
	                if($this->model->addCourse($course_data,$user_id)){
	                    
	                    $this->redirect("course/index");
	                }
	            }
	        }

            $layout = $this->_helper->layout();
            $layout->setLayout('admin-layout');

	        $this->view->form = $form;
	    }
    }

    public function singleAction()
    {
    	//Get a single Course//
        $id = $this->getRequest()->getParam('course_id');
        // $this->view->course = $this->model->getCourseById($id);
        $this->redirect('materials/single/course_id/'.$id.'/id_type/1');

    }

    public function deleteAction()
    {
        //Delete a single Course//
        $id = $this->getRequest()->getParam('id_cours');
        if($this->model->deleteCourse($id))
            $this->redirect('course/index');
    }
    
    function editAction(){

        //Update a single Course//
        $id = $this->getRequest()->getParam('id_cours');
        $course = $this->model->getCourseById($id);
        $form = new Application_Form_Course();

        $form->populate($course[0]);
        //$values = $this->getRequest()->getParams();
        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getParams())){
                $data = $form->getValues();
                $data['id_cours'] = $id;
                // var_dump($data);die;
                $this->model->addCourse($data);
                $this->redirect('course/'); 
            }   
        }
        
        $this->view->form = $form;
        $this->render('add');
    }

}
