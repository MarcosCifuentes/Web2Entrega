<?php
require_once('views/CinemaView.php');

class CinemaController
{
  private $vista;

  function __construct()
  {
    $this->vista = new CinemaView();
  }

  function iniciar () {

    $this->vista->mostrar();
  }
  function iniciarContenido () {

    $this->vista->mostrarContenido();
  }

}

 ?>
