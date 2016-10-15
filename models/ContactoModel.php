<?php

class ContactoModel
{
  private $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;dbname=cinema_false;charset=utf8', 'root', '');

  }

  function getMensajes(){
      $sentencia = $this->db->prepare( "select * from contacto");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
