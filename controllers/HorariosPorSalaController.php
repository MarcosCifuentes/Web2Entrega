<?php
require_once('views/HorariosPorSalaView.php');
require_once ('models/HorariosPorSalaModel.php');

class  HorariosPorSalaController
{
  private $vista;
  private $model;


  function __construct()
  {
    $this->model = new HorariosPorSalaModel();
    $this->vista = new HorariosPorSalaView();
  }

  function mostrar(){
    $this->model->getHorarios();
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
