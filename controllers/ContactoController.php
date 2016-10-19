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
  function mostrarMensajes(){
    $contactos=$this->model->getMensajes();
    $this->vista->mostrarMensajes($contactos);
  }

  function enviarMensaje(){
      $nombreyapellido = $_POST['nombreyapellido'];
      $email = $_POST['email'];
      $mensaje =  $_POST['mensaje'];
      if (($nombreyapellido!="")&&($email!="")&&($mensaje!="")) {
      $this->model->enviarMensaje($nombreyapellido,$email,$mensaje);
    }
    $this->mostrarMensajes();
  }

  function eliminarMensaje(){
    $key = $_GET['id_contacto'];
    $this->model->eliminarMensaje($key);
    $this->mostrarMensajes();
  }
}
 ?>
