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
      <tr class="color-viridian">
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

        <div class="color-gunmetal">
        <p>- Usuarios -</p>
        <p><select class="color-gunmetal w3-xlarge mayus" name="">
        <?php
        $sql = datos_select("*","usuarios","");
        $reg = datos_ejecutar($sql);

        while ($tarea = $reg->fetch(PDO::FETCH_ASSOC)) {
         ?>
           <option value="<?=$tarea["id_usuario"]?>"><?=$tarea["nombre"]?></option>
       <?php } ?>
       </select></p></div>
  </body>
</html>
