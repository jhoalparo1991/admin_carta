<?php 

require_once 'BaseModel.php';
class OfertasModel extends BaseModel{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $imagen;
    private $fechainicio;
    private $fechafin;

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
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of fechainicio
     */ 
    public function getFechainicio()
    {
        return $this->fechainicio;
    }

    /**
     * Set the value of fechainicio
     *
     * @return  self
     */ 
    public function setFechainicio($fechainicio)
    {
        $this->fechainicio = $fechainicio;

        return $this;
    }

    /**
     * Get the value of fechafin
     */ 
    public function getFechafin()
    {
        return $this->fechafin;
    }

    /**
     * Set the value of fechafin
     *
     * @return  self
     */ 
    public function setFechafin($fechafin)
    {
        $this->fechafin = $fechafin;

        return $this;
    }

    public function getAll($s = 1){
        try {
            $sql = "SELECT * FROM ofertas  WHERE estado=${s}";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getOne($_id){
        try {
    
            $sql = "SELECT * FROM ofertas WHERE id=:id";
            $query = $this->db->prepare($sql);
            
            $query->bindParam(':id', $_id,PDO::PARAM_INT);
            $query->execute();
    
            return $query->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getImageById($_id){
        try {
    
            $sql = "SELECT imagen FROM ofertas WHERE id=:id";
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
            $sql = "UPDATE ofertas SET estado=:status WHERE id=:id";
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
            $sql = "INSERT INTO ofertas(nombre,descripcion,precio,imagen,fecha_inicio,fecha_fin) VALUES(:nombre,:descripcion,:precio,:imagen,:fecha_inicio,:fecha_fin)";
            $query = $this->db->prepare($sql);
            $query->bindParam(":nombre", $this->getNombre(),PDO::PARAM_STR);
            $query->bindParam(":descripcion", $this->getDescripcion(),PDO::PARAM_STR);
            $query->bindParam(":precio", $this->getPrecio(),PDO::PARAM_STR);
            $query->bindParam(":imagen", $this->getImagen(),PDO::PARAM_STR);
            $query->bindParam(":fecha_inicio", $this->getFechainicio(),PDO::PARAM_STR);
            $query->bindParam(":fecha_fin", $this->getFechafin(),PDO::PARAM_STR);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function edit(){
        try {
            $sql = "UPDATE  ofertas SET nombre=:nombre,descripcion=:descripcion,precio=:precio,fecha_inicio=:fecha_inicio,fecha_fin=:fecha_fin WHERE id=:id";
            $query = $this->db->prepare($sql);
            $query->bindParam(":nombre", $this->getNombre(),PDO::PARAM_STR);
            $query->bindParam(":descripcion", $this->getDescripcion(),PDO::PARAM_STR);
            $query->bindParam(":precio", $this->getPrecio(),PDO::PARAM_STR);
            $query->bindParam(":fecha_inicio", $this->getFechainicio(),PDO::PARAM_STR);
            $query->bindParam(":fecha_fin", $this->getFechafin(),PDO::PARAM_STR);
            $query->bindParam(":id", $this->getId(),PDO::PARAM_INT);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function edit_image(){
        try {
            $sql = "UPDATE ofertas SET imagen=:imagen WHERE id=:id";
            $query = $this->db->prepare($sql);
            $query->bindParam(":imagen", $this->getImagen(),PDO::PARAM_STR);
            $query->bindParam(":id", $this->getId(),PDO::PARAM_INT);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}
?>