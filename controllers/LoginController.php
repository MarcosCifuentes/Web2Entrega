<?php
require_once("models/LoginModel.php");
require_once("views/LoginView.php");
require_once ('controllers/CinemaController.php');

class LoginController extends CinemaController{
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
    $session = $this->checkSession();
    $this->view->mostrarRegister($session, $privilegios);
  }

  function login(){
    $error=false;
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
    }else {
      $error=true;

    }
    $this->mostrarLogin();
  }

  function register(){
    $error=false;
    $nuevoUsuario = [];
    if( (isset($_POST['pass'])) && (isset($_POST['email']))){
      $nuevoUsuario["email"] = $_POST['email'];
      $usuario=$this->model->getUsuario($nuevoUsuario["email"]);
      if ($usuario["email"]=="") {
        $nuevoUsuario["pass"] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $this->model->crearUsuario($nuevoUsuario);
      }

    }

    $this->view->mostrarRegister();
  }

  function mostrarAdministrarUsuarios(){
    if(($_SESSION["privilegio"])=="administrador"){
      $usuarios=$this->model->getUsuarios();
      $this->view->mostrarAdministrarUsuarios($usuarios);
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

  function logout(){
    echo "hola";
    session_destroy();
    header("Location: index.php"); die();
  }

  function editorUsuario(){
    if(($_SESSION["privilegio"])=="administrador"){
      $email = $_GET['datos'];
      if (isset($email)){
        $usuario = $this->model->getUsuario($email);
        $this->view->mostrarEditorUsuario($usuario);
      }
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

  function editarUsuario(){
    if(($_SESSION["privilegio"])=="administrador"){
      $email = $_POST["email"];
      $privilegio = $_POST["privilegio"];
      $this->model->editarUsuario($email,$privilegio);
      $this->mostrarAdministrarUsuarios();
    }
    else {
      echo "<h1>a la cucha perro</h1>";
    }
  }

}
?>
