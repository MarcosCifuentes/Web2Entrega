<?php
require_once("libs/Smarty.class.php");
require_once("views/PeliculasDisponiblesView.php");

class GeneroView extends PeliculasDisponiblesView{

  function __construct(){
    parent::__construct();
  }

  function mostrarGenero($generos, $session, $privilegios){
    $this->smarty->assign("generos",$generos);
    $this->smarty->assign('session', $session);
    $this->smarty->assign('privilegios', $privilegios);
    $this->smarty->display("peliculasgenero.tpl");
  }

  function listarPeliculasGenero($generos){
    $this->smarty->assign("generos", $generos);
    $this->smarty->display("filtropeliculas.tpl");
  }

}
?>
