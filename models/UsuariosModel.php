<?php 

    require_once 'BaseModel.php';
    class UsuariosModel extends BaseModel{
        private $id;
        private $rol;
        private $nombres;
        private $apellidos;
        private $documento;
        private $correo;
        private $clave;
        private $sede;
        private $foto;

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of rol
         */ 
        public function getRol()
        {
                return $this->rol;
        }

        /**
         * Set the value of rol
         *
         * @return  self
         */ 
        public function setRol($rol)
        {
                $this->rol = $rol;

                return $this;
        }

        /**
         * Get the value of nombres
         */ 
        public function getNombres()
        {
                return $this->nombres;
        }

        /**
         * Set the value of nombres
         *
         * @return  self
         */ 
        public function setNombres($nombres)
        {
                $this->nombres = $nombres;

                return $this;
        }

        /**
         * Get the value of apellidos
         */ 
        public function getApellidos()
        {
                return $this->apellidos;
        }

        /**
         * Set the value of apellidos
         *
         * @return  self
         */ 
        public function setApellidos($apellidos)
        {
                $this->apellidos = $apellidos;

                return $this;
        }

        /**
         * Get the value of documento
         */ 
        public function getDocumento()
        {
                return $this->documento;
        }

        /**
         * Set the value of documento
         *
         * @return  self
         */ 
        public function setDocumento($documento)
        {
                $this->documento = $documento;

                return $this;
        }

        /**
         * Get the value of correo
         */ 
        public function getCorreo()
        {
                return $this->correo;
        }

        /**
         * Set the value of correo
         *
         * @return  self
         */ 
        public function setCorreo($correo)
        {
                $this->correo = $correo;

                return $this;
        }

        /**
         * Get the value of clave
         */ 
        public function getClave()
        {
                return $this->clave;
        }

        /**
         * Set the value of clave
         *
         * @return  self
         */ 
        public function setClave($clave)
        {
                $this->clave = $clave;

                return $this;
        }

        /**
         * Get the value of sede
         */ 
        public function getSede()
        {
                return $this->sede;
        }

        /**
         * Set the value of sede
         *
         * @return  self
         */ 
        public function setSede($sede)
        {
                $this->sede = $sede;

                return $this;
        }

        /**
         * Get the value of foto
         */ 
        public function getFoto()
        {
                return $this->foto;
        }

        /**
         * Set the value of foto
         *
         * @return  self
         */ 
        public function setFoto($foto)
        {
                $this->foto = $foto;

                return $this;
        }

        public function getAll(){
            try {
                $sql = "SELECT * FROM usuarios";
                $query = $this->db->prepare($sql);
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getOne($_id){
            try {
        
                $sql = "SELECT * FROM usuarios WHERE id=:id";
                $query = $this->db->prepare($sql);
                
                $query->bindParam(':id', $_id,PDO::PARAM_INT);
                $query->execute();
        
                return $query->fetch();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }


        public function login($clave,$correo){
            try {
                $result = "";
                $sql = "SELECT * FROM usuarios WHERE correo=:correo";
                $query = $this->db->prepare($sql);   
                $query->bindParam(':correo', $correo,PDO::PARAM_STR);
                $query->execute();
                $user = $query->fetch();
                $pass = password_verify($clave,$user["clave"]);
                
                if($pass){
                  $result = $user;
                }else{
                    $result = "";
                    Sessions::createSession("user_not_found","Correo o clave invalido");
                    Redirect::to("home/index");
                }
                return $result;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getImageById($_id){
            try {
        
                $sql = "SELECT foto FROM usuarios WHERE id=:id";
                $query = $this->db->prepare($sql);
                
                $query->bindParam(':id', $_id,PDO::PARAM_INT);
                $query->execute();
        
                return $query->fetch();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function change_status($status = 0,$id){
            try {
                $sql = "UPDATE usuarios SET estado=:status WHERE id=:id";
                $query = $this->db->prepare($sql);
                $query->bindParam(":status", $status,PDO::PARAM_INT);
                $query->bindParam(":id", $id,PDO::PARAM_INT);
                $query->execute();
                return $query;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function insert(){
            try {
                $sql = "INSERT INTO usuarios(rol,nombres,apellidos,documento,correo,clave,sede_id,foto) VALUES(:rol,:nombres,:apellidos,:documento,:correo,:clave,:sede_id,:foto)";
                $query = $this->db->prepare($sql);
                $query->bindParam(":rol", $this->getRol(),PDO::PARAM_STR);
                $query->bindParam(":nombres", $this->getNombres(),PDO::PARAM_STR);
                $query->bindParam(":apellidos", $this->getApellidos(),PDO::PARAM_STR);
                $query->bindParam(":documento", $this->getDocumento(),PDO::PARAM_STR);
                $query->bindParam(":correo", $this->getCorreo(),PDO::PARAM_STR);
                $query->bindParam(":clave", password_hash($this->getClave(),PASSWORD_DEFAULT,['cost'=>10]),PDO::PARAM_STR);
                $query->bindParam(":sede_id", $this->getSede(),PDO::PARAM_INT);
                $query->bindParam(":foto", $this->getFoto(),PDO::PARAM_STR);
                $query->execute();
                return $query;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function update(){
            try {
                $sql = "UPDATE usuarios SET rol=:rol,nombres=:nombres,apellidos=:apellidos,documento=:documento,correo=:correo,sede_id=:sede_id WHERE id=:id";
                $query = $this->db->prepare($sql);
                $query->bindParam(":rol", $this->getRol(),PDO::PARAM_STR);
                $query->bindParam(":nombres", $this->getNombres(),PDO::PARAM_STR);
                $query->bindParam(":apellidos", $this->getApellidos(),PDO::PARAM_STR);
                $query->bindParam(":documento", $this->getDocumento(),PDO::PARAM_STR);
                $query->bindParam(":correo", $this->getCorreo(),PDO::PARAM_STR);
                $query->bindParam(":sede_id", $this->getSede(),PDO::PARAM_INT);
                $query->bindParam(":id", $this->getId(),PDO::PARAM_INT);
                $query->execute();
                return $query;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function change_password(){
            try {
                $sql = "UPDATE usuarios SET clave=:clave WHERE id=:id";
                $query = $this->db->prepare($sql);
                $query->bindParam(":clave", password_hash($this->getClave(),PASSWORD_DEFAULT,['cost'=>10]),PDO::PARAM_STR);
                $query->bindParam(":id", $this->getId(),PDO::PARAM_INT);
                $query->execute();
                return $query;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function edit_image(){
            try {
                $sql = "UPDATE usuarios SET foto=:foto WHERE id=:id";
                $query = $this->db->prepare($sql);
                $query->bindParam(":foto", $this->getFoto(),PDO::PARAM_STR);
                $query->bindParam(":id", $this->getId(),PDO::PARAM_INT);
                $query->execute();
                return $query;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

    }

?>