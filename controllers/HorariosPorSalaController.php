<?php
require_once('views/HorariosPorSalaView.php');
require_once ('models/HorariosPorSalaModel.php');
require_once ('models/PeliculasDisponiblesModel.php');
require_once ('controllers/CinemaController.php');

class HorariosPorSalaController extends CinemaController{
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
    if(($_SESSION["privilegio"])=="administrador"){
      $titulo = $_POST['titulo'];
      $sala = $_POST['sala'];
      $horario =  $_POST['horario'];
      if (isset($titulo,$sala,$horario)&&($sala!=="")&&($horario!=="")) {
        $this->model->agregarHorario($titulo,$sala,$horario);
      }
      $this->mostrarHorarios();
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

  function editorHorario(){
    if(($_SESSION["privilegio"])=="administrador"){
      $id_horario = $_GET['datos'];
      if (isset($id_horario)){
        $horario = $this->model->getHorario($id_horario);
        $peliculas = $this->modelPelicula->getPeliculas();
        $this->vista->mostrarEditorHorario($horario, $peliculas);
      }
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

  function editarHorario(){
    if(($_SESSION["privilegio"])=="administrador"){
      $id_horario = $_POST["id_horario"];
      $pelicula = $_POST["pelicula"];
      $sala = $_POST["sala"];
      $horario = $_POST["horario"];
      if (isset($id_horario,$pelicula,$sala,$horario)){
        $this->model->editarHorario($id_horario,$pelicula,$sala,$horario);
      }
      $this->mostrarHorarios();
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

  function eliminarHorario(){
    if(($_SESSION["privilegio"])=="administrador"){
      $id_horario = $_GET['datos'];
      if (isset($id_horario)){
        $this->model->eliminarHorario($id_horario);
      }
      $this->mostrarHorarios();
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

}

?>
