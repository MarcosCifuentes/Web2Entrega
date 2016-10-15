<?php

class PeliculasDisponiblesModel
{
  private $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;dbname=cinema_false;charset=utf8', 'root', '');

  }

  function getHorarios(){
      $sentencia = $this->db->prepare( "select * from pelicula");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
