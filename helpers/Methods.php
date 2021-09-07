<?php 

class Methods {

    public static function getPost($value){
        $data = isset($_POST[$value]) ? $_POST[$value] : false;
        return $data;
    }

    public static function getGet($value){
        $data = isset($_GET[$value]) ? $_GET[$value] : false;
        return $data;
    }

    public static function getFile($value){
        $data = isset($_FILES[$value]) ? $_FILES[$value] : false;
        return $data;
    }

    public static function printer($value){
        $data =  isset($value) ? $value : '';
        return $data;
    }


}

?>