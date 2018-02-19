<?php
  //Requires
  require 'elementos/bd.php';

  //Conectar a la base de datos
  $conexionbd = new yemi_bd();

  $msg2Class = "";
  $msg2 = "";

  //Crear el nuevo usuario
  if (isset($_GET['usuario'])) {
    if (isset($_GET['contrasenia'])) {

    $usuario = $_GET['usuario'];
    $contras = $_GET['contrasenia'];
    $recontras = $_GET['recontrasenia'];
    $correo = $_GET['correo'];

      if ($contras == $recontras) {
        //Comprobar si el usuario ya existe
        $sql  = "SELECT * FROM usuarios WHERE nombre='$usuario';";
        $reg = $conexionbd->sentencia($sql); //Aplicar la sentencia
        // Si el usuario ya existe
        if ($reg->rowCount()) {
          $msg2Class = "rojo";
          $msg2 = "¡Este usuario ya ha sido registrado!";
        } else {
          //Registrar nuevo usuario si éste aún no existe.
          $sql  = "INSERT INTO usuarios VALUES (NULL, '$usuario', '$contras', '1')";
          $reg = $conexionbd->sentencia($sql);
          $msg2Class = "mensaje";
          $msg2 = "Usuario registrado con éxito";
        }
      } else{
        $msg2Class = "rojo";
        $msg2 = "¡Complete los campos de forma adecuada!";
      }
    }
  }


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="../estilo/w3.css">
    <link rel="stylesheet" href="../estilo/color_flower.css">
    <title>Crear usuario</title>
  </head>
  <body class="color-flower5">
    <div class="w3-row">

      <div class="w3-third  w3-container"></div>
      <!-- Formulario  -->
      <div class="w3-third  w3-container">
        <div>
          <img src="../img/yemi.png">
        </div>

        <div class=" w3_shadow">
          <div class="w3-card-4">
            <div class="w3-container color-flower1">
              <h2>Nuevo usuario</h2>
            </div>

            <form class="w3-container w3-white">
              <input class="w3-input w3-padding-16" type="text" name="usuario" placeholder="NOMBRE DE USUARIO" required>
              <input class="w3-input w3-padding-16" type="password" name="contrasenia" maxlength="8" placeholder="CONTRASEÑA" required>
              <input class="w3-input w3-padding-16" type="password" name="recontrasenia" placeholder="REPETIR CONTRASEÑA" required>
              <input class="w3-input w3-padding-16" type="text" name="correo" placeholder="CORREO">
              <div class="w3-container w3-center w3-row w3-padding-16">
              <h3><input class="w3-btn color-flower2 w3-half" type="submit" value="REGISTRAR">
                <a href="index.php"><div class="w3-btn color-flower3 w3-half "> Volver</div></a>
              </h3>
            </div>
            <div class="<?= $msg2Class ?> w3-container">
              <?= $msg2 ?>
            </div>
           </form>
         </div>
       </div>
      </div>
    </div>

  </body>
</html>
