<?php
require_once('views/PeliculasDisponiblesView.php');
require_once ('models/PeliculasDisponiblesModel.php');
require_once ('models/GeneroModel.php');

class  PeliculasDisponiblesController{

  private $vista;
  private $model;
  private $modelGenero;

  function __construct(){
    $this->model = new PeliculasDisponiblesModel();
    $this->vista = new PeliculasDisponiblesView();
    $this->modelGenero = new GeneroModel();

  }

  function mostrarPeliculas(){
    if(!isset($_SESSION["privilegio"])){
      $privilegios=0;
    }else{
      $privilegios= $_SESSION["privilegio"];
    }
    $peliculas = $this->model->getPeliculas();
    $generos = $this->modelGenero->getGeneros();
    $session = $this->checkSession();
    $this->vista->mostrarPeliculas($peliculas, $generos, $session, $privilegios);
  }


  function editorPelicula(){
    $id_pelicula = $_GET['id_pelicula'];
    if (isset($id_pelicula)){
      $pelicula = $this->model->getPelicula($id_pelicula);
      $generos = $this->modelGenero->getGeneros();
      $this->vista->mostrarEditorPelicula($pelicula, $generos);
    }
  }

  function editarPelicula(){
    $id_pelicula = $_POST["id_pelicula"];
    $titulo = $_POST["titulo"];
    $duracion = $_POST["duracion"];
    $genero = $_POST["genero"];
    $descripcion = $_POST["descripcion"];
    if (isset($id_pelicula,$titulo,$duracion,$genero,$descripcion)){
      $this->model->editarPelicula($id_pelicula,$titulo,$duracion,$genero,$descripcion);
    }
    $this->mostrarPeliculas();

  }

  function agregarPelicula(){
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $duracion =  $_POST['duracion'];
    $genero =  $_POST['genero'];
    $imagenes = $_FILES['imagenes'];
    if (isset($imagenes,$genero)&&($descripcion!="")&&($duracion!="")&&($titulo!="")) {
      $this->model->agregarPelicula($titulo,$descripcion,$duracion,$genero,$imagenes);
    }

    $this->mostrarPeliculas();
  }

  function eliminarPelicula(){
    $key = $_GET['id_pelicula'];
    if (isset($key)){
      $this->model->eliminarPelicula($key);
      $this->model->eliminarImagenes($key);
    }
    $this->mostrarPeliculas();
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
