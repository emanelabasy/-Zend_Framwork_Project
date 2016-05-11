<?php

class UsersController extends Zend_Controller_Action
{

	private $model;

    public function init(){
        /* Initialize action controller here */
		$this->model = new Application_Model_DbTable_Users();
    }

    public function indexAction()
    {
    #osama will redirect here
        $this->view->users = $this->model->listUsers();

    }

    public function profileAction()
    {
    $auth = Zend_Auth::getInstance();
    if($auth->hasIdentity()){
        $identity = $auth->getIdentity(); 
        $id = $identity->id_user;
    $this->view->users  = $this->model->getUserById($id);
        }
    else
    {
        $this->_redirect('users/login');
    }
    }
    function editAction(){
    
     $auth = Zend_Auth::getInstance();
    if($auth->hasIdentity()){
        $identity = $auth->getIdentity(); 
        $id = $identity->id_user;
    $user = $this->model->getUserById($id);
    $form = new Application_Form_Update();
    $form->populate($user[0]);
    if($this->getRequest()->isPost()){
        if($form->isValid($this->getRequest()->getParams())){
        $data = $form->getValues();
        $this->model->updateuser($data,$id);
        }
    }
    $this->view->form = $form;
    }
    else
    {
        $this->_redirect('users/login');
    }

    

    
    

}
    public function addAction()
    {
    	$form = new Application_Form_Register();
        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getParams())){
                $data = $form->getValues();
                if($data['password'] != $data['confirmPassword'])
                {
                  $this->view->errorMessage = "Password and confirm password don’t match.";
                return;
               }
              unset($data['confirmPassword']);
                if (!$form->image->receive())
                 {
                    print "Upload error";
                }
           
                if ($this->model->addUser($data))
                    $this->redirect('users/login');
                }}
                 $this->view->form = $form;
            }
    public function loginAction()
    {
        
        $db = $this->_getParam('db');
        $form=new Application_Form_Login();
        if ($form->isValid($_POST)) 
        {
            $adapter = new Zend_Auth_Adapter_DbTable($db,'users','username', 'password');
 
            $adapter->setIdentity($form->getValue('username'));
            $adapter->setCredential(md5($form->getValue('password')));
 
            $auth   = Zend_Auth::getInstance();
            $result = $auth->authenticate($adapter);
 
            if ($result->isValid())
            {
                $auth = Zend_Auth::getInstance();
                $storage = $auth->getStorage();
                $storage->write($adapter->getResultRowObject(array('username',
                    'id_user')));
                $this->_redirect('cateogry/index');
            }
            
                else {

                $this->_redirect('users/login');
            }
        }
       
         $this->view->form = $form;
    }
    function logoutAction(){
        $authorization =Zend_Auth::getInstance();
        if($authorization->hasIdentity()) {
            Zend_Session::destroy();  
            $this->_redirect('users/login');
        
        } 
        
    }

    }



