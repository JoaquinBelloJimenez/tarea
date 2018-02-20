<?php
//Requires
require_once 'oad/funciones_oad.php';
require_once 'oad/base_oad.php';



  //$funcion = $_POST['funcion'];
  //$datos = $_POST['datos'];
/*
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

*/

  //Función SELECT
  function datos_select($que,$desde,$donde){
    $sentencia_select = "SELECT $que FROM $desde WHERE $donde";
    return $sentencia_select;
  }

  //Funcion ejecutar
  function datos_ejecutar($sql,...$datos){
    //Conectar a la base de datos
    $conexionbd = new tarea_bd();

    $sql = $conexionbd->sentencia($sql,$datos);
    return $sql;
  }


 ?>
