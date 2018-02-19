<?php
  //Requires
  require 'elementos/bd.php';

  //iniciar sesión
  session_start();

  //Expulsar a los tramposos
  if (!isset($_SESSION["idUsuario"]) ) {
    header("location:index.php");
  }

  //Conectar a la base de datos
  $conexionbd = new yemi_bd();

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
     <meta name="viewport" content="width=device-width, user-scalable=no">
     <link rel="stylesheet" href="../estilo/w3.css">
     <link rel="stylesheet" href="../estilo/color_flower.css">
     <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
     <script type="text/javascript" src="../js/main.js"></script>
     <title>Yemi_usuario</title>
   </head>
   <body>


     <div id="cabecera" class="w3-top">
       <div class="w3-bar w3-card w3-large w3-border color-flower3">
          <a href="#" class="w3-bar-item w3-btn color-flower2">Usuario</a>
          <div class="w3-dropdown-hover">
          <button class="w3-btn color-flower2">EDITAR</button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4">
              <a href="#" class="w3-bar-item w3-btn opcion color-flower4" name="tareas">TAREAS</a>
              <a href="#" class="w3-bar-item w3-btn opcion color-flower4" name="listas">LISTAS</a>
            </div>
          </div>
          <a href="?eliminar" class="w3-bar-item w3-btn w3-right color-flower1">SALIR</a>
      </div>
     </div>


     <div id="container" class="w3-container">
       <div id="cuerpo">
         <?php include("secciones/opcion.html"); ?>
       </div>

      </div>
     <div id="pie"></div>
   </body>
 </html>
