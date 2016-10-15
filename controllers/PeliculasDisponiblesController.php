<?php
require_once('views/PeliculasDisponiblesView.php');

class  PeliculasDisponiblesController
{
  private $vista;



  function __construct()
  {
    $this->vista = new PeliculasDisponiblesView();
  }

  function mostrar(){
    $this->vista->mostrar();

  }
}

 ?>
