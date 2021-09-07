<?php 
require_once 'BaseModel.php';
class SlideModel extends BaseModel {

    private $id;
    private $nombre;
    private $descripcion;
    private $estado;
    private $imagen;
    private $imagenprincipal;

    

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
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

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
     * Get the value of imagenprincipal
     */ 
    public function getImagenprincipal()
    {
        return $this->imagenprincipal;
    }

    /**
     * Set the value of imagenprincipal
     *
     * @return  self
     */ 
    public function setImagenprincipal($imagenprincipal)
    {
        $this->imagenprincipal = $imagenprincipal;

        return $this;
    }


    public function getAll($s = 1){
        try {
            $sql = "SELECT * FROM productos_slider  WHERE estado=${s}";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getOne($_id){
        try {
    
            $sql = "SELECT * FROM productos_slider WHERE id=:id";
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
    
            $sql = "SELECT imagen FROM productos_slider WHERE id=:id";
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
            $sql = "UPDATE productos_slider SET estado=:status WHERE id=:id";
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
            $sql = "INSERT INTO productos_slider(nombre,descripcion,imagen,imagen_principal) VALUES(:nombre,:descripcion,:imagen,:imagen_principal)";
            $query = $this->db->prepare($sql);
            $query->bindParam(":nombre", $this->getNombre(),PDO::PARAM_STR);
            $query->bindParam(":descripcion", $this->getDescripcion(),PDO::PARAM_STR);
            $query->bindParam(":imagen", $this->getImagen(),PDO::PARAM_STR);
            $query->bindParam(":imagen_principal", $this->getImagenprincipal(),PDO::PARAM_STR);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function edit(){
        try {
            $sql = "UPDATE productos_slider SET nombre=:nombre,descripcion=:descripcion,imagen_principal=:imagen_principal WHERE id=:id";
            $query = $this->db->prepare($sql);
            $query->bindParam(":nombre", $this->getNombre(),PDO::PARAM_STR);
            $query->bindParam(":descripcion", $this->getDescripcion(),PDO::PARAM_STR);
            $query->bindParam(":imagen_principal", $this->getImagenprincipal(),PDO::PARAM_STR);
            $query->bindParam(":id", $this->getId(),PDO::PARAM_INT);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function edit_image(){
        try {
            $sql = "UPDATE productos_slider SET imagen=:imagen WHERE id=:id";
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