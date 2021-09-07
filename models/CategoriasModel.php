<?php 

require_once 'BaseModel.php';
class CategoriasModel extends BaseModel{

private $id;
private $menuid;
private $nombre;
private $descripcion;
private $comentarios;



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
 * Get the value of menuid
 */ 
public function getMenuid()
{
return $this->menuid;
}

/**
 * Set the value of menuid
 *
 * @return  self
 */ 
public function setMenuid($menuid)
{
$this->menuid = $menuid;

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
 * Get the value of comentarios
 */ 
public function getComentarios()
{
return $this->comentarios;
}

/**
 * Set the value of comentarios
 *
 * @return  self
 */ 
public function setComentarios($comentarios)
{
$this->comentarios = $comentarios;

return $this;
}


public function getAll(){
    try {
        $sql = "SELECT c.id,c.nombre as categorias,m.id as menu_id,m.nombre as menu,c.descripcion,c.comentario,c.estado FROM categorias as c INNER JOIN menu as m ON
        c.menu_id=m.id ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

public function getActive(){
    try {
        $sql = "SELECT id,nombre FROM categorias WHERE estado=1";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

public function update($_id,$_estado){
    try {

        $sql = "UPDATE categorias SET estado=:estado WHERE id=:id";
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

        $sql = "INSERT INTO categorias(menu_id,nombre,descripcion,comentario) VALUES(:menu_id,:nombre,:descripcion,:comentario)";
        $query = $this->db->prepare($sql);
        $query->bindParam(':menu_id', $this->getMenuid(),PDO::PARAM_INT);
        $query->bindParam(':nombre', $this->getNombre(),PDO::PARAM_STR);
        $query->bindParam(':descripcion', $this->getdescripcion(),PDO::PARAM_STR);
        $query->bindParam(':comentario', $this->getComentarios(),PDO::PARAM_STR);
        $query->execute();
        return $query;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

public function getOne($_id){
    try {

        $sql = "SELECT * FROM categorias WHERE id=:id";
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

        $sql = "UPDATE categorias SET menu_id=:menu_id,nombre=:nombre,descripcion=:descripcion,comentario=:comentario WHERE id=:id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $this->getId(),PDO::PARAM_INT);
        $query->bindParam(':menu_id', $this->getMenuid(),PDO::PARAM_INT);
        $query->bindParam(':nombre', $this->getNombre(),PDO::PARAM_STR);
        $query->bindParam(':descripcion', $this->getdescripcion(),PDO::PARAM_STR);
        $query->bindParam(':comentario', $this->getComentarios(),PDO::PARAM_STR);
        $query->execute();
        return $query;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}


}

?>