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
    function agregarPelicula($nuevapelicula){
        $sentencia = $this->db->prepare("INSERT INTO pelicula(fk_pelicula,sala,horario) VALUES(:pelicula,:sala,:horario)");
        $sentencia->execute(array($horario));
        $id_horario = $this->db->lastInsertId();
  }

    function eliminarPelicula($id_horario){
      $sentencia = $this->db->prepare("delete from horario where id_horario=?");
      $sentencia->execute(array($id_horario));
      return $sentencia->rowCount();
    }
}

?>
