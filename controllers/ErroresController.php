<?php 

class Errores{

    public static function index($error = []){
       
        Views::render('error_page/index',$error);
    }

}


?>