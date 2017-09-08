<?php

class AutoSend extends Controllers{

    function __construct() {
        parent::__construct();
		
    }
    function index(){
       
		$this->view->prolist=$this->model->SendList();
		$this->model->AutoSend();
        $this->view->render('autosend/index');
		
    }
    
}