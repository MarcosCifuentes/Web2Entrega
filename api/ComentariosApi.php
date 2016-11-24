
<?php
require 'api.php';
include_once (dirname(__DIR__).'/models/ComentarioModel.php');
class ComentariosApi extends Api
{
  private $model;
  public function __construct($request)
 {
    parent::__construct($request);
    $this->model = new ComentariosModel();
  }
  public function comentario($argumentos){
    switch ($this->method) {
      case 'GET':
          if(count($argumentos)>0){
            $comentario = $this->model->getComentario($argumentos[0]);
            $error['Error'] = "Ese comentario no existe";
            return ($comentario) ? $comentario : $error;
          }
        break;
      case 'DELETE':
          if(count($argumentos)>0){
            $error['Error'] = "El comentario no existe";
            $success['Success'] = "El comentario se borro exitosamente";
            $filasAfectadas = $this->model->eliminarComentario($argumentos[0]);
            return ($filasAfectadas == 1) ? $success : $error;
          }
        break;
        case 'POST':
            if(count($argumentos)==0){
              $error['Error'] = "El comentario no se creo";
              $id_comentario = $this->model->crearComentario($_POST['id_pelicula'],$_POST['comentario'],$_POST['puntuacion']);
              return ($id_comentario > 0) ? $this->model->getComentario($id_comentario) : $error;
            }
          break;
      default:
           return "Método no válido";
        break;
    }
   }
}
