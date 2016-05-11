<?php

class Application_Form_addtypeup extends Zend_Form
{

    public function init()
    {
	
        /* Form Elements & Other Definitions Here ... */

	$contain_upload = new Zend_Form_Element_Text('contain_upload');
	$contain_upload->setRequired();
        $contain_upload->setAttrib('class', 'form-control');
	$contain_upload->setLabel('New Upload Materials :');
	// ->addValidator(new Zend_Validate_Db_NoRecordExists(
    // array(
//         'table' => 'typeuploads',
//         'field' => '$contain_upload'
//     )
// ));
	
 	$id_up = new Zend_Form_Element_Hidden('id_up');
        
	$addtypeup = new Zend_Form_Element_Submit('submit');
	$addtypeup->setAttrib('class', 'form-control btn btn-primary');

	$this->addElements(array($id_up,$contain_upload,$addtypeup));

    }

}

