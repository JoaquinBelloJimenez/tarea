<?php
  require_once __DIR__.'/../oad/funciones_oad.php';

  $id_lista = $_POST['id_lista'];

  //Obtener las tareas
  $sql = datos_select("*","tareas","WHERE tareas.id_lista = $id_lista");
  $reg = datos_ejecutar($sql,$id_lista);

 ?>

 <div class="w3-modal-content w3-border">
   <div class="w3-container w3-center">
     <span id="bt_atras_tareas" class="w3-btn w3-display-topleft color-hover-black"><i class="fas fa-caret-square-left color-pri"></i></span>
     <h3>Tareas en 'LISTA.NOMBRE'</h3>
     <div class="">
        <table class="w3-table-all w3-bordered">
          <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
          </tr>
       <?php   while ($tarea = $reg->fetch(PDO::FETCH_ASSOC)) { ?>
         <tr>
           <td><?=$tarea['nombre_tarea']?></td>
           <td><?=$tarea['desc_tarea']?></td>
           <td name="<?=$tarea['id_tarea']?>">
             <i class="fas fa-pen-square w3-btn color-hover-pri" onclick=""></i>
             <i class="fas fa-minus-square w3-btn color-hover-sec" onclick=""></i>
           </td>
         </tr>
      <?php }; ?>
      </table>
     </div>
   </div>
 </div>
