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
		$cours_image->setDestination('/var/www/html/zend_project/-Zend_Framwork_Project/elearning_zend/public/images/courses/');
		// $cours_image->setRequired();

		// $cimage = new Zend_Form_Element_Image('cours_image');
		// $cimage->setLabel('Course Image');
		// $cimage->setAttribute('src', '/var/www/html/course/public/images/courses/2.jpg');

		$cours_desc= new Zend_Form_Element_Textarea('cours_desc');
		$cours_desc->setLabel('Course Description');
		$cours_desc->setRequired();

		$id_cato = new Zend_Form_Element_Hidden('id_cato');
		// $id_user = new Zend_Form_Element_Hidden('id_user');

		$submit = new Zend_Form_Element_Submit('Save');
		$submit->setAttrib('class', 'btn btn-info');


		$this->addElements(array($course,$cours_image,$cours_desc,$id_cato,$submit ));
    }


}

