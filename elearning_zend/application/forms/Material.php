<?php

class Application_Form_Material extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
//                
                $mat_video = new Zend_Form_Element_File('mat_video');
		$mat_video->setLabel('Video Material :');
//		$mat_video->setDestination('/var/www/html/zend_project/-Zend_Framwork_Project/elearning_zend/public/videos');
//                
		$mat_image = new Zend_Form_Element_File('mat_image');
		$mat_image->setLabel('Image Material :');
		$mat_image->setDestination('/var/www/html/z/-Zend_Framwork_Project/elearning_zend/public/images/materials');
		//$mat_image->setRequired();
                
                $mat_word = new Zend_Form_Element_File('mat_word');
		$mat_word->setLabel('Word Material :');
//		$mat_word->setDestination('/var/www/html/zend_project/-Zend_Framwork_Project/elearning_zend/public/words');
                
                $mat_pdf = new Zend_Form_Element_File('mat_pdf');
		$mat_pdf->setLabel('PDF Material :');
//		$mat_pdf->setDestination('/var/www/html/zend_project/-Zend_Framwork_Project/elearning_zend/public/pdfs');
                
                $mat_ppt = new Zend_Form_Element_File('mat_ppt');
		$mat_ppt->setLabel('PPT Material :');
//		$mat_ppt->setDestination('/var/www/html/zend_project/-Zend_Framwork_Project/elearning_zend/public/ppts');
//                
		$id_mat = new Zend_Form_Element_Hidden('id_mat');
		// $id_user = new Zend_Form_Element_Hidden('id_user');

		$mat_download = new Zend_Form_Element_Submit('Download Materials');
//		$mat_download->setAttrib('class','form-control btn btn-primary');
               $mat_download->setAttrib('class', 'btn btn-infoclass');
               $mat_download->setAttrib('class', 'btnfont');


		$this->addElements(array($id_mat,$mat_video,$mat_word,$mat_image,$mat_pdf,$mat_pdf,$mat_ppt,$mat_download ));
    }


}

