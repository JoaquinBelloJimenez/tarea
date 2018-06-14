<?php
#Contenido web de la vista Configuración para usuarios del tipo Administrador
//Documentos requeridos
  require_once __DIR__.'/../oad/funciones_oad.php';

//Comprobar que tipo de elemento que requiere el main
if(isset($_POST['tipo'])) {
  switch ($_POST['tipo']) {
    case 'lista_usuarios':
      generar_lista_usuarios();
      break;
    case 'tareas_usuarios':
      $id_usuario = $_POST['id_usuario'];
      $nombre = $_POST['id_usuario'];
      generar_tareas_usuarios($id_usuario,$nombre);
      break;
    case 'obtener_tareas':
      $respuesta = '<tr><td>miau</td></tr>';
      echo $respuesta;
      break;
  }
}

#Cargar el contenido principal
function generar_lista_usuarios(){
  $id_usuario = $_SESSION['idUsuario'];
  //Obtener los usuarios
  $sql = datos_select("*","usuarios","WHERE id_admin =?");
  $reg = datos_ejecutar($sql,$id_usuario);
 ?>

 <div class="w3-container">
   <div class="w3-row-padding">
   <?php while ($usuario = $reg->fetch(PDO::FETCH_ASSOC)) {
      #Obtener los valores para funciones
      $nombre = $usuario['nombre'];
      $id = $usuario['id_usuario'];
    ?>
     <div id="usuario_<?=$id?>" class="w3-col s12 m6 l3 w3-padding">
       <div class="w3-card-4 w3-center">
         <div class="w3-container background-color-black color-white">
           <h2><i class="fas fa-user"></i></h2>
           <h2><?=$nombre?></h2>
         </div>
         <div class="w3-container w3-padding">
           <button class="w3-button background-color-black color-pri color-hover-pri" type="button" onclick="modal_show_user('#modal_usuario',<?=$id?>,'<?=$nombre?>')">
             Gestionar</button>
           <button class="w3-button background-color-black color-sec color-hover-sec" type="button" onclick="modal_show_user('#modal_eliminar_usuario',<?=$id?>)">
             Eliminar</button>
         </div>
       </div>
     </div>
   <?php } //Bucle de usuarios ?>
   </div>
 </div>

 <!-- boton añadir usuario -->
 <div class="w3-container w3-bottom w3-padding-64 pointer-events-none" style="padding-right:32px;">
   <div class="w3-right w3-circle-icon w3-btn sombra-inferior-negra background-color-white pointer-events-all" onclick="">
     <i class="fas fa-user-plus w3-large"></i>
   </div>
 </div>

 <!-- "modals" -->
 <div id="modal_usuario" class="w3-modal"></div>

 <div id="modal_eliminar_usuario" class="w3-modal">
   <div class="w3-modal-content w3-center">
     <div class="background-color-black color-white">
         <div class="w3-large w3-padding">¿Deseas eliminar el usuario?</div>
       <div class="w3-display-topright">
         <div class="w3-button w3-large color-hover-sec w3-right" onclick="modal_hide_user('#modal_eliminar_usuario')">
           <i class="fas fa-times"></i>
         </div>
       </div>
     </div>
     <h4> <b>Advertencia: </b> ¡¡Los datos no podrán recuperarse!!</h4>
      <p id="bt_eliminar_usuario" class="color-white background-color-sec w3-btn">ELIMINAR</p>
   </div>
 </div>
<?php } //generar_lista_usuarios()

function generar_tareas_usuarios($id_usuario, $nombre){
  //Obtener las listas
  $sql = datos_select("tu.id_asignada, t.nombre_tarea, e.valor","tareas t JOIN tarea_usuario tu ON t.id_tarea = tu.id_tarea JOIN estado e ON e.id_estado = tu.id_estado","WHERE tu.id_usuario =?");
  $reg = datos_ejecutar($sql,$id_usuario);
  $almacen = 'SELECT t.nombre_tarea, e.valor FROM tareas t JOIN tarea_usuario tu ON t.id_tarea = tu.id_tarea JOIN estado e ON e.id_estado = tu.id_estado WHERE tu.id_usuario = 5';

?>
  <div class="w3-modal-content">
      <div class="w3-container">
        <table class="w3-table">
          <tr>
            <th>tarea</th>
            <th>estado</th>
            <th>opciones</th>
          </tr>
          <?php   while ($tarea = $reg->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr id="asignada_<?=$tarea['id_asignada']?>">
            <td><?=$tarea['nombre_tarea']?></td>
            <td><?=$tarea['valor']?></td>
            <td>botones aceptar y eliminar</td>
          </tr>
        <?php } #while ?>
        </table>
      </div>
    </div>

<?php }; #generar_tareas_usuarios ?>
