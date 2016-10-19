<?php
require_once('views/HorariosPorSalaView.php');
require_once ('models/HorariosPorSalaModel.php');

class  HorariosPorSalaController{
  private $vista;
  private $model;


  function __construct()
  {
    $this->model = new HorariosPorSalaModel();
    $this->vista = new HorariosPorSalaView();
  }

  function mostrarHorarios(){
    $peliculas=$this->model->getHorarios();
    $this->vista->mostrarHorarios($peliculas);

  }
  function agregarHorario(){

      $pelicula = $_POST['pelicula'];
      $sala = $_POST['sala'];
      $horario =  $_POST['horario'];
      if (($pelicula!=="")&&($sala!=="")&&($horario!=="")) {
      $this->model->agregarHorario($pelicula,$sala,$horario);
    }
    $this->mostrarHorarios();
  }


  function eliminarHorario(){
    $key = $_GET['id_horario'];
    $this->modelo->eliminarHorario($key);
    $this->mostrarHorarios();
  }
}

 ?>
