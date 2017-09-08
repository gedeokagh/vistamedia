<?php

class Index extends Controllers{
    function __construct() {
        parent::__construct();
        Session::init();
        $loggin =  Session::get('loggedin');
        $type =  Session::get('Level');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            header('location: '.URL.'login');
			//header('location: '.URL.'ina');
            //$this->view->render('login/index2');
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                //$this->view->render('admin/index');
				header('location: '.URL.'admin/index');
                exit;
            }elseif($type==2){//Demo
                //echo 'page is under Contruction';
                //$this->view->render('demo/index');
				header('location: '.URL.'demo/index');
                exit;
            }else{
                Session::destroy();
                header('location: '.URL.'login/error/3');
                exit;  
            }
            
        }
             
    }
    function index(){
      
    }
    
}