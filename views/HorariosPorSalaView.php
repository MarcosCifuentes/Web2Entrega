<?php
require_once('libs/Smarty.class.php');

class HorariosPorSalaView{
  private $smarty;

  function __construct(){
    $this->smarty = new Smarty();
  }

  function mostrarHorarios($horarios, $peliculas, $session, $privilegios){
    $this->smarty->assign('peliculas',$peliculas);
    $this->smarty->assign('horarios',$horarios);
    $this->smarty->assign('session', $session);
    $this->smarty->assign('privilegios', $privilegios);
    $this->smarty->display('templates/horariosporsala.tpl');
  }

  function mostrarEditorHorario($horario, $peliculas){
    $this->smarty->assign('horario', $horario);
    $this->smarty->assign('peliculas', $peliculas);
    $this->smarty->display('editarhorario.tpl');
  }

}

?>
