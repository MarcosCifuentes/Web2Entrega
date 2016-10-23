<?php
require_once('views/PeliculasDisponiblesView.php');
require_once ('models/PeliculasDisponiblesModel.php');
require_once ('models/GeneroModel.php');

class  PeliculasDisponiblesController{

  protected $vista;
  protected $model;
  protected $modelGenero;

  function __construct(){
    $this->model = new PeliculasDisponiblesModel();
    $this->vista = new PeliculasDisponiblesView();
    $this->modelGenero = new GeneroModel();

  }

  function mostrarPeliculas(){
  $peliculas = $this->model->getPeliculas();
  $generos = $this->modelGenero->getGeneros();
  $this->vista->mostrarPeliculas($peliculas, $generos);
}

  function agregarPelicula(){

      $titulo = $_POST['titulo'];
      $descripcion = $_POST['descripcion'];
      $duracion =  $_POST['duracion'];
      $genero =  $_POST['genero'];
      $imagen = $_FILES['imagen'];
      if (isset($genero)&&($descripcion!="")&&($duracion!="")&&($titulo!="")) {
      $this->model->agregarPelicula($titulo,$descripcion,$duracion,$genero,$imagen);
	  }

    $this->mostrarPeliculas();
}

  function eliminarPelicula(){
    $key = $_GET['id_pelicula'];
    $this->model->eliminarPelicula($key);
    $this->mostrarPeliculas();
  }

}

 ?>
