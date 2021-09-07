<?php 

class UploadImages {
    

    public static function uploads($imagen){
        $date = time();
        $extension_name = explode(".",$imagen["name"]);
        $extension = "";
        foreach($extension_name as $key => $value){
            $extension = $value;
        }
        $image_tmp = $imagen["tmp_name"];
        $path_dir = "public/img/uploads";

        if(!is_dir($path_dir)){
            mkdir($path_dir);
        }
        $newName = $date.".".$extension;
        move_uploaded_file($image_tmp,$path_dir."/".$newName);
        return $newName;
    }

    public static function delete($imagen){
        $path_dir = "public/img/uploads/";
        if(is_dir($path_dir)){
            unlink($path_dir.$imagen);
        }
    }


}



?>