<?php
  //Requires
  require_once 'oad/funciones_oad.php';

  //Mensaje para mostrar al usuario
  $msg2 = "";
  $msg2Class = "none";

  //Comprobar datos de formulario
  if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];
    $contrasenia = $_GET['contrasenia'];

    //Generar la sentencia sql
    $sql = datos_select("*","usuarios","WHERE nombre=? AND contrasenia=?");
    //Mandar la sentencia sql
    $reg = datos_ejecutar($sql,$usuario,$contrasenia);

    // Si el usuario y contraseña son correctos
    if ($reg->rowCount()) {
      //Obtener el ID del usuario y comprobar si es admin
      $datos = $reg->fetch();

      $_SESSION["idUsuario"] = $datos["id_usuario"];
      $_SESSION["nombreUsuario"] = $datos["nombre"];
      $_SESSION["contraUsuario"] = $contrasenia;

      if ($datos["id_admin"] == null) {
        //usuario admin
        header("location:main_admin.php");
      }else{
        //usuario corriente
        header("location:main.php");
      }

    } else {
      $msg2Class = "mensaje rojo";
      $msg2 = "Usuario/Contraseña erróneos";
    }
  };

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/w3pro.css">
     <link rel="stylesheet" href="css/tarea.css">
     <link rel="shortcut icon" href="img/favicon.png"/>
     <meta name="viewport" content="width=device-width, user-scalable=no">
     <title>TAREA</title>
   </head>
   <body>

     <div class="w3-container full-height background-icecream-green">
       <div class="w3-row">
         <div class="w3-third w3-display-middle">
           <div class="w3-card">
             <div class="w3-container background-color-black color-white w3-center">
               <h2>Entrar en TAREA</h2>
             </div>
             <div class="w3-container w3-padding background-color-white">
               <form class="w3-container w3-white">
                 <input class="w3-input w3-margin w3-padding" type="text" name="usuario" placeholder="USUARIO" autofocus>
                 <input class="w3-input w3-margin w3-padding" type="password" name="contrasenia" placeholder="CONTRASEÑA">
                 <div class="<?= $msg2Class ?> w3-container color-sec">
                   <?= $msg2 ?>
                 </div>
                   <div style="display:flex;justify-content:center;">
                     <h3><input class="w3-btn w3-col background-color-pri-light color-white" type="submit" value="ENTRAR"></h3>
                   </div>
              </form>
             </div>
           </div>
         </div>
       </div>

      </div>
     <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
   </body>
 </html>
