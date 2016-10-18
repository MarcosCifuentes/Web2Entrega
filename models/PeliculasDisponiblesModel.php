<?php

class PeliculasDisponiblesModel{

private $db;

function __construct()
{
  $this->db = new PDO('mysql:host=localhost;dbname=cinema_false;charset=utf8', 'root', '');
}
  function getPeliculas(){
      $sentencia = $this->db->prepare( "select * from pelicula");
      $sentencia->execute();
      $peliculas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

      return $peliculas;
    }

  function getGeneros(){
      $sentencia = $this->db->prepare( "select * from genero");
      $sentencia->execute();
      $generos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

      return $generos;
    }

  function agregarPelicula($nuevapelicula, $imagen){
      $path="images/".uniqid()."_".$imagen["name"];
      move_uploaded_file($imagen["tmp_name"], $path);
      $sentencia = $this->db->prepare("INSERT INTO pelicula(titulo,descripcion,duracion,fk_genero,path) VALUES(:titulo,:descripcion,:duracion,:genero,:imagen)");
      $sentencia->execute(array($pelicula));
      $id_pelicula = $this->db->lastInsertId();
}

  function eliminarPelicula($id_pelicula){
    $sentencia = $this->db->prepare("delete from pelicula where id_pelicula=?");
    $sentencia->execute(array($id_pelicula));
    return $sentencia->rowCount();
  }
}


?>
