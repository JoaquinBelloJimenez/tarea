<?php
  //Requires
  require_once 'oad/funciones_oad.php';


  $msg2Class = "";
  $msg2 = "";

  //Crear el nuevo usuario
  if (isset($_GET['usuario'])) {
    if (isset($_GET['contrasenia'])) {

    $usuario = $_GET['usuario'];
    $contrasenia = $_GET['contrasenia'];
    $recontras = $_GET['recontrasenia'];
    $tipo = $_GET['tipo'];

      if ($contrasenia == $recontras) {
        //Comprobar si el usuario existe
        $sql = datos_select("*","usuarios","WHERE ?");
        $reg = datos_ejecutar($sql,$usuario);

        // Si el usuario ya existe
        if ($reg->rowCount()) {
          $msg2Class = "rojo";
          $msg2 = "¡Este usuario ya ha sido registrado!";
        } else {
          //Registrar nuevo usuario si este aún no existe.
          $sql2 = datos_insert("usuarios (`nombre`, `contrasenia`, `tipo`)","(?, ?, ?)");
          $reg2 = datos_ejecutar($sql2,$usuario,$contrasenia,$tipo);

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
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/color_flower.css">
    <title>Crear usuario</title>
  </head>
  <body>
    <div class="w3-row">

      <div class="w3-third  w3-container"></div>
      <!-- Formulario  -->
      <div class="w3-third  w3-container">
        <div class="w3-center">
          <img src="img/tarea.png">
        </div>

        <div class=" w3_shadow">
          <div class="w3-card-4">
            <div class="w3-container color-viridian">
              <h2>Nuevo usuario</h2>
            </div>

            <form class="w3-container w3-white">
              <input class="w3-input w3-padding-16" type="text" name="usuario" placeholder="NOMBRE DE USUARIO" required>
              <input class="w3-input w3-padding-16" type="password" name="contrasenia" maxlength="8" placeholder="CONTRASEÑA" required>
              <input class="w3-input w3-padding-16" type="password" name="recontrasenia" placeholder="REPETIR CONTRASEÑA" required>
              <input class="w3-input w3-padding-16" type="number" min="0" max="1" name="tipo">
                <label for="tipo">(0 - Admin / 1 - Normal)</label>
              <div class="w3-container w3-center w3-row w3-padding-16">
              <h3><input class="w3-btn color-mint w3-half" type="submit" value="REGISTRAR">
                <a href="index.php"><div class="w3-btn color-gunmetal w3-half "> Volver</div></a>
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
