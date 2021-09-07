<?php 

require_once 'BaseModel.php';
class SedesModel extends BaseModel{
    private $id;
    private $nombre;
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

    public function getAll(){
        try {
            $sql = "SELECT * FROM sedes";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function getActive(){
        try {
            $sql = "SELECT * FROM sedes WHERE estado=1";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    
public function update($_id,$_estado){
    try {

        $sql = "UPDATE sedes SET estado=:estado WHERE id=:id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $_id,PDO::PARAM_INT);
        $query->bindParam(':estado', $_estado,PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

public function insert(){
    try {

        $sql = "INSERT INTO sedes(nombre) VALUES(:nombre)";
        $query = $this->db->prepare($sql);
        $query->bindParam(':nombre', $this->getNombre(),PDO::PARAM_STR);
        $query->execute();
        return $query;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

public function getOne($_id){
    try {

        $sql = "SELECT * FROM sedes WHERE id=:id";
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

        $sql = "UPDATE sedes SET nombre=:nombre WHERE id=:id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $this->getId(),PDO::PARAM_INT);
        $query->bindParam(':nombre', $this->getNombre(),PDO::PARAM_STR);
        $query->execute();
        return $query;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
}


?>