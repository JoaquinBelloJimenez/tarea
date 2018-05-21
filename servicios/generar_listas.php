<?php

function generar_listas(){
  $id_usuario = $_SESSION['idUsuario'];

  require_once __DIR__.'/../oad/base_oad.php';

  //Obtener las listas
  $sql = datos_select("l.id_lista, l.nombre_lista","listas l","WHERE l.id_usuario = $id_usuario");
  $reg = datos_ejecutar($sql,$id_usuario);
?>

<div class="w3-panel w3-center full-width">
</div>

  <div class="w3-container w3-padding w3-display">
    <div class="w3-panel w3-center">
    </div>

    <div class="w3-row-padding w3-center">

     <?php   while ($lista = $reg->fetch(PDO::FETCH_ASSOC)) { ?>

       <div class="s1 w3-third w3-display-container w3-margin-bottom" id="idlista_<?=$lista['id_lista']?>">
         <div class="w3-container w3-border-top w3-padding-16 color-white background-color-black">
             <span style="font-size:28px;" class="w3-padding"> <?= $lista['nombre_lista'] ?>  </span>
           <div class="w3-right">
             <a name="<?=$lista['id_lista']?>" href="#"  onclick="php_tareas_select(this);">
               <i class="fas fa-pen-square color-white w3-btn color-hover-pri w3-round"></i></a>
             <a name="<?= $lista['id_lista'] ?>" href="#" onclick="borrar_lista(this);">
               <i class="fas fa-minus-square color-white w3-btn color-hover-sec w3-round"></i>
             </a>
           </div>
         </div>
      </div>

    <?php } ?>

    <!--Botón Crear nueva lista-->
    <div id="bt_nuevaLista" class="s1 w3-third w3-display-container color-hover-black">
      <div class="w3-container w3-border-top w3-padding-16 color-white background-color-pri color-hover-pri" onclick="nueva_lista();">
          <span style="font-size:28px;" class="w3-padding "> Crear Lista </span>
          <i class="fas fa-plus-square color-white" style="font-size:28px;"></i>
      </div>
   </div>

   <!--Nueva lista-->
   <div id="nuevaLista" class="s1 w3-third w3-display-container">
     <div class="w3-container w3-padding-16 color-white background-color-black" onclick="nueva_lista();">
         <input type="text" class="w3-padding ">
         <i class="fas fa-check-square color-white w3-btn color-hover-pri" style="font-size:28px;" onclick="ver_escrito(this);"></i>
     </div>
  </div>

   </div>

  </div>

  <!-- modal_eliminar -->
  <div id="modal_eliminar" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container w3-center">
      <span id="bt_cancelar_eliminar" class="w3-button w3-display-topright">&times;</span>
      <h3>¿Deseas eliminar la lista?</h3>
      <h4> <b>Advertencia: </b> ¡¡Todas las tareas asociadas serán eliminadas junto a la lista!!</h4>
       <p id="bt_modal_eliminar" class="color-white background-color-sec w3-btn">ELIMINAR</p>
    </div>
  </div>
</div>

  <!-- modal_tareas -->
  <div id="modal_tareas" class="w3-modal">
  </div>
<?php }; ?>
