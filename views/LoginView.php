<?php
require_once("libs/Smarty.class.php");

class LoginView{
  protected $smarty;

  function __construct(){
    $this->smarty = new Smarty();
  }

  function mostrarLogin($error){
    $this->smarty->assign('error', $error);
    $this->smarty->display('login.tpl');
  }

  function mostrarRegister($session,$privilegios){
    $this->smarty->assign('session', $session);
    $this->smarty->assign('privilegios', $privilegios);
    $this->smarty->display('register.tpl');
  }

  function mostrarAdministrarUsuarios($usuarios){
    $this->smarty->assign('usuarios', $usuarios);
    $this->smarty->display('administrarusuarios.tpl');
  }
  function mostrarEditorUsuario($usuario){
    $this->smarty->assign('usuario', $usuario);
    $this->smarty->display('editarusuario.tpl');
  }

}
?>
