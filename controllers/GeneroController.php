<?php
require_once ('model/PeliculasDisponiblesModel.php');
require_once ('controller/PeliculasDisponiblesController.php');
require_once ('view/GeneroView.php');
require_once ('model/GeneroModel.php');

class GeneroController extends PeliculasDisponiblesController{
  private $model;
  function __construct(){
    parent::__construct();
    $this->view = new GeneroView();
    $this->model = new GeneroModel();
  }
  function iniciar(){
    $generos = $this->getGeneros();
    $this->view->iniciar($generos);
  }
  function buscarPeliculasGenero(){
    $id_genero = $_POST["id_genero"];
    //llega
    $generos = $this->model->buscarPeliculasGenero($id_genero);
    $generos = $this->getGeneros();
    $this->view->mostrarPeliculasGenero($peliculas,$generos);
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
  }
  function crearGenero(){
    $valor = $_POST["valorGenero"];
    $this->model->crearGenero($valor);
  }
}
 ?>
