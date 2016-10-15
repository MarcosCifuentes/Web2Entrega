<?php
require_once('views/HorariosPorSalaView.php');

class  HorariosPorSalaController
{
  private $vista;



  function __construct()
  {
    $this->vista = new HorariosPorSalaView();
  }

  function mostrar(){
    $this->vista->mostrar();

  }
}

 ?>
