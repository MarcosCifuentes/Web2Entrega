<?php
require_once("models/LoginModel.php");
require_once("views/LoginView.php");

class LoginController{
  private $view;
  private $model;

  function __construct(){
    $this->model = new LoginModel();
    $this->view = new LoginView();
  }

  function mostrarLogin(){
    $this->view->mostrarLogin("");
  }

  function mostrarRegister(){
    if(!isset($_SESSION["privilegio"])){
      $privilegios=0;
    }else{
      $privilegios= $_SESSION["privilegio"];
    }
    $usuarios=$this->model->getUsuarios();
    $session = $this->checkSession();
    $this->view->mostrarRegister($usuarios, $session, $privilegios);
  }

  function login(){
    if(isset($_POST["email"]) && isset($_POST["pass"])){
      $email = $_POST["email"];
      $password = $_POST["pass"];
      $usuarioRegistrado = $this->model->getUsuario($email);
      $passwordRegistrada = $usuarioRegistrado["contrasenia"];
      if (password_verify($password, $passwordRegistrada)){
        session_start();
        $_SESSION["id"] = $usuarioRegistrado["id_usuario"];
        $_SESSION["email"] = $usuarioRegistrado["email"];
        $_SESSION['privilegio'] = $usuarioRegistrado["privilegio"];
        header("Location: index.php"); die();
      }
    }

  }

  function register(){
    $newUsuario = [];
    if( (isset($_POST['pass'])) && (isset($_POST['email']))){
      $newUsuario["email"] = $_POST['email'];
      $newUsuario["pass"] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
      $this->model->crearUsuario($newUsuario);
    }
    $this->view->mostrarRegister();
  }

  function logout(){
    session_destroy();
    header("Location: index.php"); die();
  }

  function editorUsuario(){
    $email = $_GET['email'];
    if (isset($email)){
      $usuario = $this->model->getUsuario($email);
      $this->view->mostrarEditorUsuario($usuario);
    }
  }

  function editarUsuario(){
    $email = $_POST["email"];
    $privilegio = $_POST["privilegio"];
    $this->model->editarUsuario($email,$privilegio);
    $this->mostrarRegister();
  }

  function checkSession(){
    if (isset($_SESSION["privilegio"])) {
      return true;
    }else{
      return false;
    }
  }
}
?>
