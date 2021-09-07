<?php 

require_once './models/ProductosModel.php';
require_once './models/SedesModel.php';
require_once './models/ArticulosModel.php';
    class Productos{

        protected $productos,$sedes,$articulos;

        public function __construct(){
            $this->productos = new ProductosModel();
            $this->sedes = new SedesModel();
            $this->articulos = new ArticulosModel();
        }

        public function index(){
            $data = [
                'productos' => $this->productos->getAll()
            ];
            Views::render('layouts/header');
            Views::render('layouts/navigation');
            Views::render('productos/index',$data);
            Views::render('layouts/footer');
        }

        public function eliminados(){
            $data = [
                'productos' => $this->productos->getAll(0)
            ];
            Views::render('layouts/header');
            Views::render('layouts/navigation');
            Views::render('productos/eliminados',$data);
            Views::render('layouts/footer');
        }

        public function change_status()
        {
            try {
                $id = intval(Methods::getGet("id"));
                $status = intval(Methods::getGet("status"));
                $this->productos->change_status($status,$id);
                Redirect::to("productos/index");
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function get_one_edit(){
            $id = Methods::getGet("id");
         
            $data = [
                'producto' => $this->productos->getOne($id),
                'articulos' => $this->articulos->getAll(),
                'sedes' => $this->sedes->getActive()
            ];
            Views::render('layouts/header');
            Views::render('layouts/navigation');
            Views::render('productos/editar',$data);
            Views::render('layouts/footer');
        }

        public function modificar() {
            $sede_id = Methods::getPost("sede_id");
            $articulo_id = Methods::getPost("articulo_id");
            $precio_1 = Methods::getPost("precio_1");
            $precio_2 = Methods::getPost("precio_2");
            $id = Methods::getPost("id");
           
            
            if($id){
                    $this->productos->setSede($sede_id);
                    $this->productos->setArticulo($articulo_id);
                    $this->productos->setPrecio1($precio_1);
                    $this->productos->setPrecio2($precio_2);
                    $this->productos->setId($id);
                    $this->productos->edit();
                    Redirect::to("productos/index");
            }else{
                Sessions::createSession("id_vacio","EL campo Id no puede estar vacio");
                Redirect::to("productos/editar");
            }
    
        }

        public function crear(){
         
            $data = [
                'articulos' => $this->articulos->getAll(),
                'sedes' => $this->sedes->getActive()
            ];
            Views::render('layouts/header');
            Views::render('layouts/navigation');
            Views::render('productos/crear',$data);
            Views::render('layouts/footer');
        }

        public function insertar() {
            $sede_id =intval(Methods::getPost("sede_id"));
            $articulo_id = intval(Methods::getPost("articulo_id"));
            $precio_1 = doubleval(Methods::getPost("precio_1"));
            $precio_2 = doubleval(Methods::getPost("precio_2"));
         
            
            if($sede_id){
                if($articulo_id){
                    if($precio_1){
                        if($precio_2 >= 0){
                            $this->productos->setSede($sede_id);
                            $this->productos->setArticulo($articulo_id);
                            $this->productos->setPrecio1($precio_1);
                            $this->productos->setPrecio2($precio_2);
                            $this->productos->insert();
                            Redirect::to("productos/index");
                    }else{
                        Sessions::createSession("precio2_vacio","EL campo Preci2 debe ser mayor o igual a 0"); 
                        Redirect::to("productos/crear");
                    }
                }else{
                    Sessions::createSession("precio1_vacio","EL campo Precio 1 no puede estar vacio");
                    Redirect::to("productos/crear");
                }
            }else{
                Sessions::createSession("articulo_vacio","EL campo articulo no puede estar vacio");
                Redirect::to("productos/crear");
            }
            }else{
                Sessions::createSession("sede_vacio","EL campo sede no puede estar vacio");
                Redirect::to("productos/crear");
            }
    
        }
        


    }
