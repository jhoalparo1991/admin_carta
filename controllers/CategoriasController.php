<?php 
require_once './models/CategoriasModel.php';
require_once './models/MenuModel.php';
class Categorias {

    protected $categorias,$menu;

    public function __construct() {
        $this->categorias = new CategoriasModel();
        $this->menu = new MenuModel();
    }

    public function index(){
        $data["categorias"] = $this->categorias->getAll();
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('categorias/index',$data["categorias"]);
        Views::render('layouts/footer');
    }

    public function update()
    {
        try {
            $id = intval(Methods::getGet("id"));
            $status = intval(Methods::getGet("status"));
            $this->categorias->update($id, $status);
            Redirect::to("categorias/index");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function crear(){
        $data["menus"] = $this->menu->getActive();
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('categorias/crear',$data["menus"]);
        Views::render('layouts/footer');
    }

    public function editar(){
        $id = intval(Methods::getGet("id"));
        $data["menus"] = $this->menu->getActive();
        $data["categoria"] = $this->categorias->getOne($id);
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('categorias/editar',$data);
        Views::render('layouts/footer');
    }

    public function guardar(){
        $menuid = intval(Methods::getPost("menu_id"));
        $nombre = Methods::getPost("nombre");
        $descripcion = Methods::getPost("descripcion");
        $comentario = Methods::getPost("comentario");

        if($nombre){
            if($menuid >= 1){
                $this->categorias->setMenuid($menuid);
                $this->categorias->setNombre($nombre);
                $this->categorias->setDescripcion($descripcion);
                $this->categorias->setComentarios($comentario);
                $this->categorias->insert();
                Redirect::to("categorias/index");
            }else{
                Sessions::createSession("menu_id_vacio","Debes agergar un menu");
                Redirect::to("categorias/crear");
            }
        }else{
            Sessions::createSession("nombre_vacio","El campo nombre no puede estar vacio");
            Redirect::to("categorias/crear");
        }
    }

    public function modificar(){

        

        $id = intval(Methods::getPost("id"));
        $menuid = intval(Methods::getPost("menu_id"));
        $nombre = Methods::getPost("nombre");
        $descripcion = Methods::getPost("descripcion");
        $comentario = Methods::getPost("comentario");

        if($nombre){
            if($menuid >= 1){
               
                $this->categorias->setMenuid($menuid);
                $this->categorias->setNombre($nombre);
                $this->categorias->setDescripcion($descripcion);
                $this->categorias->setComentarios($comentario);
                $this->categorias->setId($id);
                
                $this->categorias->edit();
                
                Redirect::to("categorias/index");
            }else{
                Sessions::createSession("menu_id_vacio","Debes agergar un menu");
                Redirect::to("categorias/crear");
            }
        }else{
            Sessions::createSession("nombre_vacio","El campo nombre no puede estar vacio");
            Redirect::to("categorias/crear");
        }
    }

}


?>