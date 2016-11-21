<?php

include_once ('models/Model.php');

class HorariosPorSalaModel extends Model{
  protected $db;
  protected $modelPelicula;

  function __construct(){
    parent::__construct();
    $this->modelPelicula = new PeliculasDisponiblesModel();
  }

  function getHorarios(){
    $sentencia = $this->db->prepare( "select * from horario");
    $sentencia->execute();
    $horarios=array();
    while ($horario = $sentencia->fetch(PDO::FETCH_ASSOC)) {
      $horario["pelicula"] = $this->modelPelicula->getPeliculaHorario($horario["fk_pelicula"]);
      $horarios[]=$horario;
    }

    return $horarios;
  }

  function getHorario($id_horario){
    $sentencia = $this->db->prepare( "select * from horario where id_horario=?");
    $sentencia->execute(array($id_horario));
    $horario = $sentencia->fetch(PDO::FETCH_ASSOC);

    return $horario;

  }

  function agregarHorario($titulo,$sala,$horario){
    $sentencia = $this->db->prepare("INSERT INTO horario(fk_pelicula,sala,horario) VALUES(?,?,?)");
    $sentencia->execute(array($titulo,$sala,$horario));
  }

  function eliminarHorario($id_horario){
    $sentencia = $this->db->prepare("delete from horario where id_horario=?");
    $sentencia->execute(array($id_horario));
  }

  function editarHorario($id_horario,$pelicula,$sala,$horario){
    $sentencia = $this->db->prepare("UPDATE horario SET fk_pelicula=?,sala=?,horario=? WHERE  id_horario=?");
    $sentencia->execute(array($pelicula,$sala,$horario,$id_horario,));

  }
}

?>
