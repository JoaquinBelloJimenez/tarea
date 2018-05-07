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
      //iniciar sesión
      session_start();

      //Obtener el ID del usuario y comprobar si es admin
      $datos = $reg->fetch();

      $_SESSION["idUsuario"] = $datos["id_usuario"];
      $_SESSION["nombreUsuario"] = $datos["nombre"];

      if ($datos["tipo"] == 0) {
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
     <meta name="viewport" content="width=device-width, user-scalable=no">
     <title>TAREA</title>
   </head>
   <body>

     <div class="w3-container background-color-pri full-height">

        <div class="w3-row">
         <div class="w3-twothird w3-row w3-card-4 w3-display-middle background-color-white">
           <div class="w3-third background-color-pri-light w3-col w3-padding-64">
             <div class="w3-container color-white w3-center w3-padding-64">
               <h2>Entra en TAREA</h2>
               <h4>Y empieza a organizarte</h4>
             </div>
           </div>
           <div class="w3-twothird w3-padding-32 background-color-white full-height">
               <form class="w3-container w3-white">
                 <input class="w3-input w3-padding-16" type="text" name="usuario" placeholder="USUARIO" autofocus>
                 <input class="w3-input w3-padding-16" type="password" name="contrasenia" placeholder="CONTRASEÑA">
                 <div class="<?= $msg2Class ?> w3-container color-sec">
                   <?= $msg2 ?>
                 </div>
                 <div class="w3-row">
                   <div class="w3-third w3-right w3-margin">
                     <h3><input class="w3-btn w3-col background-color-pri-light color-white" type="submit" value="ENTRAR"></h3>
                   </div>
                 </div>
              </form>
           </div>
         </div>
       </div>

      </div>

     <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
     <script type="text/javascript" src="js/tareas.js"></script>
   </body>
 </html>
