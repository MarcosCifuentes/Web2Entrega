<?php
require_once('libs/Smarty.class.php');


class ContactoView
{
private $smarty;

  function __construct(){

  $this->smarty = new Smarty();

  }

  function mostrar(){
    $this->smarty->assign('contactos',$contactos);
    $this->smarty->display('contacto.tpl');
  }
}


 ?>
