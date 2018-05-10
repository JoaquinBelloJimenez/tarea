<?php

//Crear nuevo elemento
function crear($datos, $conexionbd){

    //Obtener los datos
    $usuario = $datos['usuario'];
    $tarea = $datos['tarea'];
    $descr = $datos['descr'];
    $caducidad = $datos['caducidad'];

  $sql  = "INSERT INTO `tareas` VALUES (NULL, $usuario, '$tarea', '$descr',' $caducidad');";
  $reg = $conexionbd->sentencia($sql);
};

//Editar (Enviar los datos editados)
function editar($datos, $conexionbd){
  //Obtener los datos
  $id = $datos['id'];
  $usuario = $datos['usuario'];
  $tarea = $datos['tarea'];
  $descr = $datos['descr'];
  $caducidad = $datos['caducidad'];


  $sql  = "UPDATE `tareas` SET `id_usuario` = '$usuario',`nombre` = '$tarea',`descr` = '$descr', `caducidad` = '$caducidad'  WHERE tareas.id_tarea = $id";
  $reg = $conexionbd->sentencia($sql);
};



//Eliminar el elemento seleccionado
function eliminar($id,$conexionbd){
  //Eliminar de la base de datos
  $sql  = "DELETE FROM tareas WHERE tareas.id_tarea = $id";
  $reg = $conexionbd->sentencia($sql);
};

 ?>
