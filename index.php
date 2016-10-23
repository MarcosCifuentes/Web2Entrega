<?php
require('controllers/CinemaController.php');
require('controllers/ContactoController.php');
require('controllers/HorariosPorSalaController.php');
require('controllers/PeliculasDisponiblesController.php');
require('controllers/GeneroController.php');
require('config/ConfigApp.php');

$cinemaController = new CinemaController();
$contactoController = new ContactoController();
$horariosPorSalaController = new HorariosPorSalaController();
$peliculasDisponiblesController = new PeliculasDisponiblesController();
$generoController = new GeneroController();

if (!array_key_exists(ConfigApp::$ACTION,$_REQUEST)){
  $cinemaController->iniciar();

}else{

switch ($_REQUEST[ConfigApp::$ACTION]) {
  case ConfigApp::$ACTION_MOSTRAR_HOME:
  $cinemaController->iniciarContenido();
  break;

  case ConfigApp::$ACTION_MOSTRAR_HORARIOS_POR_SALA:
  $horariosPorSalaController->mostrarHorarios();
  break;

  case ConfigApp::$ACTION_MOSTRAR_CONTACTO:
  $contactoController->mostrarMensajes();
  break;

  case ConfigApp::$ACTION_MOSTRAR_PELICULAS_GENERO:
  $generoController->iniciar();
  break;

  case ConfigApp::$ACTION_MOSTRAR_PELICULAS_DISPONIBLES:
  $peliculasDisponiblesController->mostrarPeliculas();
  break;

  case ConfigApp::$ACTION_AGREGAR_PELICULA:
  $peliculasDisponiblesController->agregarPelicula();
  break;

  case ConfigApp::$ACTION_ELIMINAR_PELICULA:
  $peliculasDisponiblesController->eliminarPelicula();
  break;

  case ConfigApp::$ACTION_EDITAR_PELICULA:
  $horariosPorSalaController->eliminarHorario();
  break;

  case ConfigApp::$ACTION_LISTAR_PELICULAS_GENERO:
  $generoController->mostrarPeliculasGenero();
  break;

  case ConfigApp::$ACTION_AGREGAR_GENERO:
  $generoController->agregarGenero();
  break;

  case ConfigApp::$ACTION_ELIMINAR_GENERO:
  $generoController->eliminarGenero();
  break;

  case ConfigApp::$ACTION_EDITAR_GENERO:
  $horariosPorSalaController->eliminarHorario();
  break;

  case ConfigApp::$ACTION_AGREGAR_HORARIO:
  $horariosPorSalaController->agregarHorario();
  break;

  case ConfigApp::$ACTION_ELIMINAR_HORARIO:
  $horariosPorSalaController->eliminarHorario();
  break;

  case ConfigApp::$ACTION_EDITAR_HORARIO:
  $horariosPorSalaController->eliminarHorario();
  break;

  case ConfigApp::$ACTION_ELIMINAR_MENSAJE:
  $contactoController->eliminarMensaje();
  break;

  case ConfigApp::$ACTION_ENVIAR_MENSAJE:
  $contactoController->enviarMensaje();
  break;

  default:
  $cinemaController->iniciar();
  break;
}
}

 ?>
