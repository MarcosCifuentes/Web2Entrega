<?php
require_once('libs/Smarty.class.php');

class ContactoView{
  private $smarty;

  function __construct(){
    $this->smarty = new Smarty();
  }

  function mostrarMensajes($contactos, $session, $privilegios){
    $this->smarty->assign('contactos',$contactos);
    $this->smarty->assign('session', $session);
    $this->smarty->assign('privilegios', $privilegios);
    $this->smarty->display('templates/contacto.tpl');
  }
}

?>
