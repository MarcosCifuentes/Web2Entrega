<?php
require_once("libs/Smarty.class.php");

class LoginView{
  protected $smarty;

  function __construct(){
    $this->smarty = new Smarty();
  }

  function mostrarForm(){
    $this->smarty->display('login.tpl');
  }
  
}
?>
