<?php
//Requires
require_once __DIR__.'/base_oad.php';

if(!isset($_SESSION)) {
     session_start();
}

//Comprobar si se envían datos desde js
if (isset($_POST['funcion'])){
  $funcion = $_POST['funcion'];
  $tipo = $_POST['tipo'] ?? "";

  switch ($funcion) {
    case 'create':
      $donde = $_POST['donde'];
      $id = NULL;
      $nombre = $_POST['nombre'];
      $categoria = $_POST['categoria'];
      $usuario = $_SESSION['idUsuario'];
      $que = "(NULL, '$nombre', '$categoria', '$usuario')";

      $sentencia_insert = datos_insert($donde,$que);
      datos_ejecutar($sentencia_insert,$donde, $id, $nombre, $categoria, $usuario);
      break;
    case 'select':

    switch($tipo){
      case 'listas':
      break;
    }

      break;
    case 'delete':
        $que = $_POST['que'];
        $desde = $_POST['desde'];
        $donde = $_POST['donde'];
        $sentencia_delete = datos_delete($que, $desde, $donde);
        datos_ejecutar($sentencia_delete,$que, $desde, $donde);
        break;
  } //--switch
}



  //Funcion SELECT
  function datos_select($que,$desde,$donde){
    $sentencia_select = "SELECT $que FROM $desde $donde";
    return $sentencia_select;
  }

  //Funcion INSERT
  function datos_insert($donde,$que){
    $sentencia_insert = "INSERT INTO $donde VALUES $que";
    return $sentencia_insert;
  }

  //Funcion DELETE
  function datos_delete($que, $desde, $donde){
    $sentencia_delete = "DELETE $que FROM $desde WHERE $donde";
    return $sentencia_delete;
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
