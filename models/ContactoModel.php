<?php

include_once ('models/Model.php');

class ContactoModel extends Model{
  function __construct(){
    parent::__construct();
  }
  
  function getMensajes(){
    $sentencia = $this->db->prepare( "select * from contacto");
    $sentencia->execute();
    $contactos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    return $contactos;
  }

  function enviarMensaje($nombreyapellido,$email,$mensaje){
    $sentencia = $this->db->prepare("INSERT INTO contacto(nombreyapellido,email,mensaje) VALUES(?,?,?)");
    $sentencia->execute(array($nombreyapellido,$email,$mensaje));
  }

  function eliminarMensaje($id_contacto){
    $sentencia = $this->db->prepare("delete from contacto where id_contacto=?");
    $sentencia->execute(array($id_contacto));
  }
}

?>
