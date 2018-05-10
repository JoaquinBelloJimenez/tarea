<?php
#Escuchar a java y comunicar con funciones_oad
#Este archivo se carga al arrancar el main para tener acceso al arbol de directorios
//Comprobar si se envían datos desde js
if (isset($_POST['funcion'])){
  $funcion = $_POST['funcion'];

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
    case 'delete':
        $desde = 0;
        $donde = 0;
        $sentencia_delete = datos_delete();
        break;
  } //--switch
}

 ?>
