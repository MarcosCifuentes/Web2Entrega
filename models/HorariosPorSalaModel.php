<?php

class HorariosPorSalaModel
{
  private $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;dbname=cinema_false;charset=utf8', 'root', '');

  }

  function getHorarios(){
      $sentencia = $this->db->prepare( "select * from horario");
      $sentencia->execute();
      $horarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

      return $horarios;
    }
    function agregarHorario($pelicula,$sala,$horario){
        $sentencia = $this->db->prepare("INSERT INTO horario(pelicula,sala,horario) VALUES(?,?,?)");
        $sentencia->execute(array($pelicula,$sala,$horario));
  }

    function eliminarHorario($id_horario){
      $sentencia = $this->db->prepare("delete from horario where id_horario=?");
      $sentencia->execute(array($id_horario));
      return $sentencia->rowCount();
    }
}

?>
