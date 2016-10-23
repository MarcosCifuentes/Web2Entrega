<?php
require_once('libs/Smarty.class.php');

class PeliculasDisponiblesView{
protected $smarty;

  function __construct(){
  $this->smarty = new Smarty();
  }

  function mostrarPeliculas($peliculas, $generos){
  $this->smarty->assign("peliculas",$peliculas);
  $this->smarty->assign("generos",$generos);
  $this->smarty->display("peliculasdisponibles.tpl");
}

}

 ?>
