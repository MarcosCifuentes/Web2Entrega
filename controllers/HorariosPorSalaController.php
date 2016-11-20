<?php
require_once('views/HorariosPorSalaView.php');
require_once ('models/HorariosPorSalaModel.php');
require_once ('models/PeliculasDisponiblesModel.php');

class  HorariosPorSalaController{
  private $vista;
  private $model;
  private $modelPelicula;

  function __construct(){
    $this->model = new HorariosPorSalaModel();
    $this->vista = new HorariosPorSalaView();
    $this->modelPelicula = new PeliculasDisponiblesModel();
  }

  function mostrarHorarios(){
    if(!isset($_SESSION["privilegio"])){
      $privilegios=0;
    }else{
      $privilegios= $_SESSION["privilegio"];
    }
    $horarios=$this->model->getHorarios();
    $session = $this->checkSession();
    $peliculas = $this->modelPelicula->getPeliculasHorario();
    $this->vista->mostrarHorarios($horarios, $peliculas, $session, $privilegios);

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

  function editorHorario(){
    $id_horario = $_GET['id_horario'];
    if (isset($id_horario)){
      $horario = $this->model->getHorario($id_horario);
      $peliculas = $this->modelPelicula->getPeliculas();
      $this->vista->mostrarEditorHorario($horario, $peliculas);
    }
  }

  function editarHorario(){
    $id_horario = $_POST["id_horario"];
    $pelicula = $_POST["pelicula"];
    $sala = $_POST["sala"];
    $horario = $_POST["horario"];
    if (isset($id_horario,$pelicula,$sala,$horario)){
      $this->model->editarHorario($id_horario,$pelicula,$sala,$horario);
    }
    $this->mostrarHorarios();

  }

  function eliminarHorario(){
    $id_horario = $_GET['id_horario'];
    if (isset($key)){
      $this->model->eliminarHorario($id_horario);
    }
    $this->mostrarHorarios();
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
