<?php

class Application_Form_Course extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */

		$course = new Zend_Form_Element_Text('course');
		$course->setLabel('Course');
		$course->setRequired();

		$cours_image = new Zend_Form_Element_File('cours_image');
		$cours_image->setLabel('Course Image');
		$cours_image->setDestination(APPLICATION_PATH.'/../public/images/courses/');
		$cours_image->setRequired();

		$category = new Application_Model_DbTable_Cateogry();

		$selectCategory = new Zend_Form_Element_Select('category_id');
		$selectCategory->addMultiOption(0,'Plz Select Category');
		foreach ($category->fetchAll() as $cat) {
			$selectCategory->addMultiOption($cat['id_cato'],$cat['category']);
		}


		$cours_desc= new Zend_Form_Element_Textarea('cours_desc');
		$cours_desc->setLabel('Course Description');
		$cours_desc->setRequired();

		$id_cato = new Zend_Form_Element_Hidden('id_cato');
		// $id_user = new Zend_Form_Element_Hidden('id_user');

		$submit = new Zend_Form_Element_Submit('Save');
		$submit->setAttrib('class', 'btn btn-info');


		$this->addElements(array($course,$selectCategory,$cours_image,$cours_desc,$id_cato,$submit ));
    }


}

