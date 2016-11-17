<?php
require_once("models/LoginModel.php");
require_once("views/LoginView.php");
class LoginController{
  private $view;
  private $model;
  function __construct()
  {
    $this->model = new LoginModel();
    $this->view = new LoginView();
  }
  function mostrarPantallaLogin(){
    $this->view->mostrarForm("");
  }
  function crearUsuario(){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $us = $this->model->getUser($user);
    if($us['email'] == ""){
      $pass = md5($pass);
      $this->model->crearUsuario($user,$pass);
      $msj = "El usuario se creo correctamente!";
    }else{
      $msj = "El usuario ya existe!";
    }
    $this->view->mostrarForm($msj);
  }
  function login(){
    $user = $_POST['email'];
    $pass = $_POST['pass'];
    $pass = md5($pass);
    $usuario = $this->model->getUser($user);
    if($usuario["contrasenia"] == $pass){
        $msj="Usted se logeo correctamente";
        session_destroy();
        session_start();
        $_SESSION['privilegio'] = $usuario["privilegio"];
        $this->view->mostrarForm($msj);
      //  header("Location: index.php?action=mostrarLogin");
        die();
    }
    $msj="No se pudo ingresar, error de Usuario y/o Clave";
    $this->view->mostrarForm($msj);
  }
  function cerrarSesion(){
    session_destroy();
  }

  function editarUsuario(){
   $user = $_POST["nameUser"];
   $this->model->editarUsuario($user);
   $this->mostrarPantallaLogin();
 }
}
 ?>
