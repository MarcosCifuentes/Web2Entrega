<?php
include_once('models/Model.php');

class GeneroModel extends Model{
  function __construct(){
    parent::__construct();
  }
  function mostrarPeliculasGenero($id_genero){
    $sentencia = $this->db->prepare("select * from pelicula where fk_id_genero=?");
    $sentencia->execute(array($id_genero));
    $peliculasGenero=array();
    while ($peliculaGenero = $sentencia->fetch(PDO::FETCH_ASSOC)) {
      $peliculaGenero["genero"] = $this->getGenero($peliculaGenero["fk_id_genero"]);
      $peliculasGenero[]=$peliculaGenero;
    }
    return $peliculasGenero;
  }

  function getGenero($id_genero) {
  $sentencia = $this->db->prepare("SELECT genero from genero where id_genero = ?");
  $sentencia->execute(array($id_genero));
  $genero=$sentencia->fetch(PDO::FETCH_ASSOC)["genero"];
  return $genero;
}

  function getGeneros(){
    $sentencia = $this->db->prepare("SELECT * from genero");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function editarGenero($id_genero,$genero){
    $sentencia = $this->db->prepare("UPDATE genero set genero=? where id_genero=? ");
    $sentencia->execute(array($genero,$id_genero));
  }
  function eliminarGenero($id_genero){
    $sentencia = $this->db->prepare("DELETE from genero where id_genero=?");
    $sentencia->execute(array($id_genero));
  }
  function agregarGenero($valor){
    $sentencia = $this->db->prepare("INSERT INTO genero(genero) VALUES(?)");
    $sentencia->execute(array($valor));
  }
}
 ?>
