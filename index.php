<?php
require('controllers/CinemaController.php');
require('controllers/ContactoController.php');
require('controllers/HorariosPorSalaController.php');
require('config/ConfigApp.php');

$cinemaController = new CinemaController();
$contactoController = new ContactoController();
$horariosposalaController = new HorariosPorSalaController();

if (!array_key_exists(ConfigApp::$ACTION,$_REQUEST)){
  $cinemaController->iniciar();
  die();
}
switch ($_REQUEST[ConfigApp::$ACTION]) {
  case ConfigApp::$ACTION_MOSTRAR_HORARIOS_POR_SALA:
  $horariosposalaController->mostrar();
  break;
  case ConfigApp::$ACTION_MOSTRAR_CONTACTO:
  $contactoController->mostrar();
  break;
  default:
  $cinemaController->iniciar();
  break;
}

 ?>
