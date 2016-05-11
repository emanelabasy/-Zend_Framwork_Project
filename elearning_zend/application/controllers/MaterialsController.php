<?php

class MaterialsController extends Zend_Controller_Action
{

    private $model;

    public function init(){
        /* Initialize action controller here */
        $this->model = new Application_Model_DbTable_Materials();
    }

    public function indexAction(){
     	$this->view->materials = $this->model->listMaterials();

    }
    
    public function singleAction(){
        $ids = $this->getRequest()->getParams();
        $id_type=$ids['id_type'];
        $course_id=$ids['course_id'];
        $this->view->id_type=$id_type;
        $this->view->course_id=$course_id;
        
        $course=new Application_Model_DbTable_Course();
        $this->view->course = $course->getCourseById($course_id);
        
       $typematerialss= new Application_Model_DbTable_Typematerials();
       $this->view-> typematerials= $typematerialss->listTypematerials();
       
       $typeuploadss= new Application_Model_DbTable_Typeuploads();
       $this->view-> typeuploadss= $typeuploadss->filterrTypeuploadById($id_type);
//        for obtain on number of download from database
       $img="Image";
       $numdownimage = $typeuploadss->imagedownload($id_type,$img);
       $this->view-> numdownimage=$numdownimage;
//       $vid="Video";
//       $numdownvideo = $typeuploadss->imagedownload($id_type,$vid);
//       $this->view-> numdownvideo=$numdownvideo;
//       $pdf="PDF";
//       $numdownpdf = $typeuploadss->imagedownload($id_type,$pdf);
//       $this->view-> numdownpdf=$numdownpdf;
//       $ppt="PPT";
//       $numdownppt = $typeuploadss->imagedownload($id_type,$ppt);
//       $this->view-> numdownppt=$numdownppt;
//       $word="Word";
//       $numdownword = $typeuploadss->imagedownload($id_type,$word);
//       $this->view-> numdownword=$numdownword;
//        
//       $totaldownload=$numdownimage[1]['no_download']+$numdownvideo[0]['no_download']+$numdownpdf+$numdownppt+$numdownword;
         $totaldownload=$numdownimage[1]['no_download'];
        $this->view-> totaldownload=$totaldownload;
//        var_dump($totaldownload);die();
       $this->view-> typeimages= $this->model->imageMaterialById($id_type,$course_id);
       $this->view-> typevides= $this->model->videoMaterialById($id_type,$course_id);
       $this->view-> typePDFs= $this->model->PDFMaterialById($id_type,$course_id);
       $this->view-> typePPTs= $this->model->PPTMaterialById($id_type,$course_id);
       $this->view-> typewords= $this->model->wordMaterialById($id_type,$course_id);
       
       
        $form = new Application_Form_Material();
        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getParams())){
            $data = $form->getValues();
             $lock=0;
             $state=1;
             $user_id=2;     //will take from session when user make login
             $no_user=0;     //will ask in it what make
            array_push($data,$lock);
            array_push($data,$state);
            array_push($data,$id_type);
            array_push($data,$user_id);
            array_push($data,$course_id);
            array_push($data,$no_user);
            if($this->model->addMaterial($data))
//            $this->redirect('materials/single');	
             $this->redirect('materials/single/course_id/'.$course_id.'/id_type/'.$id_type);
            }

        }
        $this->view->form = $form;

    }
    
    
    public function showsingleAction(){
       $ids = $this->getRequest()->getParams();
        $id_type=$ids['id_type'];
        $course_id=$ids['course_id'];
//            $id_up=$ids['id_up'];
        $id_mat=$ids['id_mat'];
        $this->view->id_type=$id_type;
        $this->view->course_id=$course_id;
        $this->view->id_mat=$id_mat;
        
        
        
       $this->view-> showmaterial= $this->model->getMaterialById($id_mat);
       
        $tysing = $this->model->getMaterialById($id_mat);
        $form = new Application_Form_Material();
        $form->populate($tysing[0]);
        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getParams())){
                $data = $form->getValues();
                // var_dump($data);
                if($this->model->updateMaterial($data,$id_mat)){
                    $this->redirect('materials/showsingle/course_id/'.$course_id.'/id_type/'.$id_type.'/id_mat/'.$id_mat);
                }
            }
        }
        $this->view->form = $form;
//            $this->render('showsingle');

    }

    
    public function downloadimageAction()
    {   $ids = $this->getRequest()->getParams();
        $id_type=$ids['id_type'];
//        $course_id=$ids['course_id'];
        $id_mat=$ids['id_mat'];
       
//        for number download of images
        $downloadimg=new Application_Model_DbTable_Typeuploads();
        $img="Image";
        $row_img= $downloadimg->imagedownload($id_type,$img);
//        var_dump($row_img[1]['id_up']);die();
        $num_downimg['no_download']=$row_img[1]['no_download']+1;
//        var_dump($num_downimg['no_download']);die();
        $downloadimg->updatedownimge($num_downimg,$row_img[1]['id_up']);
            
        $material = $this->model->getMaterialById($id_mat);
//        var_dump($material[0]['mat_image']);die();
        $file_ex= explode(".",$material[0]['mat_image']);
        header('Content-type: application/'.$file_ex[1]);
        header("Content-Disposition: attachment; filename='".$material[0]['mat_image']."'"); 
        readfile('/var/www/html/zend_project/-Zend_Framwork_Project/elearning_zend/public/images/materials/'.$material[0]['mat_image']);
//        for make download in same page
        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        
//        $this->redirect('materials/showsingle/course_id/'.$course_id.'/id_type/'.$id_type.'/id_mat/'.$id_mat);

    }
    
    public function deleteAction() {
        $ids = $this->getRequest()->getParams();
        $id_type=$ids['id_type'];
        $course_id=$ids['course_id'];
//        $id_up=$ids['id_up'];
        $id_mat=$ids['id_mat'];
        if($this->model->deleteMaterial($id_mat))
        $this->redirect('materials/single/course_id/'.$course_id.'/id_type/'.$id_type);
    }


//	function editAction(){
//            $ids = $this->getRequest()->getParams();
//            $id_type=$ids['id_type'];
//            $course_id=$ids['course_id'];
////            $id_up=$ids['id_up'];
//            $id_mat=$ids['id_mat'];
//            $tysing = $this->model->getMaterialById($id_mat);
//            $form = new Application_Form_Material();
//            $form->populate($tysing[0]);
//            if($this->getRequest()->isPost()){
//                if($form->isValid($this->getRequest()->getParams())){
//                    $data = $form->getValues();
//                    // var_dump($data);
//                    if($this->model->updateMaterial($data,$id_mat)){
//                        $this->redirect('materials/showsingle/course_id/'.$course_id.'/id_type/'.$id_type.'/id_mat/'.$id_mat);
//                    }
//                }
//            }
//            $this->view->form = $form;
////            $this->render('showsingle');

//	} 

}
