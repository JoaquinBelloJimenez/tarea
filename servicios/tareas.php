<?php /*
        $tipo = $_POST['tipo'] ?? "t.id_tarea";
        $orden =  $_POST['orden'] ?? "DESC";

        $sql = "
        SELECT u.id_usuario, u.nombreusuario, t.id_tarea , t.nombre, t.descr, t.caducidad FROM tareas t, usuario u WHERE u.id_usuario = t.id_usuario ORDER BY $tipo $orden";
        $reg = $conexionbd->sentencia($sql);

       */?>
       <table id="tabla" class="w3-table w3-striped w3-center">
          <col width="50">
          <col width="50">
          <col width="250">
          <col width="60">
          <col width="60">
         <thead>
         <tr class="color-flower1">
           <th class="w3-center">Usuario</th>
           <th class="w3-center">Tarea</th>
           <th class="w3-center">descripción</th>
           <th class="w3-center">Caducidad</th>
           <th class="w3-center">Acciones</th>
         </tr>
          </thead>
        <!--
        <?php/*
         while ($listar = $reg->fetch(PDO::FETCH_ASSOC)) { ?>
           <tr id="idlista_<?= $listar["id_tarea"]?>">
           <td class="usuario" id="<?= $listar["id_usuario"] ?>"> <?= $listar["nombreusuario"] ?> </td>
           <td class="nombre"><?= $listar["nombre"] ?> </td>
           <td class="descr"><?= $listar["descr"] ?> </td>
           <td class="caducidad"><?= $listar["caducidad"] ?> </td>
           <td class='w3-center'> <a href='#' onclick="dialog_editar(this)"  class='editar w3-xlarge' name="<?= $listar["id_tarea"] ?>"><i class='fas fa-pen-square'></i></a>
           <a href='#'  class='eliminar w3-xlarge' onclick="dialog_eliminar(this)" name="<?= $listar["id_tarea"] ?>"><i class='fas fa-minus-square'></i> </a>
          </td>
           </tr>
      <?php
      }
      //Cerrar base de datos
      $conexionbd = "";
       */?>
     -->
     </table>
