<?php
  //Comprobar sesión
  session_start();
  //Requires
  require_once 'oad/funciones_oad.php';

  //Expulsar a los tramposos
  if (!isset($_SESSION["idUsuario"]) ) {
    header("location:index.php");
  }

  //Eliminar la sesión cuando el usuario quiera
  if (isset($_GET["eliminar"])) {
    session_destroy();
    header("location:index.php");
  }

//--------------------------------
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/w3.css">
     <link rel="stylesheet" href="css/fontawesome-all.css">
     <meta name="viewport" content="width=device-width, user-scalable=no">
    <!-- <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
     <script type="text/javascript" src="js/main.js"></script> -->
     <title>TAREA Usuario</title>
   </head>
   <body>

     <div class="w3-top">

       <div class="w3-bar background-color-pri color-white color-hover-black w3-display-content">
         <span class="w3-bar-item color-gunmetal w3-display-middle w3-padding-16">Tareas de <?=$_SESSION["nombreUsuario"]?></span>
         <a href="?eliminar" class="w3-bar-item w3-btn w3-right background-color-sec w3-padding-16">SALIR</a>
       </div>

     </div>


     <div class="main-content full-height full-width">
         <?php include_once "servicios/listas.php" ?>
      </div>

   </body>
 </html>
