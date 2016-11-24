<?php
require_once('views/CinemaView.php');
session_start();
class CinemaController{
  private $vista;

  function __construct(){
    $this->vista = new CinemaView();
  }

  function iniciar(){
    if(!isset($_SESSION["privilegio"])){
      $privilegios=0;
    }else{
      $privilegios= $_SESSION["privilegio"];
    }
    $session = $this->checkSession();
    $this->vista->mostrar($session,$privilegios);
  }

  function iniciarContenido(){
    if(!isset($_SESSION["privilegio"])){
      $privilegios=0;
    }else{
      $privilegios= $_SESSION["privilegio"];
    }
    $session = $this->checkSession();
    $this->vista->mostrarContenido($session,$privilegios);
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
