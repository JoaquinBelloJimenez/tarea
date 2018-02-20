<?php
  //Comprobar sesión
  session_start();

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
     <link rel="stylesheet" href="css/color_flower.css">
     <meta name="viewport" content="width=device-width, user-scalable=no">
     <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
     <script type="text/javascript" src="js/main.js"></script>
     <title>Yemi_usuario</title>
   </head>
   <body>


     <div id="cabecera" class="w3-top">
       <div class="w3-bar w3-card w3-large w3-border color-flower3">
          <span class="w3-bar-item color-flower2 w3-display-middle">Bienvenid@ #Usuario</span>
          <a href="?eliminar" class="w3-bar-item w3-btn w3-right color-flower1">SALIR</a>
      </div>
     </div>
     
       <div id="cuerpo" class="">
         <div class="w3-container">
         <!-- Incluir el elemento -->
         <?php include "servicios/tareas.php" ?>
       </div>

      </div>
     <div id="pie"></div>
   </body>
 </html>
