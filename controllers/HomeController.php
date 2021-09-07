<?php 

class Home {



    public function index(){
        Views::render('layouts/header');
        Views::render('index');
        Views::render('layouts/footer');
    }
}


?>