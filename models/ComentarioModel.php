<?php
include_once (dirname(__DIR__).'/models/Model.php');
class ComentariosModel extends Model{

  function getComentario($id_pelicula){
    $comentario = $this->db->prepare("SELECT * FROM comentario where id_pelicula = ?" );
    $comentario->execute(array($id_pelicula));
    return $comentario->fetchAll(PDO::FETCH_ASSOC);
  }

  function eliminarComentario($id_comentario){
    $sentencia = $this->db->prepare("delete from comentario where id_comentario=?");
    $sentencia->execute(array($id_comentario));
    return $sentencia->rowCount();
  }

  function crearComentario($id_pelicula,$comentario, $puntuacion){
    $sentencia = $this->db->prepare("INSERT INTO comentario(id_pelicula,comentario,puntuacion) values(?,?,?)");
    $sentencia->execute(array($id_pelicula,$comentario,$puntuacion));
    $id_comentario = $this->db->lastInsertId();
    return $id_comentario;
  }
}
?>
