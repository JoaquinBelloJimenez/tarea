<?php
#Módulos web usados por el usuario administrador

//Documentos requeridos
  require_once __DIR__.'/../oad/funciones_oad.php';

//Comprobar que tipo de elemento que requiere el main
if(isset($_POST['tipo'])) {
  switch ($_POST['tipo']) {
    case 'lista':
      gestor_listas();
      break;
      case 'tarea':
        gestor_tareas();
        break;
  }
}

#Gestor de listas y tareas
function gestor_listas() {
    $id_usuario = $_SESSION['idUsuario'];
    //Obtener las listas
    $sql = datos_select("l.id_lista, l.nombre_lista","listas l","WHERE l.id_usuario = $id_usuario");
    $reg = datos_ejecutar($sql,$id_usuario);
 ?>
  <div class="w3-container">
    <div class="w3-container">
      <div class="w3-panel w3-card w3-row background-color-pri color-white w3-large">
        ¡Accede a una lista para editarla y modificar las tareas!
      </div>
    </div>

    <div class="w3-row-padding w3-xlarge">
    <?php   while ($lista = $reg->fetch(PDO::FETCH_ASSOC)) {
      #Obtener los valores para funciones
      $nombre = $lista['nombre_lista'];
      $id = $lista['id_lista'];
      ?>
      <div class="w3-col s12 l6 padding-bottom">
        <div class="w3-card w3-row background-color-black">
          <div id="lista_<?=$id?>" class="w3-col s8 m10 w3-padding"><?=$nombre?></div>
          <div class="w3-col s4 m2 w3-border-left border-color-white w3-btn" onclick="modal_show('<?=$id?>','lista','<?=$nombre?>',0);">
            <a><i class="fas fa-pen-square"></i></a>
          </div>
        </div>
      </div>
  <?php } ?>
    </div>
</div>
<!-- boton añadir pantallas grandes -->
<div class="w3-container w3-bottom w3-padding-64 pointer-events-none" style="padding-right:32px;">
  <div class="w3-right w3-circle-icon w3-btn sombra-inferior-negra background-color-white pointer-events-all">
    <i class="fa fa-plus w3-large"></i>
  </div>
</div>
<!-- "modals" -->
<div id="modal_lista" class="w3-modal"></div>

<?php } //function gestor_tareas() ?>

 <?php
 #Modal lista
 function gestor_tareas() {
   $id_lista = $_POST['id_lista'];
   $nombre = $_POST['nombre'];

 $sql = datos_select("*","tareas t","WHERE t.id_lista = $id_lista");
 $reg = datos_ejecutar($sql,$id_lista);
  ?>
    <div class="w3-modal-content w3-animate-top">
      <div class="w3-row background-color-black">
        <div class="w3-col s1">
          <div class="w3-button w3-large color-hover-sec" onclick="modal_hide('#1')">
            <i class="fas fa-long-arrow-alt-left"></i>
          </div>
        </div>
        <div class="w3-col s10">
          <div id="modal_lista_nombre" class="w3-large w3-padding w3-center"><?=$nombre?></div>
        </div>
        <div class="w3-col s1">
          <div class="w3-dropdown-hover w3-padding w3-large color-hover-pri background-color-black-f w3-right">
            <i class="fas fa-chevron-down"></i>
            <div class="w3-dropdown-content w3-bar-block" style="right:0;">
              <a href="#" class="w3-bar-item w3-button">Renombrar</a>
              <a href="#" class="w3-bar-item w3-button">Eliminar</a>
            </div>
          </div>
        </div>
      </div>
      <?php   while ($tarea = $reg->fetch(PDO::FETCH_ASSOC)) { ?>
      <div class="w3-padding w3-large w3-border">
        <span><?=$tarea['nombre_tarea'];?></span> <br>
        <span><?=$tarea['desc_tarea'];?></span>
      </div>
    <?php } ?>
    </div>

<?php } ?>
