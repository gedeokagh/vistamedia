<?php

class Demo extends Controllers{

    function __construct() {
        parent::__construct();
		Session::init();
        $loggin =  Session::get('loggedin');
        $typeID =  Session::get('Level');
        if($loggin == FALSE){
            Session::destroy();
            header('location: '.URL.'login');
            exit;            
        }
        
    }
    function index(){
        //$this->view->msg='Error';
		$ID =  Session::get('ID');
		
		$this->view->vprod=$this->model->vprod($ID);
        $this->view->render('demo/index');
		//header('location: '.URL.'demo/index');
    }
    function detail($id){
		$this->view->proddtl=$this->model->proddtl($id);
		$IDs =  Session::get('ID');
		$otr=strlen(Code::GetField("usrlogin","list","ID='".$IDs."'"));
		$this->view->otr=$otr;
		$this->view->vprod=$this->model->OtherList($IDs,$id);
        $this->view->render('demo/detail');
	}
    function logout(){
        Session::destroy();
        //unset($_SESSION);
        header('location: '.URL);
        //echo "Sessio Off";
        exit;
    }
}