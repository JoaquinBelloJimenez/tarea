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
    <?php   while ($lista = $reg->fetch(PDO::FETCH_ASSOC)) { ?>
      <div class="w3-col s12 l6 padding-bottom">
        <div class="w3-card w3-row background-color-black">
          <div class="w3-col s8 m10 w3-padding">
            <?= $lista['nombre_lista'] ?>
          </div>
          <div class="w3-col s4 m2 w3-border-left border-color-white w3-btn">
            <a name="<?=$lista['id_lista']?>" onclick="php_lista_tarea_select(this);"><i class="fas fa-pen-square"></i></a>
          </div>
        </div>
      </div>
  <?php } ?>
    </div>
</div>
<!-- boton añadir pantallas grandes -->
<div class="w3-container w3-bottom w3-padding-64" style="padding-right:32px;">
  <div class="w3-right w3-circle-icon w3-btn sombra-inferior-negra background-color-white">
    <i class="fa fa-plus w3-large"></i>
  </div>
</div>

<?php } //function gestor_tareas() ?>
