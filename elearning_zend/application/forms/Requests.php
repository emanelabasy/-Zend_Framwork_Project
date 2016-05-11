<?php

class Application_Form_Requests extends Zend_Form
{
     
    public function init()
    {
       $title = new Zend_Form_Element_Text('title');
       $title->setLabel('Title');
       $title->setRequired();
       $title->addValidator('regex', false, array('/^[a-z]/i'));
        
       $message = new Zend_Form_Element_Textarea('message');
       $message->setLabel('Message');
       $message->setRequired();
       
       $this->addElements(array($title,$message ));
       $this->addElement('radio', 'Type_course', array(
         'label' => 'What Type of request ? ',
         'multioptions' => array(
        0 => 'Cousre',
        1 => 'Material', ),
        ));

       
       $submit = new Zend_Form_Element_Submit('submit');
       $submit->setAttrib('class', 'btn ');
       $submit->setAttrib('class', 'btn-primary ');
       $this->addElements(array($submit));
       
       
    }


}

