<?php
//Requires
require_once 'base_oad.php';

  //Función SELECT
  function datos_select($que,$desde,$donde){
    $sentencia_select = "SELECT $que FROM $desde $donde";
    return $sentencia_select;
  }

  //Función INSERT
  function datos_insert($donde,$que){
    $sentencia_insert = "INSERT INTO $donde VALUES $que";
    return $sentencia_insert;
  }

  //Función DELETE
  function datos_delete($desde,$donde){
    $sentencia_insert = "DELETE FROM $desde WHERE";
    return $sentencia_insert;
  }

  //Funcion ejecutar
  function datos_ejecutar($sql,...$datos){
    //Conectar a la base de datos
    $conexionbd = new tarea_bd();

    $sql = $conexionbd->sentencia($sql,$datos);

    return $sql;

    $conexionbd = "";
  }


 ?>
