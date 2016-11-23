<?php
require_once('libs/Smarty.class.php');

class PeliculasDisponiblesView{
  protected $smarty;

  function __construct(){
    $this->smarty = new Smarty();
  }

  function mostrarPeliculas ($peliculas, $generos, $session, $privilegios) {
    $this->smarty->assign('peliculas', $peliculas);
    $this->smarty->assign('generos', $generos);
    $this->smarty->assign('session', $session);
    $this->smarty->assign('privilegios', $privilegios);
    $this->smarty->display('peliculasdisponibles.tpl');
  }

  function mostrarPeliculaElegida ($pelicula, $session, $privilegios) {
    $this->smarty->assign('pelicula', $pelicula);
    $this->smarty->assign('session', $session);
    $this->smarty->assign('privilegios', $privilegios);
    $this->smarty->display('peliculaelegida.tpl');
  }

  function mostrarEditorPelicula($pelicula, $generos){
    $this->smarty->assign('pelicula', $pelicula);
    $this->smarty->assign('generos', $generos);
    $this->smarty->display('editarpelicula.tpl');
  }


}

?>
