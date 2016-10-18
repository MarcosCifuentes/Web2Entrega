<?php
require_once("libs/Smarty.class.php");
require_once("views/PeliculasDisponiblesView.php");
class GeneroView extends PeliculasDisponiblesView{
  function __construct(){
    parent::__construct();
  }
  function iniciar($generos){
    $this->smarty->assign("generos",$generos);
    $this->smarty->display("genero.tpl");
  }
  function mostrarPeliculasGenero($peliculas,$generos){
    $this->smarty->assign("generos", $generos);
    $this->smarty->assign("peliculas", $peliculas);
    $this->smarty->display("genero.tpl");
  }
}
?>
