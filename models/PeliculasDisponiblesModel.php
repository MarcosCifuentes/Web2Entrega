<?php
include_once ('models/Model.php');

class PeliculasDisponiblesModel extends Model{

  protected $modelGenero;

  function __construct(){
    parent::__construct();
    $this->modelGenero = new GeneroModel();
  }

  function getPeliculasGenero($id_genero){
    $sentencia = $this->db->prepare("select * from pelicula where fk_id_genero=?");
    $sentencia->execute(array($id_genero));
    $peliculasGenero=array();
    while ($peliculaGenero = $sentencia->fetch(PDO::FETCH_ASSOC)) {
      $peliculaGenero["genero"] = $this->modelGenero->getGenero($peliculaGenero["fk_id_genero"]);
      $peliculasGenero[]=$peliculaGenero;
    }
    foreach ($peliculasGenero as $key => $peliculaGenero) {
      $peliculasGenero[$key]['imagenes']=$this->getImagenes($peliculaGenero['id_pelicula']);
    }
    return ($peliculasGenero);
  }

  function getPeliculas(){
    $sentencia = $this->db->prepare( "select * from pelicula");
    $sentencia->execute();
    $peliculas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    return $peliculas;
  }

  function getImagenes($id_pelicula){
    $sentencia = $this->db->prepare( "select * from imagen where fk_id_pelicula=?");
    $sentencia->execute(array($id_pelicula));
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getPelicula($id_pelicula){
    $sentencia = $this->db->prepare( "select * from pelicula where id_pelicula=?");
    $sentencia->execute(array($id_pelicula));
    $pelicula = $sentencia->fetch(PDO::FETCH_ASSOC);

    return $pelicula;

  }

  function getPeliculaElegida($id_pelicula){
    $sentencia = $this->db->prepare( "select * from pelicula where id_pelicula=?");
    $sentencia->execute(array($id_pelicula));
    $pelicula = $sentencia->fetch(PDO::FETCH_ASSOC);
    $pelicula["genero"] = $this->modelGenero->getGenero($pelicula["fk_id_genero"]);
    $pelicula['imagenes']=$this->getImagenes($pelicula['id_pelicula']);

    return $pelicula;
  }

  function agregarPelicula($titulo,$descripcion,$duracion,$genero,$imagenes){
    $sentencia = $this->db->prepare("INSERT INTO pelicula(titulo,descripcion,duracion,fk_id_genero) VALUES(?,?,?,?)");
    $sentencia->execute(array($titulo,$descripcion,$duracion,$genero));

    $id_pelicula = $this->db->lastInsertId();

    $max = sizeof($imagenes["name"]);

    for ($i=0; $i < $max; $i++) {
      $path="images/".uniqid()."_".$imagenes["name"][$i];
      move_uploaded_file($imagenes["tmp_name"][$i], $path);
      $insertImage = $this->db->prepare("INSERT INTO imagen(fk_id_pelicula,path) VALUES(?,?)");
      $insertImage->execute(array($id_pelicula,$path));
    }
  }

  function eliminarPelicula($pelicula){
    $sentencia = $this->db->prepare("DELETE from pelicula where id_pelicula=?");
    $sentencia->execute(array($pelicula));
  }

  function eliminarPeliculaGenero($id_genero){
    $sentencia = $this->db->prepare("SELECT * from pelicula where fk_id_genero=?");
    $sentencia->execute(array($id_genero));
    while ($pelicula = $sentencia->fetch(PDO::FETCH_ASSOC)) {
      $this->eliminarImagenes($pelicula["id_pelicula"]);
      $this->eliminarPelicula($pelicula["id_pelicula"]);
    }

  }


  function eliminarImagenes($pelicula){
    $sentencia = $this->db->prepare("DELETE from imagen where fk_id_pelicula=?");
    $sentencia->execute(array($pelicula));
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

  function editarPelicula($id_pelicula,$titulo,$duracion,$genero,$descripcion,$imagenes){
    $sentencia = $this->db->prepare("UPDATE pelicula SET titulo=?,duracion=?,fk_id_genero=?,descripcion=? WHERE  id_pelicula=?");
    $sentencia->execute(array($titulo,$duracion,$genero,$descripcion,$id_pelicula));

    $max = sizeof($imagenes["name"]);

    for ($i=0; $i < $max; $i++) {
      $path="images/".uniqid()."_".$imagenes["name"][$i];
      move_uploaded_file($imagenes["tmp_name"][$i], $path);
      $insertImage = $this->db->prepare("INSERT INTO imagen(fk_id_pelicula,path) VALUES(?,?)");
      $insertImage->execute(array($id_pelicula,$path));
    }
  }

  function eliminarImagen($id_imagen){
    $sentencia = $this->db->prepare("DELETE from imagen where id_imagen=?");
    $sentencia->execute(array($id_imagen));
  }

}
?>
