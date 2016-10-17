<?php
require_once('libs/Smarty.class.php');

class HorariosPorSalaView{
private $smarty;

  function __construct(){
  $this->smarty = new Smarty();
  }

  function mostrar($horarios){
    $this->smarty->assign('horarios',$horarios);
    $this->smarty->display('templates/horariosporsala.tpl');
  }
}

 ?>
