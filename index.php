<?php
require('controllers/CinemaController.php');
require('controllers/ContactoController.php');
require('controllers/HorariosPorSalaController.php');
require('controllers/PeliculasDisponiblesController.php');
require('config/ConfigApp.php');

$cinemaController = new CinemaController();
$contactoController = new ContactoController();
$horariosPorSalaController = new HorariosPorSalaController();
$peliculasDisponiblesController = new PeliculasDisponiblesController();

if (!array_key_exists(ConfigApp::$ACTION,$_REQUEST)){
  $cinemaController->iniciar();
  die();
}
switch ($_REQUEST[ConfigApp::$ACTION]) {
  case ConfigApp::$ACTION_MOSTRAR_HORARIOS_POR_SALA:
  $horariosPorSalaController->mostrar();
  break;
  case ConfigApp::$ACTION_MOSTRAR_CONTACTO:
  $contactoController->mostrar();
  break;
  case ConfigApp::$ACTION_MOSTRAR_PELICULAS_DISPONIBLES:
  $peliculasDisponiblesController->mostrar();
  break;
  case ConfigApp::$ACTION_AGREGAR_PELICULA:
  $peliculasDisponiblesController->agregarPelicula();
  $horariosPorSalaController->agregarPelicula();
  break;
  case ConfigApp::$ACTION_ELIMINAR_PELICULA:
  $peliculasDisponiblesController->eliminarPelicula();
  $horariosPorSalaController->eliminarPelicula();
  break;
  case ConfigApp::$ACTION_ELIMINAR_MENSAJE:
  $contactoController->eliminarMensaje();
  break;
  default:
  $cinemaController->iniciar();
  break;
}

 ?>
