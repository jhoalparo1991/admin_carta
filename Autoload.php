<?php 


spl_autoload_register(function($className){
    require_once 'controllers/'.$className.'Controller.php';
})

?>