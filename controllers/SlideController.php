<?php 

require_once './models/SlideModel.php';

class Slide{

    protected $slide;

    public function __construct(){
        $this->slide = new SlideModel();
    }

    public function index(){
        $data = [
            'sliders' => $this->slide->getAll()
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('slider/index',$data);
        Views::render('layouts/footer');
    }

    public function eliminados(){
        $data = [
            'sliders' => $this->slide->getAll(0)
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('slider/eliminados',$data);
        Views::render('layouts/footer');
    }

    public function change_status()
    {
        try {
            $id = intval(Methods::getGet("id"));
            $status = intval(Methods::getGet("status"));
            $this->slide->change_status($status,$id);
            Redirect::to("slide/index");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function crear(){
 
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('slider/crear');
        Views::render('layouts/footer');
    }

    public function guardar(){
        $nombre = Methods::getPost("nombre");
        $descripcion = Methods::getPost("descripcion");
        $imagen_principal = Methods::getPost("imagen_principal");
        $imagen = Methods::getFile("imagen");
        if($nombre){
            if($imagen["name"]){
                $this->slide->setNombre($nombre);
                $this->slide->setDescripcion($descripcion);
                $this->slide->setImagenprincipal($imagen_principal);
                $nombreImagen = UploadImages::uploads($imagen);
                $this->slide->setImagen($nombreImagen);
                $this->slide->insert();
                Redirect::to("slide/index");
            }else{
                Sessions::createSession("imagen_vacio","Debes cargar una imagen");
                Redirect::to("slide/crear");
            }
           
        }else{
            Sessions::createSession("nombre_vacio","El nombre no puede estar vacio");
            Redirect::to("slide/crear");
        }
       
    }

    public function get_one_edit(){
        $id = Methods::getGet("id");
     
        $data = [
            'sliders' => $this->slide->getOne($id)
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('slider/editar',$data);
        Views::render('layouts/footer');
    }

    public function modificar(){
        
        $nombre = Methods::getPost("nombre");
        $descripcion = Methods::getPost("descripcion");
        $imagen_principal = Methods::getPost("imagen_principal");
        $imagen = Methods::getFile("imagen");
        $id = Methods::getPost("id");
        if($nombre){
                $this->slide->setNombre($nombre);
                $this->slide->setId($id);
                $this->slide->setDescripcion($descripcion);
                $this->slide->setImagenprincipal($imagen_principal);
                
                if(!empty($imagen["name"])){
                    $original_image = $this->slide->getImageById($id);
                    UploadImages::delete( $original_image["imagen"]);
                    $imagen_name = UploadImages::uploads($imagen);
                    $this->slide->setImagen($imagen_name);
                    $this->slide->edit_image();
                }

                $this->slide->edit();
                Redirect::to("slide/index");
   
        }else{
            Sessions::createSession("nombre_vacio","El nombre no puede estar vacio");
            Redirect::to("slide/editar");
        }
       
    }




}


?>