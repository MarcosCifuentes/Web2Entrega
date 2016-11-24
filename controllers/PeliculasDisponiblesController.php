<?php
require_once('views/PeliculasDisponiblesView.php');
require_once ('models/PeliculasDisponiblesModel.php');
require_once ('models/GeneroModel.php');
require_once ('controllers/CinemaController.php');

class  PeliculasDisponiblesController extends CinemaController{

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


  function mostrarPeliculaElegida(){
    if(!isset($_SESSION["privilegio"])){
      $privilegios=0;
    }else{
      $privilegios= $_SESSION["privilegio"];
    }
    $id_pelicula = $_GET['datos'];
    $pelicula = $this->model->getPeliculaElegida($id_pelicula);
    $session = $this->checkSession();
    $this->vista->mostrarPeliculaElegida($pelicula, $session, $privilegios);
  }


  function editorPelicula(){
    if(($_SESSION["privilegio"])=="administrador"){
      $id_pelicula = $_GET['datos'];
      if (isset($id_pelicula)){
        $pelicula = $this->model->getPelicula($id_pelicula);
        $generos = $this->modelGenero->getGeneros();
        $this->vista->mostrarEditorPelicula($pelicula, $generos);
      }
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

  function editarPelicula(){
    if(($_SESSION["privilegio"])=="administrador"){
      $id_pelicula = $_POST["id_pelicula"];
      $titulo = $_POST["titulo"];
      $duracion = $_POST["duracion"];
      $genero = $_POST["genero"];
      $descripcion = $_POST["descripcion"];
      $imagenes = $_FILES['imagenes'];
      if (isset($id_pelicula,$titulo,$duracion,$genero,$descripcion,$imagenes)){
        $this->model->editarPelicula($id_pelicula,$titulo,$duracion,$genero,$descripcion,$imagenes);
      }
      $this->mostrarPeliculas();
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }


  function agregarPelicula(){
    if(($_SESSION["privilegio"])=="administrador"){
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
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

  function eliminarPelicula(){
    if(($_SESSION["privilegio"])=="administrador"){
      $id_pelicula = $_GET['datos'];
      if (isset($id_pelicula)){
        $this->model->eliminarPelicula($id_pelicula);
        $this->model->eliminarImagenes($id_pelicula);
      }
      $this->mostrarPeliculas();
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

  function eliminarImagen(){
    if(($_SESSION["privilegio"])=="administrador"){
      $id_imagen = $_GET['datos'];
      if (isset($id_imagen)){
        $this->model->eliminarImagen($id_imagen);
      }
      $this->mostrarPeliculas();
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

}

?>
