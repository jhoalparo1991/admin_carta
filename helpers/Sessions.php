<?php 

class Sessions{
    

    public static function createSession($name,$value){
        if(!isset($_SESSION[$name])){
            $_SESSION[$name] = $value;
        }
    }

    public  static function deleteSession($name){
        if(isset($_SESSION[$name])){
            unset($_SESSION[$name]);
        }
    }

    public static function destroySession(){
        session_destroy();
    }

    public static function getSession($name){
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
    }

}

?>