<?php 

require_once './models/UsuariosModel.php';
require_once './models/SedesModel.php';
class Usuarios {

    protected $usuarios,$sedes;

    public function __construct(){
        $this->usuarios = new UsuariosModel();
        $this->sedes = new SedesModel();
    }


    public function index(){
        $data = [
            'usuarios' => $this->usuarios->getAll()
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('usuarios/index',$data);
        Views::render('layouts/footer');
    }

    public function password_reset(){
        $id = Methods::getGet("id");
        $data = [
            'usuario' => $this->usuarios->getOne($id)
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('usuarios/password_reset',$data);
        Views::render('layouts/footer');
    }

    public function change_status()
    {
        try {
            $id = intval(Methods::getGet("id"));
            $status = intval(Methods::getGet("status"));
            $this->usuarios->change_status($status,$id);
            Redirect::to("usuarios/index");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function crear(){
        $data = [
            'sedes' => $this->sedes->getActive()
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('usuarios/crear',$data);
        Views::render('layouts/footer');
    }

    public function guardar(){
        $rol = Methods::getPost("rol");
        $sede = Methods::getPost("sede_id");
        $nombres = Methods::getPost("nombres");
        $apellidos = Methods::getPost("apellidos");
        $documento = Methods::getPost("documento");
        $correo = Methods::getPost("correo");
        $clave = Methods::getPost("clave");
        $foto = Methods::getFile("foto");
        
        if($rol){
            if($sede){
                if($nombres){
                    if($documento){
                        if($correo){
                            if($clave){
                                $this->usuarios->setRol($rol);
                                $this->usuarios->setNombres($nombres);
                                $this->usuarios->setApellidos($apellidos);
                                $this->usuarios->setDocumento($documento);
                                $this->usuarios->setCorreo($correo);
                                $this->usuarios->setClave($clave);
                                $this->usuarios->setSede($sede);
                                $nombrefoto = UploadImages::uploads($foto);
                                $this->usuarios->setFoto($nombrefoto);
                                $this->usuarios->insert();
                                Redirect::to("usuarios/index");
                            }else{
                                Sessions::createSession("documento_vacio","La clave no puede estar vacia");
                                Redirect::to("usuarios/crear");
                            }
                        }else{
                            Sessions::createSession("correo_vacio","El correo no puede estar vacio");
                            Redirect::to("usuarios/crear");
                        }
                    }else{
                        Sessions::createSession("documento_vacio","El documento no puede estar vacio");
                        Redirect::to("usuarios/crear");
                    }
                }else{
                    Sessions::createSession("nombre_vacio","Ingrese el nombre");
                    Redirect::to("usuarios/crear");
                }
            }else{
                Sessions::createSession("sede_vacio","Elija una sede");
                Redirect::to("usuarios/crear");
            }
        }else{
            Sessions::createSession("rol_vacio","Elija un rol");
            Redirect::to("usuarios/crear");
        }

    }

    public function get_one_edit(){
        $id = Methods::getGet("id");
     
        $data = [
            'usuario' => $this->usuarios->getOne($id),
            'sedes' => $this->sedes->getActive()
        ];
        Views::render('layouts/header');
        Views::render('layouts/navigation');
        Views::render('usuarios/editar',$data);
        Views::render('layouts/footer');
    }

    public function modificar(){
        $rol = Methods::getPost("rol");
        $sede = Methods::getPost("sede_id");
        $nombres = Methods::getPost("nombres");
        $apellidos = Methods::getPost("apellidos");
        $documento = Methods::getPost("documento");
        $correo = Methods::getPost("correo");
        $foto = Methods::getFile("foto");
        $id = Methods::getPost("id");
        
        if($rol){
            if($sede){
                if($nombres){
                    if($documento){
                        if($correo){
                                $this->usuarios->setRol($rol);
                                $this->usuarios->setNombres($nombres);
                                $this->usuarios->setApellidos($apellidos);
                                $this->usuarios->setDocumento($documento);
                                $this->usuarios->setCorreo($correo);
                                $this->usuarios->setId($id);
                                $this->usuarios->setSede($sede);
                                $this->usuarios->update();
                                if(!empty($foto["name"])){
                                    $original_image = $this->usuarios->getImageById($id);
                                    UploadImages::delete( $original_image["foto"]);
                                    $imagen_name = UploadImages::uploads($foto);
                                    $this->usuarios->setFoto($imagen_name);
                                    $this->usuarios->edit_image();
                                }
                                Redirect::to("usuarios/index");
                       
                        }else{
                            Sessions::createSession("correo_vacio","El correo no puede estar vacio");
                            Redirect::to("usuarios/get_one_edit");
                        }
                    }else{
                        Sessions::createSession("documento_vacio","El documento no puede estar vacio");
                        Redirect::to("usuarios/get_one_edit");
                    }
                }else{
                    Sessions::createSession("nombre_vacio","Ingrese el nombre");
                    Redirect::to("usuarios/get_one_edit");
                }
            }else{
                Sessions::createSession("sede_vacio","Elija una sede");
                Redirect::to("usuarios/get_one_edit");
            }
        }else{
            Sessions::createSession("rol_vacio","Elija un rol");
            Redirect::to("usuarios/get_one_edit");
        }

    }

    public function change_password(){
        $clave = Methods::getPost("password");
        $repite_clave = Methods::getPost("password_repite");
        $id = Methods::getPost("id");
        
        if($clave){
            if($repite_clave){
                if($repite_clave == $clave){
                    $this->usuarios->setClave($clave);
                    $this->usuarios->setId($id);
                    $this->usuarios->change_password();
                    Redirect::to("usuarios/index");
            }else{
                Sessions::createSession("coincidencia","Las claves no coinciden");
                Redirect::to("usuarios/password_reset");
            }
            }else{
                Sessions::createSession("password_repite_vacio","Repita la clave");
                Redirect::to("usuarios/password_reset");
            }
        }else{
            Sessions::createSession("clave_vacio","Ingrese la clave");
            Redirect::to("usuarios/password_reset");
        }

    }

    public function login(){
      
        $email = Methods::getPost("email");
        $password = Methods::getPost("password");

        if($email){
            if($password){
                $this->usuarios->setCorreo($email);
                $this->usuarios->setClave($password);
                $data = $this->usuarios->login($password,$email);
                if($data){
                    Sessions::createSession("nombres",$data["nombres"]);
                    Sessions::createSession("apellidos",$data["apellidos"]);
                    Sessions::createSession("rol",$data["rol"]);
                    Sessions::createSession("sede_id",$data["sede_id"]);
                    Sessions::createSession("id",$data["id"]);
                    Sessions::createSession("login","login");

                  
                    Redirect::to("menu/index");
                }else{
                    Sessions::createSession("user_not_found","Correo o clave invalido");
                    Redirect::to("home/index");
                }
               
            }else{
                Sessions::createSession("email_vacio","Ingrese el correo");
                Redirect::to("home/index");
            }
        }else{
            Sessions::createSession("password_vacio","Ingrese el password");
            Redirect::to("home/index");
        }


    }

    public function logout(){
        Sessions::deleteSession("id");
        Sessions::deleteSession("nombres");
        Sessions::deleteSession("apellidos");
        Sessions::deleteSession("rol");
        Sessions::deleteSession("sede_id");
        Sessions::deleteSession("login");
        Redirect::to("home/index");
    }

}