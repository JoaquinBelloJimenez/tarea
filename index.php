<?php
  //Requires
  require 'elementos/bd.php';
  //iniciar sesión
  session_start();

  //Mensaje para mostrar al usuario
  $msg2 = "";
  $msg2Class = "none";

  //Comprobar datos de formulario
  if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];
    $contrasenia = $_GET['contrasenia'];

    //Conectar a la base de datos
    $conexionbd = new yemi_bd();
    // Comprobar el usuario y contraseña
    $sql  = "SELECT * FROM usuarios WHERE nombre='$usuario' AND contrasenia='$contrasenia';";
    $reg = $conexionbd->sentencia($sql);
    $datos = $reg->fetch(); //Obtener datos del usuario
    $_SESSION["idUsuario"] = $datos[0];

    // Si el usuario y contraseña son correctos
    if ($reg->rowCount()) {
      header("location:tareas.php");
    } else {
      $msg2Class = "mensaje rojo";
      $msg2 = "Usuario/Contraseña erróneos";
    }
  }


 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../estilo/w3.css">
     <link rel="stylesheet" href="../estilo/color_flower.css">
     <meta name="viewport" content="width=device-width, user-scalable=no">
     <title>Yemi_entrar</title>
   </head>
   <body>

     <div class="w3-row">
       <div class="w3-third  w3-container"></div>
       <!-- Formulario  -->
       <div class="w3-third  w3-container">
         <div class="w3-center">
           <img src="../img/yemi.png">
         </div>
         <div class=" w3_shadow">
           <div class="w3-card-4">
             <div class="w3-container color-flower2">
               <h2>Inicio de sesión</h2>
             </div>
             <form class="w3-container w3-white">
               <input class="w3-input w3-padding-16" type="text" name="usuario" placeholder="USUARIO">
               <input class="w3-input w3-padding-16" type="password" name="contrasenia" placeholder="CONTRASEÑA">
               <div class="w3-right w3-padding-16">
                 <a class="color-t-flower1" href="#">¿Contraseña olvidada?</a>
               </div>
               <h3><input class="w3-btn color-flower2 w3-col" type="submit" value="ENTRAR"></h3>
            </form>
            <div class="mensaje w3-container">
              ¿Nuevo aquí? Regístrate en este <a class="color-t-flower1" href='nuevousuario.php'>enlace</a>
            </div>
            <div class="<?= $msg2Class ?> w3-container color-t-flower1">
              <?= $msg2 ?>
            </div>
          </div>
        </div>
      </div>
    </div>

     <div id="pie"></div>

     <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
     <script type="text/javascript" src="../js/tareas.js"></script>
   </body>
 </html>
