<?php
require_once('libs/Smarty.class.php');

class CinemaView
{
  private $smarty;
  function __construct()
  {
    $this->smarty = new Smarty();
  }

  function mostrar () {
    $this->smarty->display('index.tpl');
  }
  function mostrarContenido () {
    $this->smarty->display('home.tpl');
  }


}

 ?>
