<?php
require_once('libs/Smarty.class.php');

class CinemaView{
  private $smarty;

  function __construct(){
    $this->smarty = new Smarty();
  }

  function mostrar ($session,$privilegios) {
    $this->smarty->assign('session', $session);
    $this->smarty->assign('privilegios', $privilegios);
    $this->smarty->display('index.tpl');
  }

  function mostrarContenido ($session,$privilegios) {
    $this->smarty->assign('session', $session);
    $this->smarty->assign('privilegios', $privilegios);
    $this->smarty->display('home.tpl');
  }

}

?>
