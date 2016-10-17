<?php
require_once('views/ContactoView.php');

class  ContactoController
{
  private $vista;

  function __construct()
  {
    $this->vista = new ContactoView();
  }
  function mostrar(){
    $this->vista->mostrar();

  }

  function eliminarMensaje(){
    $key = $_GET['id_contacto'];
    $this->modelo->eliminarMensaje($key);
  }
}
 ?>
