<?php
require_once('libs/Smarty.class.php');

class PeliculasDisponiblesAdminView
{
  private $smarty;
  function __construct()
  {
    $this->smarty = new Smarty();
  }

  function mostrarPeliculas ($peliculas, $generos, $admin) {
    $this->smarty->assign('peliculas', $peliculas);
    $this->smarty->assign('generos', $generos);
    $this->smarty->assign('admin', $admin);
    $this->smarty->display('peliculasdisponibles.tpl');
  }
  function mostrarEditorPelicula($pelicula, $generos){
    $this->smarty->assign('pelicula', $pelicula);
    $this->smarty->assign('generos', $generos);
    $this->smarty->display('editarpelicula.tpl');

  }


}

 ?>
