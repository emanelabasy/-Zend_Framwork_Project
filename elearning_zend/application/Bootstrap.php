<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initPlaceholders() {
        $this->bootstrap('View');
        $view = $this->getResource('View');
        $layout = $this->getResource('Layout');

         // var_dump($this->view);die;
        

        $view->doctype('HTML5');
        //Meta
        $view->headMeta()->appendName('keywords', 'framework, PHP')->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');

        $view->headTitle('Shrouk Site')->setSeparator(' : ');
        // Set the initial stylesheet:

        
        //admin
        // if($layout == 'admin-layout'){

            $view->headLink()->appendStylesheet('/course/public/css/style1.css');
            $view->headLink()->appendStylesheet('/course/public/css/bootstrap.min1.css');
            $view->headLink()->appendStylesheet('/course/public/css/icon-font.min.css');
            $view->headLink()->appendStylesheet('/course/public/css/font-awesome.css');
            $view->headLink()->appendStylesheet('/course/public/css?family=Montserrat:400,700');
            $view->headLink()->appendStylesheet('/course/public/css?family=Roboto:700,500,300,100italic,100,400');
        
            //admin
            $view->headScript()->appendFile('/course/public/js/amcharts.js');
            $view->headScript()->appendFile('/course/public/js/serial.js');
            $view->headScript()->appendFile('/course/public/js/light.js');
            $view->headScript()->appendFile('/course/public/js/jquery-1.10.2.min.js');
            $view->headScript()->appendFile('/course/public/js/owl.carousel.js');
            $view->headScript()->appendFile('/course/public/js/jquery.flot.js');
            $view->headScript()->appendFile('/course/public/js/jquery.nicescroll.js');
          
            $view->headScript()->appendFile('/course/public/js/scripts.js');
            $view->headScript()->appendFile('/course/public/js/bootstrap.min.js');
            $view->headScript()->appendFile('/course/public/js/jquery.flot.js');
            $view->headScript()->appendFile('/course/public/js/jquery.fn.gantt.js');
            $view->headScript()->appendFile('/course/public/js/menu_jquery.js');

        // }elseif($layout == 'layout') {
          
        
        
        $view->headLink()->appendStylesheet('/course/public/css/bootstrap.min.css');
        $view->headLink()->appendStylesheet('/course/public/css/camera.css');
        $view->headLink()->appendStylesheet('/course/public/css/style.css');
        
        
         
        // Set the initial JS to load:
        $view->headScript()->appendFile('/course/public/js/jquery.min.js');
        $view->headScript()->appendFile('/course/public/js/camera.min.js');
        $view->headScript()->appendFile('/course/public/js/jquery.easing.1.3.js');
        $view->headScript()->appendFile('/course/public/js/jquery.mobile.customized.min.js');
        
        // }
    }   

    protected function _initSession() {
    	Zend_Session::start();
    	$session = new Zend_Session_Namespace('Zend_Auth');
    }
}

