<?php
require_once('views/PeliculasDisponiblesView.php');
require_once('views/PeliculasDisponiblesAdminView.php');
require_once ('models/PeliculasDisponiblesModel.php');
require_once ('models/GeneroModel.php');

class  PeliculasDisponiblesController{

  protected $vista;
  protected $model;
  protected $modelGenero;
  protected $vistaAdmin;

  function __construct(){
    $this->model = new PeliculasDisponiblesModel();
    $this->vista = new PeliculasDisponiblesView();
    $this->vistaAdmin = new PeliculasDisponiblesAdminView();
    $this->modelGenero = new GeneroModel();

  }

  function mostrarPeliculas(){
    $peliculas = $this->model->getPeliculas();
    $generos = $this->modelGenero->getGeneros();
    $this->vista->mostrarPeliculas($peliculas, $generos);
  }


  function editorPelicula(){
    $id_pelicula = $_GET['id_pelicula'];
    if (isset($id_pelicula)){
      $pelicula = $this->model->getPelicula($id_pelicula);
      $generos = $this->modelGenero->getGeneros();
      $this->vistaAdmin->mostrarEditorPelicula($pelicula, $generos);
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
    $this->mostrarPeliculasAdmin();

  }

  function mostrarPeliculasAdmin(){
    $peliculas = $this->model->getPeliculas();
    $generos = $this->modelGenero->getGeneros();
    $admin = true;
    $this->vistaAdmin->mostrarPeliculas($peliculas, $generos, $admin);
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

    $this->mostrarPeliculasAdmin();
  }

  function eliminarPelicula(){
    $key = $_GET['id_pelicula'];
    if (isset($key)){
    $this->model->eliminarPelicula($key);
    $this->model->eliminarImagenes($key);
  }
    $this->mostrarPeliculasAdmin();
  }

}

?>
