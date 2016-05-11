<?php

class CateogryController extends Zend_Controller_Action
{

    private $Category;

    public function init()
    {
        $this->Category = new Application_Model_DbTable_Cateogry();
    }

    public function indexAction()
    {
         
         $form= new Application_Form_Cateogry();
         $this->view->cateogries = $this->Category->listCategories();
         $this->view->form = $form;
         
    }
    
    public function addAction() {

        $form = new Application_Form_Cateogry();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getParams())) {
                $data = $form->getValues();

               if ($this->Category->addCategories($data)) {
                    $this->redirect("cateogry/index");
                }
            }
        }

        $layout = $this->_helper->layout();
        $layout->setLayout('admin-layout');

        $this->view->form = $form;
    }
    
     public function singleAction() {
        $id = $this->getRequest()->getParam('id');
        // $this->view->cateogries = $this->Category->getCategoriesById($id);
        $this->redirect('course/index/id/'.$id);     
    }
    
    
    public function deleteAction() {
        $id = $this->getRequest()->getParam('id');
        if ($this->Category->deleteCategories($id))
            $this->redirect('cateogry/index');
    }
    
    
      function editAction() {
        $id = $this->getRequest()->getParam('id');
        $post = $this->Category->getCategoriesById($id);
        $form = new Application_Form_Cateogry();
        $form->populate($post[0]);
        //$values = $this->getRequest()->getParams();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getParams())) {
                
//                var_dump($data);die;
                $data = $form->getValues();
                $data['id_cato']=$id;
                $this->Category->addCategories($data);
                $this->redirect('cateogry/index');
            }
        }
        //$form->removeElement('submit');

        $layout = $this->_helper->layout();
        $layout->setLayout('admin-layout');

        $this->view->form = $form;
        $this->render('add');
    }

}

