<?php

class Error extends Controllers{

    function __construct() {
        parent::__construct();
        
       
    }
    function index(){
        Session::init();
        $loggin =  Session::get('loggedin');
        
        if($loggin == FALSE){
            Session::destroy();
            $this->view->msg='This Is Error Message.....';
            $this->view->render('error/index');
            exit;            
        }else{
			$type =  Session::get('Level');
			if($type==1){//admin
                //$this->view->render('admin/index');
				$this->view->msg="I'm Sorry.<br> <small>we cannot find the page that you request.</small>";
                $this->view->loggin=$loggin;
                $this->view->render('error/index1');
				//header('location: '.URL.'admin/index');
                exit;
            }elseif($type==2){//Demo
                //echo 'page is under Contruction';
                //$this->view->render('demo/index');
				//header('location: '.URL.'demo/index');
				$this->view->msg="I'm Sorry.<br> <small>we cannot find the page that you request.</small>";
                $this->view->loggin=$loggin;
                $this->view->render('error/index2');
                exit;
            }
           
        }
        
        
    }
}