<?php
include_once ('models/Model.php');

class PeliculasDisponiblesModel extends Model{
protected $db;
protected $modelGenero;

function __construct(){
  parent::__construct();
  $this->modelGenero = new GeneroModel();
}

  function getPeliculas(){
      $sentencia = $this->db->prepare( "select * from pelicula");
      $sentencia->execute();
      $peliculas=array();
      while ($pelicula = $sentencia->fetch(PDO::FETCH_ASSOC)) {
        $pelicula["genero"] = $this->modelGenero->getGenero($pelicula["fk_id_genero"]);
        $peliculas[]=$pelicula;
      }

      return $peliculas;
    }
    function getPelicula($id_pelicula){
        $sentencia = $this->db->prepare( "select * from pelicula where id_pelicula=?");
        $sentencia->execute(array($id_pelicula));
        $pelicula = $sentencia->fetch(PDO::FETCH_ASSOC);

        return $pelicula;

      }

  function agregarPelicula($titulo,$descripcion,$duracion,$genero,$imagen){
      $path="images/".uniqid()."_".$imagen["name"];
      move_uploaded_file($imagen["tmp_name"], $path);
      $sentencia = $this->db->prepare("INSERT INTO pelicula(titulo,descripcion,duracion,fk_id_genero,imagen) VALUES(?,?,?,?,?)");
      $sentencia->execute(array($titulo,$descripcion,$duracion,$genero,$path));
}
  function eliminarPelicula($pelicula){
    $sentencia = $this->db->prepare("DELETE from pelicula where id_pelicula=?");
    $sentencia->execute(array($pelicula));
  }

  function eliminarPeliculaGenero($id_genero){
    $sentencia = $this->db->prepare("DELETE from pelicula where fk_id_genero=?");
    $sentencia->execute(array($id_genero));
  }

  function getPeliculasHorario(){
    $sentencia = $this->db->prepare("SELECT * from pelicula");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getPeliculaHorario($fk_pelicula) {
  $sentencia = $this->db->prepare("SELECT titulo from pelicula where id_pelicula = ?");
  $sentencia->execute(array($fk_pelicula));
  $titulo=$sentencia->fetch(PDO::FETCH_ASSOC)["titulo"];
  return $titulo;
}

  function editarPelicula($id_pelicula,$titulo,$duracion,$genero,$descripcion){
    $sentencia = $this->db->prepare("UPDATE pelicula SET titulo=?,duracion=?,fk_id_genero=?,descripcion=? WHERE  id_pelicula=?");
    $sentencia->execute(array($titulo,$duracion,$genero,$descripcion,$id_pelicula));

}

}
?>
