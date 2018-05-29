<?php
//Documentos requeridos
  require_once __DIR__.'/../oad/funciones_oad.php';

//Comprobar que tipo de elemento que requiere el main
if(isset($_POST['tipo'])) {
  switch ($_POST['tipo']) {
    case 'lista':
      generar_lista();
      break;
    case 'lista_tarea':
      $id_lista = $_POST['id_lista'];
      generar_lista_tarea($id_lista);
      break;
    case 'tarea':
      generar_tarea();
      break;
    case 'usuario':
      generar_lista();
      break;
  }
}

function generar_lista(){
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
             <a name="<?=$lista['id_lista']?>" href="#"  onclick="php_lista_tarea_select(this);">
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
  <div id="modal_tareas" class="w3-modal"></div>
<?php }; ?>

<?php
  function generar_lista_tarea($id_lista) {

  require_once __DIR__.'/../oad/base_oad.php';
  //Obtener las tareas
    $sql = datos_select("*","tareas t","WHERE t.id_lista = $id_lista");
    $reg = datos_ejecutar($sql,$id_lista);
?>
<div id="modal_tareas_lista" class="w3-modal-content w3-border w3-animate-zoom">
  <ul class="w3-ul w3-card-4">
    <li class="w3-bar background-color-black color-white">
        <span onclick="bt_atras_tareas();" class="w3-bar-item w3-white w3-xlarge w3-left">
          <i class="fas fa-caret-square-left" onclick=""></i>
          </span>
      <div class="w3-bar-item">
        <span class="w3-xlarge">Tareas de "LISTA"</span><br>
      </div>
    </li>
    <?php   while ($tarea = $reg->fetch(PDO::FETCH_ASSOC)) { ?>
    <li class="w3-bar">
      <div id="<?=$tarea['id_tarea']?>">
        <a name="<?=$tarea['id_tarea']?>" onclick="borrar_lista_tarea(this)" class="w3-bar-item w3-white w3-xlarge w3-right">
          <i class="fas fa-minus-square w3-btn"></i>
        </a>
        <a onclick="editar_lista_tarea(this)" class="w3-bar-item w3-white w3-xlarge w3-right">
          <i class="fas fa-pen-square w3-btn"></i>
        </a>
      </div>
      <div class="w3-bar-item">
        <span id="tnombre_<?=$tarea['id_tarea']?>" class="w3-large"><?=strip_tags($tarea['nombre_tarea'])?></span><br>
        <span id="tdesc_<?=$tarea['id_tarea']?>"><?=strip_tags($tarea['desc_tarea'])?></span>
      </div>
    </li>
    <?php }; ?>
  </ul>
</div>
  <div id="modal_tareas_editar" style="display:none;">
    <div class="w3-modal-content w3-border">
      <div class="w3-container">
        <h3 class="w3-center background-color-black color-white">Editor la TAREA</h3>
        <div class="w3-section">
          <form method="post">
            <span>Título</span>
            <input id="nueva_tnombre" class="w3-input w3-border" type="text" maxlength="20">
            <span>Descripción</span>
            <input id="nueva_tdesc" class="w3-input w3-border" type="text" maxlength="50">
          </form>
        </div>
        <div class="w3-section w3-center">
          <a href="#" id="bt_guardar_tarea">GuArDaR</a>
          <a href="#" id="bt_atras_tarea">CaNcElAr</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>
