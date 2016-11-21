<?php
require_once("libs/Smarty.class.php");

class LoginView{
  protected $smarty;

  function __construct(){
    $this->smarty = new Smarty();
  }

  function mostrarLogin(){
    $this->smarty->display('login.tpl');
  }

  function mostrarRegister($usuarios,$session,$privilegios){
    $this->smarty->assign('usuarios', $usuarios);
    $this->smarty->assign('session', $session);
    $this->smarty->assign('privilegios', $privilegios);
    $this->smarty->display('register.tpl');
  }

  function mostrarEditorUsuario($usuario){
    $this->smarty->assign('usuario', $usuario);
    $this->smarty->display('editarusuario.tpl');
  }

}
?>
