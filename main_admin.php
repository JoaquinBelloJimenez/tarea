<?php
  //Comprobar sesión
  session_start();
  //Requires
  require_once __DIR__.'/oad/funciones_oad.php';

  //Expulsar a los tramposos
  if (!isset($_SESSION["idUsuario"]) ) {
    header("location:login.php");
  }

  //Eliminar la sesión
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

     <!-- menú superior para vistas en ordenador y pantallas anchas -->
     <div class="w3-hide-small w3-hide-medium padding-bottom-64">
       <div class="w3-bar w3-top background-color-black color-white sombra-inferior">
         <a href="#LISTAS" class="w3-bar-item w3-btn w3-tooltip">
           <i class="fas fa-list-alt w3-xlarge"></i>
           <p class="w3-text w3-center w3-small">LISTAS</p>
         </a>
         <a href="#" class="w3-bar-item w3-btn w3-tooltip">
           <i class="fas fa-address-card w3-xlarge"></i>
           <p class="w3-text w3-center w3-small">USUARIOS</p>
         </a>
         <a href="#" class="w3-bar-item w3-btn w3-tooltip">
           <i class="fas fa-cogs w3-xlarge"></i>
           <p class="w3-text w3-center w3-small">CONFIGURAR</p>
         </a>
         <a href="?eliminar" class="w3-bar-item w3-btn w3-tooltip">
           <i class="fas fa-sign-out-alt w3-xlarge"></i>
           <p class="w3-text w3-center w3-small">SALIR</p>
         </a>
       </div>
     </div>
     <!-- Resto de la página de administración -->
     <div id="cuerpo" class="padding-bottom-64"></div>
     <!-- menú inferior para vistas en móviles -->
     <div class="w3-center w3-bottom w3-hide-large background-color-black color-white sombra-superior">
       <div class="w3-row-padding w3-padding">
         <div class="w3-col s3 w3-btn w3-xlarge">
           <i class="fas fa-list-alt"></i>
         </div>
         <div class="w3-col s3 w3-btn w3-xlarge">
           <i class="fas fa-address-card"></i>
         </div>
         <div class="w3-col s3 w3-btn w3-xlarge">
           <i class="fas fa-cogs w3-xlarge"></i>
         </div>
         <div class="w3-col s3 w3-btn w3-xlarge">
           <a href="?eliminar"><i class="fas fa-sign-out-alt"></i></a>
         </div>
        </div>
     </div>

     <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
     <script type="text/javascript" src="js/main_admin.js"></script>
   </body>
 </html>
