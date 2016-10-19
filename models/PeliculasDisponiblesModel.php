<?php

class PeliculasDisponiblesModel{

protected $db;

function __construct()
{
  $this->db = new PDO('mysql:host=localhost;dbname=cinema_false;charset=utf8', 'root', '');
}
  function getPeliculas(){
      $sentencia = $this->db->prepare( "select * from pelicula");
      $sentencia->execute();
      $peliculas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      while ($pelicula = $sentencia->fetch(PDO::FETCH_ASSOC)) {
        $pelicula["fk_id_genero"] = $this->getGenero($pelicula["fk_id_genero"]);
      }
      return $peliculas;
    }

  function agregarPelicula($titulo,$descripcion,$duracion,$genero,$imagen){
      $path="images/".uniqid()."_".$imagen["name"];
      move_uploaded_file($imagen["tmp_name"], $path);
      $sentencia = $this->db->prepare("INSERT INTO pelicula(titulo,descripcion,duracion,fk_id_genero,imagen) VALUES(?,?,?,?,?)");
      $sentencia->execute(array($titulo,$descripcion,$duracion,$genero,$path));

}

  function eliminarPelicula($pelicula){
    $sentencia = $this->db->prepare("delete from pelicula where id_pelicula=?");
    $sentencia->execute(array($pelicula));
  }

  function getGenero($fk_id_genero) {
  $sentencia = $this->db->prepare("select genero from genero where fk_id_genero = ?");
  $sentencia->execute(array($fk_id_genero));
  $genero=$sentencia->fetch(PDO::FETCH_ASSOC)["genero"];
  return $genero;
}
}


?>
