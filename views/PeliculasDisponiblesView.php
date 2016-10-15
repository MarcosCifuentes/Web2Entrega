<?php

require_once('libs/Smarty.class.php');


class PeliculasDisponiblesView
{
private $smarty;

  function __construct(){

  $this->smarty = new Smarty();

  }

  function mostrar(){
    $this->smarty->display('peliculasdisponibles.tpl');
  }
}


 ?>
