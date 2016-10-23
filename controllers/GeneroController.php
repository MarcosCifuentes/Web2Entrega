<?php
require_once ('models/PeliculasDisponiblesModel.php');
require_once ('controllers/PeliculasDisponiblesController.php');
require_once ('views/GeneroView.php');
require_once ('models/GeneroModel.php');

class GeneroController extends PeliculasDisponiblesController{
  protected $model;
  protected $modelPelicula;

  function __construct(){
    parent::__construct();
    $this->view = new GeneroView();
    $this->model = new GeneroModel();
    $this->modelPelicula = new PeliculasDisponiblesModel();

  }
  function iniciar(){
    $generos = $this->getGeneros();
    $this->view->iniciar($generos);
  }
  function mostrarPeliculasGenero(){
    if(isset($_POST['genero'])) {
      $mostrar =  $_POST['genero'];
      $genero= $this->model->mostrarPeliculasGenero($mostrar);
      $this->view->mostrarPeliculasGenero($genero);
    }
  }

  function getGeneros(){
    return $this->model->getGeneros();
  }
  function editarGenero(){
    $id_genero = $_POST["data-idgenero"];
    $valorInput = $_POST["valorInput"];
    $this->modelGenero->editarGenero($id_genero,$valorInput);
  }
  function eliminarGenero(){
    $id_genero = $_GET["id_genero"];
    $this->model->eliminarGenero($id_genero);
    $this->modelPelicula->eliminarPeliculaGenero($id_genero);
  }
  function agregarGenero(){
    $genero = $_POST["genero"];
    $this->model->agregarGenero($genero);
    $this->iniciar();
  }
}
 ?>
