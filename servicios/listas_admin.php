<?php

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

        <table class="w3-table-all">
    <thead>
      <tr class="w3-green">
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
