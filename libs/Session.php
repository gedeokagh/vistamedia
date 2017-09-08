<?php

class Session {

    public static function init(){
        @session_start();
    }
    public static function set($id,$key,$value){
        //$_SESSION[$id]=array($key=>$value);
        $_SESSION[$key]=$value;
    }
    public static function get($key){
        if(isset($_SESSION[$key]))
        return $_SESSION[$key];
    }
    public static function destroy(){
        //unset($_SESSION);
        @session_start();
        session_destroy();
        session_unset();        
        ob_end_flush(); 

    }
}
