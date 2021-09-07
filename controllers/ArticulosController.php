<?php 

require_once './models/ArticulosModel.php';
require_once './models/CategoriasModel.php';
class Articulos {

    protected $articulos,$categorias;

    public function __construct(){
        $this->articulos = new ArticulosModel();
        $this->categorias = new CategoriasModel();
    }

    public function index(){
        $data = [
            'articulos' => $this->articulos->getAll()
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('articulos/index',$data);
        Views::render('layouts/footer');
    }

    public function eliminados(){
        $data = [
            'articulos' => $this->articulos->getAll(0)
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('articulos/eliminados',$data);
        Views::render('layouts/footer');
    }

    public function change_status()
    {
        try {
            $id = intval(Methods::getGet("id"));
            $status = intval(Methods::getGet("status"));
            $this->articulos->change_status($status,$id);
            Redirect::to("articulos/index");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function crear(){
        $data = [
            'categorias' => $this->categorias->getActive()
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('articulos/crear',$data);
        Views::render('layouts/footer');
    }

    public function get_one_edit(){
        $id = Methods::getGet("id");
     
        $data = [
            'articulo' => $this->articulos->getOne($id),
            'categorias' => $this->categorias->getActive()
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('articulos/editar',$data);
        Views::render('layouts/footer');
    }

    public function guardar() {
        $nombre = Methods::getPost("nombre");
        $descripcion = Methods::getPost("descripcion");
        $categoria = Methods::getPost("categoria_id");
        $imagen = Methods::getFile("imagen");
        $imagen_name = UploadImages::uploads($imagen);
        
        if($nombre){
            if($categoria){
                $this->articulos->setNombre($nombre);
                $this->articulos->setDescripcion($descripcion);
                $this->articulos->setCategoria($categoria);
                $this->articulos->setImagen($imagen_name);
                $this->articulos->insert();
                Redirect::to("articulos/index");
            }else{
                Sessions::createSession("categoria_vacio","Elige una categoria valida");
                Redirect::to("articulos/crear");
            }
        }else{
            Sessions::createSession("nombre_vacio","EL campo nombre no puede estar vacio");
            Redirect::to("articulos/crear");
        }

    }

    public function modificar() {
        $nombre = Methods::getPost("nombre");
        $descripcion = Methods::getPost("descripcion");
        $categoria = Methods::getPost("categoria_id");
        $id = Methods::getPost("id");
        $imagen = Methods::getFile("imagen");
       
        
        if($nombre){
            if($categoria){
                $this->articulos->setNombre($nombre);
                $this->articulos->setDescripcion($descripcion);
                $this->articulos->setCategoria($categoria);
                $this->articulos->setId($id);
                $this->articulos->edit();
                if(!empty($imagen["name"])){
                    $original_image = $this->articulos->getImageById($id);
                    UploadImages::delete( $original_image["imagen"]);
                    $imagen_name = UploadImages::uploads($imagen);
                    $this->articulos->setImagen($imagen_name);
                    $this->articulos->edit_image();
                }
                Redirect::to("articulos/index");
            }else{
                Sessions::createSession("categoria_vacio","Elige una categoria valida");
                Redirect::to("articulos/crear");
            }
        }else{
            Sessions::createSession("nombre_vacio","EL campo nombre no puede estar vacio");
            Redirect::to("articulos/crear");
        }

    }




}

?>