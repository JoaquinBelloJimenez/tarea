<?php
  require_once "constantes/token.php";
  require_once "api/index.php";

  $id_usuario = $_SESSION["idUsuario"];

  //Obtener las listas
  $sql = datos_select("t.*, l.nombre_lista","tareas t, listas l","WHERE t.id_lista = l.id_lista AND l.id_usuario = ? ORDER BY l.nombre_lista");
  $reg = datos_ejecutar($sql,$id_usuario);
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>seccion_opcion</title>
    </style>
  </head>
  <body>
    <!-- Obtener datos de la API -->
    <div class="w3-row">
    <div class="w3-third w3-container"></div>
    <div class="color-gunmetal w3-third w3-center">
      <h2> Últimas 5 categorías usadas </h2>
      <?php
      $valores = usar_api();
      $valores2 = json_decode($valores);
      foreach ($valores2 as $valor) { ?>
      <div class="color-viridian w3-large mayus w3-card w3-col">
      <h4><?= $valor ?></h4>
      </div>
    <?php } ?>
    </div>
    </div>
    <br>
        <table class="w3-table-all">
    <thead>
      <tr class="color-gunmetal">
        <th>Lista</th>
        <th>Nombre de tarea</th>
        <th>Descripción</th>
      </tr>
    </thead>
        <?php   while ($tarea = $reg->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
            <td><?=$tarea["nombre_lista"]?></td>
            <td><?=$tarea["nombre_tarea"]?></td>
            <td><?=$tarea["desc_tarea"]?></td>
          </tr>
          <?php } ?>
        </table>
  </body>
</html>
