<?php

class RequestsController extends Zend_Controller_Action
{

    private $request;

    public function init()
    {
        $this->request = new Application_Model_DbTable_Requests();
    }

    public function indexAction()
    {
         
        $this->view->request = $this->request->listRequest();
    }
    
    
    public function addAction(){
        
        $form= new Application_Form_Requests();

        if ($this->getRequest()->isPost()) {
           if ($form->isValid($this->getRequest()->getParams())) {
               $data = $form->getValues();

              if ($this->request->addRequest($data)) {
                   $this->redirect("cateogry/index");
               }
           }
       }

        $this->view->form = $form;
                
    }

}
