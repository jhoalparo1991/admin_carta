<?php 

require_once 'BaseModel.php';

class MenuModel extends BaseModel{

    private $id;
    private $nombre;
    private $estado;



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

    public function getAll(){
        try {
            $sql = "SELECT * FROM menu";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getActive(){
        try {
            $sql = "SELECT * FROM menu WHERE estado=1";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function create(){
        try {
            $sql = "INSERT INTO menu (nombre) VALUES(:nombre)";
            $query = $this->db->prepare($sql);
            $query->bindParam(':nombre', $this->getNombre(),PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function update($_id,$_estado){
        try {

            $sql = "UPDATE menu SET estado=:estado WHERE id=:id";
            $query = $this->db->prepare($sql);
            $query->bindParam(':id', $_id,PDO::PARAM_INT);
            $query->bindParam(':estado', $_estado,PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function modify($_id,$_name){
        try {

            $sql = "UPDATE menu SET nombre=:nombre WHERE id=:id";
            $query = $this->db->prepare($sql);
            $query->bindParam(':id', $_id,PDO::PARAM_INT);
            $query->bindParam(':nombre', $_name,PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getOne($_id){
        try {

            $sql = "SELECT * FROM menu WHERE id=:id";
            $query = $this->db->prepare($sql);
            $query->bindParam(':id', $_id,PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


}


?>