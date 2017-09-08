<?php

class Bootstarp {

    function __construct() {
        $url = isset($_GET["url"])? $_GET['url']:NULL;
        
        $url = rtrim($url, '/');
        
        $url = explode('/', $url);
        
        
        if (empty($url[0])){
            require 'controllers/index.php';
            $controller= new Index();
            $controller->index();
            return false;
        }
        
        $file='controllers/' . $url[0] . '.php';
        
        
        if (file_exists($file)){
            require $file;
        }  else {
           $this->CError();
            return FALSE;
            
        }
        
        $controller = new $url[0];
        $controller->loadModel($url[0]);
        
           //Calling Method
        if (isset($url[2])) {
            if(method_exists($controller, $url[1])){
                $controller->{$url[1]}($url[2]);
            }else{
                $this->CError();
            }            
        } else {
            if (isset($url[1])) {
                if(method_exists($controller, $url[1])){
                    $controller->{$url[1]}();
                }else{
                    $this->CError();
                }
            }else{
                $controller->index();
            }
        }
         
         
    }
    public function CError(){
        require 'controllers/error.php';
        $controller = new Error();
        $controller->index();
        return FALSE;
    }
}
