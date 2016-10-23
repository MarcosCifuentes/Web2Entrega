<?php
require_once('libs/Smarty.class.php');

class HorariosPorSalaView{
private $smarty;

  function __construct(){
  $this->smarty = new Smarty();
  }

  function mostrarHorarios($horarios,$peliculas){
    $this->smarty->assign('peliculas',$peliculas);
    $this->smarty->assign('horarios',$horarios);
    $this->smarty->display('templates/horariosporsala.tpl');
  }
}

 ?>
