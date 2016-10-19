<?php
include_once('models/PeliculasDisponiblesModel.php');
class GeneroModel extends PeliculasDisponiblesModel{
  function __construct(){
    parent::__construct();
  }
  function mostrarPeliculasGenero($id_genero){
    $sentencia = $this->db->prepare("select * from pelicula where fk_id_genero=?");
    $sentencia->execute(array($id_genero));
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getGeneros(){
    $sentencia = $this->db->prepare("select * from genero");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  function editarGenero($id_genero,$valor){
    $sentencia = $this->db->prepare("update genero set genero=? where id_genero=? ");
    $sentencia->execute(array($valor,$id_genero));
  }
  function eliminarGenero($id_genero){
    $sentencia = $this->db->prepare("delete from genero where id_genero=?");
    $sentencia->execute(array($id_genero));
  }
  function agregarGenero($valor){
    $sentencia = $this->db->prepare("INSERT INTO genero(genero) VALUES(?)");
    $sentencia->execute(array($valor));
  }
}
 ?>
