<?php
require_once __DIR__.'/../oad/funciones_oad.php';
  //Id del usuario
  $id_usuario = $_SESSION['idUsuario'];

  //Obtener las listas
  $sql = datos_select("tu.id_asignada, t.nombre_tarea, t.desc_tarea, e.valor","tareas t JOIN tarea_usuario tu ON t.id_tarea = tu.id_tarea JOIN estado e ON e.id_estado = tu.id_estado","WHERE tu.id_usuario =? ORDER BY e.id_estado ASC");
  $reg = datos_ejecutar($sql,$id_usuario);
 ?>

        <div class="w3-panel w3-center full-width">
        </div>
        <div>
           <div class="w3-row-padding">

        <?php   while ($tarea = $reg->fetch(PDO::FETCH_ASSOC)) {?>
          <div id="asignada_<?=$tarea['id_asignada']?>" class="s1 w3-padding w3-third w3-display-container <?=$tarea["completada"]?>">
            <div class="w3-card" style="min-height:200px;">
              <div class="w3-container background-color-black color-white">
                <h4><?=$tarea["nombre_tarea"]?></h4>
             </div>
              <div class="w3-container">
                <p><?=$tarea["desc_tarea"]?></p>
             </div>
             <div class="w3-container w3-padding w3-display-bottommiddle">
               <h4 class="estado"><?=$tarea["valor"]?> </h4>
             </div>
             <?php #Mostrar "enviar" si aun es incompleta
              if ($tarea["valor"] == "Incompleta") {
                echo '<div class="w3-container w3-padding w3-display-bottomright enviar">
                <button class="w3-btn w3-col background-color-pri-light color-white" type="button" onclick="enviar_Tarea('.$tarea['id_asignada'].')">ENVIAR</button>
                </div>';
              }

               ?>

           </div>
          </div>
          <?php } ?>

        </div>
      </div> <!-- row padding-->
