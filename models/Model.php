<?php

abstract class Model{

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;dbname=cinema_false;charset=utf8', 'root', '');

  }
}

 ?>
