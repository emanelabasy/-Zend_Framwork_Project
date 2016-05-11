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
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
            $identity = $auth->getIdentity(); 
            $user_id = $identity->id_user;

            $cat_id = $this->getRequest()->getParam('id');
            $category = new Application_Model_DbTable_Cateogry();
            $this->view->cateogry = $category->getCategoriesById($cat_id);
            // var_dump($this->cateogry);
            $this->view->courses = $this->model->listCourses($cat_id);
        }else{
            $this->redirect("users/login");
        }
    }

    public function addAction()
    {
    	$auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
            $identity = $auth->getIdentity(); 
            $user_id = $identity->id_user;
            // echo $user_id;

    	   	$form= new Application_Form_Course();

            $id = $this->getRequest()->getParam('id');
            // $form->removeElement('cimage');
	        if($this->getRequest()->isPost()) {
	            if ($form->isValid($this->getRequest()->getParams())) {
	                $course_data=$form->getValues();
	                if($this->model->addCourse($course_data,$user_id)){
	                    
	                    $this->redirect("course/index/id".$id);
	                }
	            }
	        }

            $layout = $this->_helper->layout();
            $layout->setLayout('admin-layout');

	        $this->view->form = $form;
        }else{
            $this->redirect("users/login");
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
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
            $identity = $auth->getIdentity(); 
            $user_id = $identity->id_user;

            $id = $this->getRequest()->getParam('id_cours');
            if($this->model->deleteCourse($id))
                $this->redirect('course/index');
        }else{
            $this->redirect("users/login");
        }
    }
    
    function editAction(){

        //Update a single Course//

        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
            $identity = $auth->getIdentity(); 
            $user_id = $identity->id_user;

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
        }else{
            $this->redirect("users/login");
        }
    }

}
