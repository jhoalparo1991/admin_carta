<?php 

require_once 'BaseModel.php';
class ProductosModel extends BaseModel{
    private $id;
    private $sede;
    private $articulo;
    private $precio1;
    private $precio2;

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
     * Get the value of articulo
     */ 
    public function getArticulo()
    {
        return $this->articulo;
    }

    /**
     * Set the value of articulo
     *
     * @return  self
     */ 
    public function setArticulo($articulo)
    {
        $this->articulo = $articulo;

        return $this;
    }

    /**
     * Get the value of precio1
     */ 
    public function getPrecio1()
    {
        return $this->precio1;
    }

    /**
     * Set the value of precio1
     *
     * @return  self
     */ 
    public function setPrecio1($precio1)
    {
        $this->precio1 = $precio1;

        return $this;
    }

    /**
     * Get the value of precio2
     */ 
    public function getPrecio2()
    {
        return $this->precio2;
    }

    /**
     * Set the value of precio2
     *
     * @return  self
     */ 
    public function setPrecio2($precio2)
    {
        $this->precio2 = $precio2;

        return $this;
    }

    public function getAll($s = 1){
        try {
            $sql = "SELECT p.id,p.sede_id,c.nombre as categoria,a.nombre as articulo,p.precio_1,p.precio_2 FROM productos as p inner join articulos as a on p.articulo_id=a.id
            inner join categorias as c on a.categoria_id = c.id where p.estado=${s}";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function change_status($status = 0,$id){
        try {
            $sql = "UPDATE productos SET estado=:status WHERE id=:id";
            $query = $this->db->prepare($sql);
            $query->bindParam(":status", $status,PDO::PARAM_INT);
            $query->bindParam(":id", $id,PDO::PARAM_INT);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getOne($_id){
        try {
    
            $sql = "SELECT * FROM productos WHERE id=:id";
            $query = $this->db->prepare($sql);
            
            $query->bindParam(':id', $_id,PDO::PARAM_INT);
            $query->execute();
    
            return $query->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function edit(){
        try {
            $sql = "UPDATE productos SET sede_id=:sede_id,articulo_id=:articulo_id,precio_1=:precio_1,precio_2=:precio_2 WHERE  id=:id";
            $query = $this->db->prepare($sql);
            $query->bindParam(":sede_id", $this->getSede(),PDO::PARAM_INT);
            $query->bindParam(":articulo_id", $this->getArticulo(),PDO::PARAM_INT);
            $query->bindParam(":precio_1", $this->getPrecio1(),PDO::PARAM_STR);
            $query->bindParam(":precio_2", $this->getPrecio2(),PDO::PARAM_STR);
            $query->bindParam(":id", $this->getId(),PDO::PARAM_INT);
            $query->execute();
            
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function insert(){
        try {
            $sql = "INSERT INTO productos(sede_id,articulo_id,precio_1,precio_2)VALUES(:sede_id,:articulo_id,:precio_1,:precio_2)";
            $query = $this->db->prepare($sql);
            $query->bindParam(":sede_id", $this->getSede(),PDO::PARAM_INT);
            $query->bindParam(":articulo_id", $this->getArticulo(),PDO::PARAM_INT);
            $query->bindParam(":precio_1", $this->getPrecio1(),PDO::PARAM_STR);
            $query->bindParam(":precio_2", $this->getPrecio2(),PDO::PARAM_STR);
            $query->execute();
            
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}


?>