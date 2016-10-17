<?php
require_once('views/PeliculasDisponiblesView.php');
require_once ('models/PeliculasDisponiblesModel.php');

class  PeliculasDisponiblesController{
  
  private $vista;
  private $model;


  function __construct()
  {
    $this->model = new PeliculasDisponiblesModel();
    $this->vista = new PeliculasDisponiblesView();
  }

  function mostrar(){
    $this->model->getpeliculas();
    $this->vista->mostrar();


  }

  function getImagenVerificada($imagen){
    $imagenVerificada = [];
        if($imagen['size']>0 && ($imagenes['type']=="image/jpeg" || $imagenes['type']=="image/png")){
        $imagen_aux = [];
        $imagen_aux['tmp_name']=$imagen['tmp_name'];
        $imagen_aux['name']=$imagen['name'];
        $imagenVerificada[]=$imagen_aux;
      }

    return $imagenVerificada;
  }

  function agregarPelicula(){
    if(isset($_POST['titulo'])&&($_POST['titulo'])!=""){
      $titulo = $_POST['titulo'];
      $descripcion = $_POST['descripcion'];
      $duracion =  $_POST['duracion'];
      $genero =  $_POST['genero'];
      if(isset($_FILE['imagen'])){
        $imagen = $this->getImagenVerificada($_FILE['imagen']);
        $nuevapelicula = array('titulo'=>$titulo,'descripcion'=>$descripcion,'duracion'=>$duracion, 'genero'=>$genero);
        $this->modelo->agregarPelicula($nuevapelicula,$imagen);
      }
}
}
  function eliminarPelicula(){
    $key = $_GET['id_pelicula'];
    $this->modelo->eliminarPelicula($key);
  }

}
 ?>
