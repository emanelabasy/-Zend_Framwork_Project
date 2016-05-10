<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initPlaceholders()
	{
		$this->bootstrap('View');
		$view = $this->getResource('View');
		$view->doctype('HTML5');
		//Meta
		$view->headMeta()->appendName('keywords', 'framework, PHP')->appendHttpEquiv('Content-Type','text/html;charset=utf-8');
		// Set the initial title and separator:
		$view->headTitle('FEGOS E-learning_Zend')->setSeparator(' :: ');

		// Set the initial stylesheet:
		// Set the initial stylesheet:
        $view->headLink()->appendStylesheet('/zend_project/-Zend_Framwork_Project/elearning_zend/public/css/bootstrap.min.css');
        $view->headLink()->appendStylesheet('/zend_project/-Zend_Framwork_Project/elearning_zend/public/css/camera.css');
        $view->headLink()->appendStylesheet('/zend_project/-Zend_Framwork_Project/elearning_zend/public/css/style.css');
        $view->headLink()->appendStylesheet('/zend_project/-Zend_Framwork_Project/elearning_zend/public/css/emy.css');
        // $view->headLink()->appendStylesheet('/elearning_zend/public/');
        
        // Set the initial JS to load:
        $view->headScript()->appendFile('/zend_project/-Zend_Framwork_Project/elearning_zend/public/js/jquery.min.js');
        $view->headScript()->appendFile('/zend_project/-Zend_Framwork_Project/elearning_zend/public/js/camera.min.js');
        $view->headScript()->appendFile('/zend_project/-Zend_Framwork_Project/elearning_zend/public/js/jquery.easing.1.3.js');
        $view->headScript()->appendFile('/zend_project/-Zend_Framwork_Project/elearning_zend/public/js/jquery.mobile.customized.min.js');
    }   

    protected function _initSession() {
    	Zend_Session::start();
    	$session = new Zend_Session_Namespace('Zend_Auth');
    }
	
}

