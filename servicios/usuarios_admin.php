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
    case 'lista_tarea':
      $id_lista = $_POST['id_lista'];
      generar_lista_tarea($id_lista);
      break;
    case 'tarea':
      generar_tarea();
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
           <button class="w3-button background-color-black color-pri color-hover-pri" type="button">Gestionar</button>
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
         <div class="w3-button w3-large color-hover-sec w3-right" onclick="modal_hide('#modal_eliminar_usuario')">
           <i class="fas fa-times"></i>
         </div>
       </div>
     </div>
     <h4> <b>Advertencia: </b> ¡¡Los datos no podrán recuperarse!!</h4>
      <p id="bt_eliminar_usuario" class="color-white background-color-sec w3-btn">ELIMINAR</p>
   </div>
 </div>
<?php } //generar_lista_usuarios() ?>