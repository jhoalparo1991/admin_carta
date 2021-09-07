<?php


require_once './models/OfertasModel.php';

class Ofertas{

    protected $ofertas;

    public function __construct(){
        $this->ofertas = new OfertasModel();
    }

    public function index(){
        $data = [
            'ofertas' => $this->ofertas->getAll()
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('ofertas/index',$data);
        Views::render('layouts/footer');
    }

    public function eliminados(){
        $data = [
            'ofertas' => $this->ofertas->getAll(0)
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('ofertas/eliminados',$data);
        Views::render('layouts/footer');
    }

    public function change_status()
    {
        try {
            $id = intval(Methods::getGet("id"));
            $status = intval(Methods::getGet("status"));
            $this->ofertas->change_status($status,$id);
            Redirect::to("ofertas/index");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function crear(){
 
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('ofertas/crear');
        Views::render('layouts/footer');
    }

    public function guardar(){
        $nombre = Methods::getPost("nombre");
        $descripcion = Methods::getPost("descripcion");
        $precio = doubleval(Methods::getPost("precio"));
        $imagen = Methods::getFile("imagen");
        $fecha_inicio = Methods::getPost("fecha_inicio");
        $fecha_fin = Methods::getPost("fecha_fin");
    
        if($nombre){
            if($imagen["name"]){
                $this->ofertas->setNombre($nombre);
                $this->ofertas->setDescripcion($descripcion);
                $this->ofertas->setPrecio($precio);
                $this->ofertas->setFechainicio($fecha_inicio);
                $this->ofertas->setFechafin($fecha_fin);
                $nombreImagen = UploadImages::uploads($imagen);
                $this->ofertas->setImagen($nombreImagen);
                $this->ofertas->insert();
                Redirect::to("ofertas/index");
            }else{
                Sessions::createSession("imagen_vacio","Debes cargar una imagen");
                Redirect::to("ofertas/crear");
            }
           
        }else{
            Sessions::createSession("nombre_vacio","El nombre no puede estar vacio");
            Redirect::to("ofertas/crear");
        }
       
    }

    public function get_one_edit(){
        $id = Methods::getGet("id");
     
        $data = [
            'ofertas' => $this->ofertas->getOne($id)
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('ofertas/editar',$data);
        Views::render('layouts/footer');
    }

    public function modificar(){
        $id = intval(Methods::getPost("id"));
        $nombre = Methods::getPost("nombre");
        $descripcion = Methods::getPost("descripcion");
        $precio = doubleval(Methods::getPost("precio"));
        $imagen = Methods::getFile("imagen");
        $fecha_inicio = Methods::getPost("fecha_inicio");
        $fecha_fin = Methods::getPost("fecha_fin");
        
        if($nombre){
                $this->ofertas->setNombre($nombre);
                $this->ofertas->setDescripcion($descripcion);
                $this->ofertas->setPrecio($precio);
                $this->ofertas->setFechainicio($fecha_inicio);
                $this->ofertas->setFechafin($fecha_fin);
                
                if(!empty($imagen["name"])){
                    $original_image = $this->ofertas->getImageById($id);
                    UploadImages::delete( $original_image["imagen"]);
                    $imagen_name = UploadImages::uploads($imagen);
                    $this->ofertas->setImagen($imagen_name);
                    $this->ofertas->edit_image();
                }
          
                $this->ofertas->edit();
             
                Redirect::to("ofertas/index");
   
        }else{
            Sessions::createSession("nombre_vacio","El nombre no puede estar vacio");
            Redirect::to("ofertas/editar");
        }
       
    }




}


?>