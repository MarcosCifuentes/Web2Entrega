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
      $contactos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

      return $contactos;
    }

  function eliminarMensaje($id_contacto){
    $sentencia = $this->db->prepare("delete from contacto where id_contacto=?");
    $sentencia->execute(array($id_contacto));
    return $sentencia->rowCount();
  }
}

?>
