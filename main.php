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
   <link rel="stylesheet" href="css/w3pro.css">
   <link rel="stylesheet" href="css/fontawesome-all.css">
   <link rel="stylesheet" href="css/tarea.css">
   <link rel="shortcut icon" href="img/favicon.png"/>
   <meta name="viewport" content="width=device-width, user-scalable=no">
   <title>Main <?=$_SESSION["nombreUsuario"]?></title>
 </head>
   <body>

     <div class="w3-top">
       <div class="w3-bar background-color-black color-white w3-display-content">
         <span class="w3-bar-item w3-padding w3-xlarge">Tareas de <?=$_SESSION["nombreUsuario"]?></span>
         <a href="?eliminar" class="w3-bar-item w3-btn w3-right background-color-sec w3-padding-16">SALIR</a>
         <div class="">
           <a href="#" onclick="recargar()" class="w3-xlarge w3-right color-white w3-padding"><i class="fas fa-sync-alt"></i></a>
         </div>
       </div>

     </div>


     <div id="cuerpo" class="main-content full-height full-width w3-padding-64">
         <?php include_once "servicios/tareas.php" ?>
      </div>
      <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
   </body>
 </html>
