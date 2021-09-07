<?php 
require_once './models/SedesModel.php';
class Sedes {

    protected $sedes;

    public function __construct() {
        $this->sedes = new SedesModel();
    }

    public function index(){
        $data["sedes"] = $this->sedes->getAll();
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('sedes/index',$data["sedes"]);
        Views::render('layouts/footer');
    }

    public function update()
    {
        try {
            $id = intval(Methods::getGet("id"));
            $status = intval(Methods::getGet("status"));
            $this->sedes->update($id, $status);
            Redirect::to("sedes/index");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function crear(){
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('sedes/crear');
        Views::render('layouts/footer');
    }

    public function editar(){
        $id = intval(Methods::getGet("id"));
        $data["sede"] = $this->sedes->getOne($id);
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('sedes/editar',$data);
        Views::render('layouts/footer');
    }

    public function guardar(){
        $nombre = Methods::getPost("nombre");

        if($nombre){
                $this->sedes->setNombre($nombre);
                $this->sedes->insert();
                Redirect::to("sedes/index");
        }else{
            Sessions::createSession("nombre_vacio","El campo nombre no puede estar vacio");
            Redirect::to("sedes/crear");
        }
    }

    public function modificar(){

        

        $id = intval(Methods::getPost("id"));
        $nombre = Methods::getPost("nombre");

        if($nombre){
                $this->sedes->setId($id);
                $this->sedes->setNombre($nombre);
                $this->sedes->setId($id);
                
                $this->sedes->edit();
                
                Redirect::to("sedes/index");
        }else{
            Sessions::createSession("nombre_vacio","El campo nombre no puede estar vacio");
            Redirect::to("sedes/editar");
        }
    }

}


?>