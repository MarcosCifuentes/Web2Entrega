<?php
require_once ('models/PeliculasDisponiblesModel.php');
require_once ('controllers/PeliculasDisponiblesController.php');
require_once ('views/GeneroView.php');
require_once ('views/GeneroAdminView.php');
require_once ('models/GeneroModel.php');

class GeneroController extends PeliculasDisponiblesController{
  protected $model;
  protected $modelPelicula;
  protected $view;
  protected $vistaAdmin;

  function __construct(){
    parent::__construct();
    $this->view = new GeneroView();
    $this->model = new GeneroModel();
    $this->modelPelicula = new PeliculasDisponiblesModel();
    $this->vistaAdmin = new GeneroAdminView();
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

  function editorGenero(){
    $id_genero = $_POST['id_genero'];
    $genero = $this->model->getGenero($id_genero);
    $this->vistaAdmin->mostrarEditorGenero($genero);
  }

  function editarGenero(){
    $id_genero = $_POST["id_genero"];
    $genero = $_POST["genero"];
    $this->modelGenero->editarGenero($id_genero,$genero);
  }
  function eliminarGenero(){
    $key = $_POST["genero"];
    $this->model->eliminarGenero($key);
    $this->modelPelicula->eliminarPeliculaGenero($key);
    $this->iniciar();
  }
  function agregarGenero(){
    $genero = $_POST["genero"];
    if(isset($genero)&&($genero!=="")) {
    $this->model->agregarGenero($genero);
    $this->iniciar();
  }
  }
  function mostrarGeneroAdmin(){
    $generos = $this->getGeneros();
    $admin = true;
    $this->vistaAdmin->mostrarGeneroAdmin($generos, $admin);
  }
}
 ?>
