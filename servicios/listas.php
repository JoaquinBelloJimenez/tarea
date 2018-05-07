<?php
  //Id del usuario
  $id_usuario = $_SESSION['idUsuario'];

  //Obtener las listas
  $sql = datos_select("t.*, tu.completada"," tarea_usuario tu, tareas t","WHERE tu.id_usuario = ? AND t.id_tarea = tu.id_tarea ");
  $reg = datos_ejecutar($sql,$id_usuario);

  $clase_color = "color-viridian";
  $clase_color2 = "color-turquesa2";
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>seccion_opcion</title>
    </style>
  </head>
  <body>
        <div class="w3-panel w3-center full-width">
        </div>
        <div>
           <div class="w3-row-padding">

        <?php   while ($tarea = $reg->fetch(PDO::FETCH_ASSOC)) {
          //Intercalar colores
          $clase_color = ($clase_color == "color-viridian") ? "color-mint" : "color-viridian";
          $clase_color2 = ($clase_color2 == "color-turquesa2") ? "color-turquesa1" : "color-turquesa2";
          ?>
          <div class="s1 w3-third w3-display-container <?=$tarea["completada"]?>">
            <div class="w3-card" style="min-height:200px;">
              <div class="w3-container background-color-black color-white">
                <h4><?=$tarea["nombre_tarea"]?></h4>
             </div>
              <div class="w3-container">
                <p><?=$tarea["desc_tarea"]?></p>
             </div>
             <div class="w3-container w3-padding w3-display-bottommiddle">
               <h4><?=$tarea["completada"]?> </h4>
             </div>
             <?php #Mostrar "enviar" si aun es incompleta
              if ($tarea["completada"] == "Incompleta") {
                echo '<div class="w3-container w3-padding w3-display-bottomright">
                <button class="w3-btn w3-col background-color-pri-light color-white" type="button" name="button">ENVIAR</button>
                </div>';
              }

               ?>

           </div>
          </div>
          <?php } ?>

        </div>
      </div> <!-- row padding-->
  </body>
</html>
