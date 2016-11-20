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

  function mostrarPantallaLogin(){
    $this->view->mostrarForm("");
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
    $this->view->mostrarForm();
  }

  function logout(){
    session_destroy();
    header("Location: index.php"); die();
  }

  function editarUsuario(){
    $user = $_POST["nameUser"];
    $this->model->editarUsuario($user);
    $this->mostrarPantallaLogin();
  }
}
?>
