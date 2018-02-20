<?php

  //Obtener las listas
  $sql = datos_select("ltu.*"," listatarea_usuario ltu, usuarios u"," u.id_usuario = ltu.id_usuario AND u.id_usuario = 10 ");
  $reg = datos_ejecutar($sql);
  //Sacar el nombre de la lista
  $sql2 = datos_select("l.*,u.nombre ", "usuarios u, listas l, lista_tareas lt", "l.id_lista = lt.id_lista AND lt.id_listatarea = 1");
  $reg2 = datos_ejecutar($sql2);

  //SELECT ltu.* FROM listatarea_usuario ltu, usuarios u WHERE u.id_usuario = ltu.id_usuario

  //SELECT l.* FROM listas l, lista_tareas lt WHERE l.id_lista = lt.id_lista AND lt.id_listatarea = 1


  $listar = $reg2->fetch(PDO::FETCH_ASSOC);
  print_r($listar);
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
          <h2>Tus listas de tareas</h2>
        </div>

          <div class="w3-card w3-third">
            <div class="w3-container color-flower3">
              <h1><?=$listar["nombre"]?></h1>
            </div>

            <div class="w3-container w3-white">
              <p>Administrado: fulanito</p>
            </div>
          </div>
  </body>
</html>
