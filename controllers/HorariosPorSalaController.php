<?php
require_once('views/HorariosPorSalaView.php');
require_once ('models/HorariosPorSalaModel.php');
require_once ('models/PeliculasDisponiblesModel.php');

class  HorariosPorSalaController{
  private $vista;
  private $model;
  private $modelPelicula;

  function __construct()
  {
    $this->model = new HorariosPorSalaModel();
    $this->vista = new HorariosPorSalaView();
    $this->modelpelicula = new PeliculasDisponiblesModel();
  }

  function mostrarHorarios(){
    $horarios=$this->model->getHorarios();
    $peliculas = $this->modelpelicula->getPeliculasHorario();
    $this->vista->mostrarHorarios($horarios,$peliculas);

  }
  function agregarHorario(){

      $titulo = $_POST['titulo'];
      $sala = $_POST['sala'];
      $horario =  $_POST['horario'];
      if (isset($titulo,$sala,$horario)&&($sala!=="")&&($horario!=="")) {
      $this->model->agregarHorario($titulo,$sala,$horario);
    }
    $this->mostrarHorarios();
  }


  function eliminarHorario(){
    $key = $_GET['id_horario'];
    if (isset($key)){
    $this->model->eliminarHorario($key);
  }
    $this->mostrarHorarios();
  }
}

 ?>
