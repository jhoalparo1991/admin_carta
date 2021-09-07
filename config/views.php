<?php 


class Views {

        public static function render($view,$data = []){
            if(isset($view) && !empty($view)){
                require_once 'views/'.$view.'.php';
            }else{
                echo '<div class="alert alert-danger">View not found</div>';
            }
        }


}


?>