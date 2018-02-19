<?php
//Requires
require 'elementos/bd.php';
require_once "crud.php";

//Conectar a la base de datos
$conexionbd = new yemi_bd();

  $funcion = $_POST['funcion'];
  //$datos = $_POST['datos'];

switch ($funcion) {
  case 'crear':
    $datos = $_POST['datos'];
    crear($datos,$conexionbd);
    include "tareas.php";
    break;
  case 'eliminar':
    $id = $_POST['id'];
    eliminar($id,$conexionbd);
    break;
  case 'editar':
      $datos = $_POST['datos'];
      editar($datos,$conexionbd);
      break;
} //--switch


 ?>
