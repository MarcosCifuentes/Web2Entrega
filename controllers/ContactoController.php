<?php
require_once('views/ContactoView.php');
require_once ('models/ContactoModel.php');
require_once ('controllers/CinemaController.php');

class ContactoController extends CinemaController{
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
    if(($_SESSION["privilegio"])=="administrador"){
      $id_contacto = $_GET['datos'];
      if (isset($id_contacto)){
        $this->model->eliminarMensaje($id_contacto);
      }
      $this->mostrarMensajes();
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

}
?>
