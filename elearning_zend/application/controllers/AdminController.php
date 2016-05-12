<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $layout = $this->_helper->layout();
        $layout->setLayout('admin-layout');
    }
    
    
    
     public function countAction()
    {
        $auth = Zend_Auth::getInstance();
            if($auth->hasIdentity()){
            $identity = $auth->getIdentity(); 
            $user_id = $identity->id_user; 
            $model = new Application_Model_DbTable_Requests();
           $this->view->countrequest = $model->countRequest();
//        $layout = $this->_helper->layout();
//        $layout->setLayout('admin-layout');
        $this->render('index');
            }else{
                
                 $this->redirect("users/login");
            }
        
    }
}

