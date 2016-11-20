<?php
include_once ('models/Model.php');

class LoginModel extends Model{
  protected $db;

  function __construct(){
    parent::__construct();
  }

  function getUsuarios(){
    $usuarios = $this->db->prepare("SELECT * FROM usuario");
    $usuarios->execute();
    return $usuarios->fetch(PDO::FETCH_ASSOC);
  }

  function getUsuario($email){
    $permisos = $this->db->prepare("SELECT * FROM usuario WHERE email = ?");
    $permisos->execute(array($email));
    return $permisos->fetch(PDO::FETCH_ASSOC);
  }

  function crearUsuario($user){
    $id_rol=0;
    $usuario = $this->db->prepare("insert into usuario(email,contrasenia,privilegio) values(?,?,?) ");
    $usuario->execute(array($user["email"],$user["pass"],$id_rol));
  }

  function editarUsuario($user){
    $usuario = $this->getUsuario($user);
    $sentencia = $this->db->prepare("UPDATE usuario SET privilegio=? WHERE email=?");
    $sentencia->execute(array(!$usuario["privilegio"],$user));
  }
}
?>
