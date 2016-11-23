<?php
require_once ('models/PeliculasDisponiblesModel.php');
require_once ('controllers/PeliculasDisponiblesController.php');
require_once ('views/GeneroView.php');
require_once ('models/GeneroModel.php');
require_once ('controllers/CinemaController.php');

class GeneroController extends CinemaController{
  private $model;
  private $modelPelicula;
  private $view;

  function __construct(){
    $this->view = new GeneroView();
    $this->model = new GeneroModel();
    $this->modelPelicula = new PeliculasDisponiblesModel();
  }

  function mostrarGenero(){
      if(!isset($_SESSION["privilegio"])){
        $privilegios=0;
      }else{
        $privilegios= $_SESSION["privilegio"];
      }
      $generos = $this->getGeneros();
      $session = $this->checkSession();
      $this->view->mostrarGenero($generos, $session, $privilegios);
  }

  function listarPeliculasGenero(){
    if(isset($_POST['genero'])) {
      $mostrar =  $_POST['genero'];
      $genero= $this->modelPelicula->getPeliculasGenero($mostrar);
      $this->view->listarPeliculasGenero($genero);
    }
  }

  function getGeneros(){
      return $this->model->getGeneros();
  }

  function editarGenero(){
    if(($_SESSION["privilegio"])=="administrador"){
      $id_genero = $_POST["id_genero"];
      $genero = $_POST["generonuevo"];
      $this->model->editarGenero($id_genero,$genero);
      $this->mostrarGenero();
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

  function eliminarGenero(){
    if(($_SESSION["privilegio"])=="administrador"){
      $key = $_POST["genero"];
      if (isset($key)){
        $this->modelPelicula->eliminarPeliculaGenero($key);
        $this->model->eliminarGenero($key);
      }
      $this->mostrarGenero();
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

  function agregarGenero(){
    if(($_SESSION["privilegio"])=="administrador"){
      $genero = $_POST["genero"];
      if(isset($genero)&&($genero!=="")) {
        $this->model->agregarGenero($genero);
        $this->mostrarGenero();
      }
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

}
?>
