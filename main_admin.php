<?php
  //Comprobar sesión
  session_start();
  //Requires
  require_once __DIR__.'/oad/funciones_oad.php';

  //Expulsar a los tramposos
  if (!isset($_SESSION["idUsuario"]) ) {
    header("location:index.php");
  }

  //Eliminar la sesión cuando el usuario quiera
  if (isset($_GET["eliminar"])) {
    session_destroy();
    header("location:index.php");
  }
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/w3pro.css">
     <link rel="stylesheet" href="css/fontawesome-all.css">
     <link rel="stylesheet" href="css/tarea.css">     
     <meta name="viewport" content="width=device-width, user-scalable=no">
     <title>Main_Admin</title>
   </head>
   <body>

     <div class="w3-top">

       <div class="w3-bar background-color-pri color-white color-hover-black w3-display-content">
         <span class="w3-bar-item color-gunmetal w3-display-middle w3-padding-16">Administrador <?=$_SESSION["nombreUsuario"]?></span>

         <div class="w3-dropdown-hover w3-right">
          <button class="w3-btn background-color-black w3-padding-16">Menú de usuario</button>
            <div class="w3-dropdown-content w3-bar-block w3-border">
              <a href="#" class="w3-bar-item w3-button">Ver Listas</a>
              <a href="#" class="w3-bar-item w3-button">Editar Perfil</a>
              <a href="?eliminar" class="w3-bar-item color-hover-sec">Cerrar Sesión</a>
            </div>
        </div>
       </div>
     </div>

       <div id="cuerpo" class="w3-container"></div>

     <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
     <script type="text/javascript" src="js/main_admin.js"></script>
   </body>
 </html>
