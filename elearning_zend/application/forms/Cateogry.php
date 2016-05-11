<?php

class Application_Form_Cateogry extends Zend_Form
{

    public function init()
    {
       $category = new Zend_Form_Element_Text('category');
       $category->setLabel('Category');
       $category->setRequired();
       
       $image = new Zend_Form_Element_File('image');
       $image->setLabel('image');
       $image->setDestination(APPLICATION_PATH.'/../public/images/category');
       $image->setRequired();
       
       $desc= new Zend_Form_Element_Textarea('desc');
       $desc->setLabel('desc');
       $desc->setRequired();
       
       $submit = new Zend_Form_Element_Submit('submit');
       
       $this->addElements(array($category,$image, $desc,$submit));
    }


}

