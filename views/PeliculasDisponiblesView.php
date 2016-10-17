<?php
require_once('libs/Smarty.class.php');

class PeliculasDisponiblesView
{
private $smarty;

  function __construct(){
  $this->smarty = new Smarty();
  }

  function mostrar($peliculas){
    $this->smarty->assign('peliculas',$peliculas);
    $this->smarty->display('templates/peliculasdisponibles.tpl');
  }
}


 ?>
