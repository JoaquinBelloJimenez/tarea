<?php
  //Id del usuario
  $id_usuario = $_SESSION['idUsuario'];

  //Obtener las listas
  $sql = datos_select("t.*, tu.completada"," tarea_usuario tu, tareas t","WHERE tu.id_usuario = ? AND t.id_tarea = tu.id_tarea ");
  $reg = datos_ejecutar($sql,$id_usuario);

  $clase_color = "color-flower3";
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>seccion_opcion</title>
    </style>
  </head>
  <body>
        <div class="w3-panel color-flower1">
          <h2>Tu lista de tareas</h2>
        </div>
        <div>
        <?php   while ($tarea = $reg->fetch(PDO::FETCH_ASSOC)) {
          //Intercalar colores
          $clase_color = ($clase_color == "color-flower3") ? "color-flower4" : "color-flower3";
          ?>
          <div class="w3-card w3-quarter">
            <div class="w3-center w3-container <?=$clase_color?>">
              <h1><?=$tarea["nombre_tarea"]?></h1>
            </div>
            <div class="w3-container w3-white w3-xlarge mio-descripcion">
              <?=$tarea["desc_tarea"]?>
          </div>
          <div class="w3-xlarge">
            <div class="w3-white">Estado:<?=$tarea["completada"]?></div>
          </div>
          </div>
          <?php } ?>
        </div>
  </body>
</html>
