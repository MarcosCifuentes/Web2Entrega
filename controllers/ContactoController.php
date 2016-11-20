<?php
require_once('views/ContactoView.php');
require_once ('models/ContactoModel.php');

class  ContactoController
{
  private $vista;
  private $model;

  function __construct(){
    $this->model = new ContactoModel();
    $this->vista = new ContactoView();
  }

  function mostrarMensajes(){
    if(!isset($_SESSION["privilegio"])){
      $privilegios=0;
    }else{
      $privilegios= $_SESSION["privilegio"];
    }
    $contactos=$this->model->getMensajes();
    $session = $this->checkSession();
    $this->vista->mostrarMensajes($contactos, $session, $privilegios);
  }

  function enviarMensaje(){
    $nombreyapellido = $_POST['nombreyapellido'];
    $email = $_POST['email'];
    $mensaje =  $_POST['mensaje'];
    if (isset($nombreyapellido,$email,$mensaje)&&($nombreyapellido!="")&&($email!="")&&($mensaje!="")) {
      $this->model->enviarMensaje($nombreyapellido,$email,$mensaje);
    }
    $this->mostrarMensajes();
  }

  function eliminarMensaje(){
    $key = $_GET['id_contacto'];
    if (isset($key)){
      $this->model->eliminarMensaje($key);
    }
    $this->mostrarMensajes();
  }

  function checkSession(){
    if (isset($_SESSION["privilegio"])) {
      return true;
    }else{
      return false;
    }
  }
}
?>
