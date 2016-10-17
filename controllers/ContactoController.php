<?php
require_once('views/ContactoView.php');
require_once ('models/ContactoModel.php');

class  ContactoController
{
  private $vista;
  private $model;

  function __construct()
  {
    $this->model = new ContactoModel();
    $this->vista = new ContactoView();
  }
  function mostrar(){
    $this->model->getMensajes();
    $this->vista->mostrar();
  }

  function eliminarMensaje(){
    $key = $_GET['id_contacto'];
    $this->modelo->eliminarMensaje($key);
  }
}
 ?>
