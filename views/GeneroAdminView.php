<?php
require_once('libs/Smarty.class.php');

class GeneroAdminView{
  private $smarty;
  function __construct()
  {
    $this->smarty = new Smarty();
  }

  function mostrarGeneroAdmin($generos,$admin){
    $this->smarty->assign("generos",$generos);
    $this->smarty->assign('admin', $admin);
    $this->smarty->display("peliculasgenero.tpl");
  }

  function mostrarEditorGenero($genero){
    $this->smarty->assign("genero",$genero);
    $this->smarty->display('editargenero.tpl');

  }


}

 ?>
