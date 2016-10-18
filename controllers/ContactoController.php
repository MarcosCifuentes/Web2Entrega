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
    $contactos=$this->model->getMensajes();
    $this->vista->mostrar($contactos);
  }

  function enviarMensaje(){
    if(isset($_POST['nombre y apellido'])&&($_POST['nombre y apellido'])!=""){
      $nombreyapellido = $_POST['nombre y apellido'];
      $email = $_POST['email'];
      $mensaje =  $_POST['mensaje'];
      $this->modelo->enviarMensaje($nuevomensaje);
      }
}

  function eliminarMensaje(){
    $key = $_GET['id_contacto'];
    $this->modelo->eliminarMensaje($key);
  }
}
 ?>
