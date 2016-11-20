<?php
require_once('views/CinemaView.php');
session_start();
class CinemaController{
  private $vista;

  function __construct(){
    $this->vista = new CinemaView();
  }

  function iniciar(){
    $session = $this->checkSession();
    $this->vista->mostrar($session);
  }

  function iniciarContenido(){
    $this->vista->mostrarContenido();
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
