<?php 

    class App
    {

        public function __construct()
        {
            $url = isset($_GET['url']) ? $_GET['url'] : 'home/index';

            $url = rtrim($url,"/");
           // $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode("/",$url);

         

            if(isset($url[0])){
                $pathController = "controllers/".ucwords($url[0])."Controller.php";
               
                if(file_exists($pathController)){
                    require_once $pathController;
                    $controller = new $url[0];
                    
                    if(class_exists(ucwords($url[0]))){
                        if(isset($url[1]) && !empty($url[1])){
                            if(method_exists($controller,$url[1])){
                                $controller->{$url[1]}();
                            }else{
                              $this->showError("404","Error en la peticion");
                            }
                        }else{
                            $this->showError("404","Error en la peticion o la peticion no existe");
                        }

                    }else{
                        $this->showError("404","Error en la peticion que intentas");
                    }
                }else{
                    $this->showError("404","No existe el recurso buscado");
                }

            }else{
                $this->showError("404","Pagina no encontrada");
            }

        }

        public function showError($code = "404", $message = "Page error"){
            $data = [
                'code' => $code,
                'message' => $message    
            ];
            Errores::index($data);
        }

     



    }
    


?>