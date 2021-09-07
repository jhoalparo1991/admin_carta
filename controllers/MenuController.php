<?php

require_once './models/MenuModel.php';

class Menu
{

    protected $menu;

    public function __construct()
    {
        $this->menu = new MenuModel();
    }

    public function index()
    {
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('menu/index');
        Views::render('layouts/footer');
    }

    public function listados()
    {
        $data["menu"] = $this->menu->getAll();
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('menu/menus/listado', $data);
        Views::render('layouts/footer');
    }

    public function crear()
    {
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('menu/menus/crear');
        Views::render('layouts/footer');
    }

    public function editar()
    {
        $id = intval(Methods::getGet("id"));
        if($id > 0){
            $data["menu"] = $this->menu->getOne($id);
            Views::render('layouts/header');
            Views::render('layouts/navigation');
            Views::render('menu/menus/editar',$data);
            Views::render('layouts/footer');
        }else{
            Redirect::to("menu/listados");
        }
       
    }

    public function guardar()
    {
        if (Methods::getPost("nombre")) {
            $nombre = Methods::getPost("nombre");
            $this->menu->setNombre($nombre);
            $this->menu->create();
            Redirect::to("menu/listados");
        } else {
            Sessions::createSession("nombre_vacio", "* El campo nombre no puede estar vacio");
            Redirect::to("menu/crear");
        }
    }

    public function modificar()
    {
        if (Methods::getPost("nombre")) {
            if (Methods::getPost("id")) {
                $nombre = Methods::getPost("nombre");
                $id = Methods::getPost("id");
                $this->menu->modify($id,$nombre);
                Redirect::to("menu/listados");
            } else {
                Sessions::createSession("id_vacio", "* El campo Id no puede estar vacio");
                Redirect::to("menu/listados");
            }
        } else {
            Sessions::createSession("nombre_vacio", "* El campo nombre no puede estar vacio");
            Redirect::to("menu/listados");
        }
    }

    public function update()
    {
        try {
            $id = intval(Methods::getGet("id"));
            $status = intval(Methods::getGet("status"));
            $this->menu->update($id, $status);
            Redirect::to("menu/listados");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
