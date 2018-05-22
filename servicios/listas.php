<?php
  //Id del usuario
  $id_usuario = $_SESSION['idUsuario'];

  //Obtener las listas
  $sql = datos_select("t.*, tu.id_estado"," tarea_usuario tu, tareas t","WHERE tu.id_usuario = ? AND t.id_tarea = tu.id_tarea ");
  $reg = datos_ejecutar($sql,$id_usuario);
 ?>

        <div class="w3-panel w3-center full-width">
        </div>
        <div>
           <div class="w3-row-padding">

        <?php   while ($tarea = $reg->fetch(PDO::FETCH_ASSOC)) {?>
          <div class="s1 w3-third w3-display-container <?=$tarea["completada"]?>">
            <div class="w3-card" style="min-height:200px;">
              <div class="w3-container background-color-black color-white">
                <h4><?=$tarea["nombre_tarea"]?></h4>
             </div>
              <div class="w3-container">
                <p><?=$tarea["desc_tarea"]?></p>
             </div>
             <div class="w3-container w3-padding w3-display-bottommiddle">
               <h4><?=$tarea["id_estado"]?> </h4>
             </div>
             <?php #Mostrar "enviar" si aun es incompleta
              if ($tarea["id_estado"] == "0") {
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
