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

  function agregarPelicula(){
    if(isset($_POST['sala'])&&($_POST['sala'])!=""){
      $titulo = $_POST['titulo'];
      $sala = $_POST['sala'];
      $horario =  $_POST['horario'];
      $this->modelo->agregarPelicula($nuevapelicula);
      }
}

  function eliminarPelicula(){
    $key = $_GET['id_horario'];
    $this->modelo->eliminarPelicula($key);
  }
}

 ?>
