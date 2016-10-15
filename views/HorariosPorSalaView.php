<?php

require_once('libs/Smarty.class.php');


class HorariosPorSalaView
{
private $smarty;

  function __construct(){

  $this->smarty = new Smarty();

  }

  function mostrar(){
    $this->smarty->display('horariosporsala.tpl');
  }
}


 ?>
