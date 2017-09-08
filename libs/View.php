<?php

class View{

    function __construct() {
        //echo 'This Is View';
    }
   
   public function render($name){
            require 'views/'.$name.'.php';
   }
}

