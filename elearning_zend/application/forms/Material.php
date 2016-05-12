<?php

class Application_Form_Material extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */

                $mat_video = new Zend_Form_Element_File('mat_video');
		  $mat_video->setLabel('Video Material :');
		$mat_video->setDestination(APPLICATION_PATH.'/../public/videos');
                $mat_video->addValidator('extension', true, array('mp4','avi','mkv','flv','MP3'));
                $desc_video = new Zend_Form_Element_Textarea('desc_video');
                $desc_video->setLabel('desc_video');
//                $desc_video->setRequired();
                $desc_video->setAttrib('class', 'form-control');
                                
		$mat_image = new Zend_Form_Element_File('mat_image');
		$mat_image->setLabel('Image Material :');
		$mat_image->setDestination(APPLICATION_PATH.'/../public/images/materials');
		//$mat_image->setRequired();
                $mat_image->addValidator('extension', true, array('gif','jpg','png','jpeg'));
                $desc_image = new Zend_Form_Element_Textarea('desc_image');
                $desc_image->setLabel('desc_image');
//                $desc_image->setRequired();
                
                
                $mat_word = new Zend_Form_Element_File('mat_word');
		$mat_word->setLabel('Word Material :');
		$mat_word->setDestination(APPLICATION_PATH.'/../public/Words');
                $mat_word->addValidator('extension', true, array('doc','docx'));
                $desc_image->setAttrib('class', 'form-control');
                
                $desc_word = new Zend_Form_Element_Textarea('desc_word');
                $desc_word->setLabel('desc_word');
//                $desc_word->setRequired();
                $desc_word->setAttrib('class', 'form-control');
                
                
                $mat_pdf = new Zend_Form_Element_File('mat_pdf');
		$mat_pdf->setLabel('PDF Material :');
		$mat_pdf->setDestination(APPLICATION_PATH.'/../public/pdfs');
                $mat_pdf->addValidator('extension', true, array('pdf'));
                $desc_pdf = new Zend_Form_Element_Textarea('desc_pdf');
                $desc_pdf->setLabel('desc_pdf');
//                $desc_pdf->setRequired();
                $desc_pdf->setAttrib('class', 'form-control');
                
                
                $mat_ppt = new Zend_Form_Element_File('mat_ppt');
		$mat_ppt->setLabel('PPT Material :');
		$mat_ppt->setDestination(APPLICATION_PATH.'/../public/ppts');
                $mat_ppt->addValidator('extension', true, array('ppt','pptx'));
                $desc_ppt = new Zend_Form_Element_Textarea('desc_ppt');
                $desc_ppt->setLabel('desc_ppt');
//                $desc_ppt->setRequired();
                $desc_ppt->setAttrib('class', 'form-control');
                
		$id_mat = new Zend_Form_Element_Hidden('id_mat');
		// $id_user = new Zend_Form_Element_Hidden('id_user');

		$mat_download = new Zend_Form_Element_Submit('Download Materials');
//		$mat_download->setAttrib('class','form-control btn btn-primary');
               $mat_download->setAttrib('class', 'btn btn-infoclass');
               $mat_download->setAttrib('class', 'btnfont');


		$this->addElements(array($id_mat,$mat_video,$desc_video,$mat_image,$desc_image,$mat_word,$desc_word,$mat_pdf,$desc_pdf,$mat_ppt,$desc_ppt,$mat_download ));
    }


}

