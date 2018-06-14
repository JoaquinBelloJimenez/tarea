<?php
#Contenido web de la vista Configuración para usuarios del tipo Administrador
//Requires
require_once __DIR__.'/../oad/funciones_oad.php';

//Variables
$nombre_usuario = $_SESSION['nombreUsuario'];
$id_usuario = $_SESSION['idUsuario'];

//Si se ha definido la contrasseña anterior se recogen los datos
if (isset($_POST['vieja_contra'])) {
  $nombre = $_POST['nombre'];
  $contra = $_POST['contra'];
  $vieja_contra = $_POST['vieja_contra'];
  comprobar_contra($nombre,$contra,$vieja_contra);
}
else{

#Cargar el contenido principal
 ?>
   <div class="w3-content w3-padding">
   <div class="w3-card-4">
     <div class="w3-container background-color-black color-white">
       <h4>Configuración de cuenta</h4>
     </div>
     <div class="w3-row-padding" style="display:flex; justify-content:center;">
       <div class="w3-col s12 m12 l6">
         <form class="w3-container">
             <p>
             <label><b>Nuevo nombre</b><span id="error_nombre" class="error color-sec">*</span></label>
             <input id="nombre" class="w3-input w3-border w3-sand" type="text" value="<?=$nombre_usuario?>"></p>
             <p>
             <label><b>Nueva contraseña</b><span class="color-sec">*</span></label>
             <input id="contra" class="w3-input w3-border w3-sand" type="password" value=""></p>
             <p>
             <label><b>Contraseña anterior</b><span class="color-sec">*</span></label>
             <input id="vieja_contra" class="w3-input w3-border w3-sand" type="password"></p>
             <div class="w3-center w3-large w3-row">
               <div class="w3-half w3-padding">
                 <button class="w3-btn background-color-black color-pri" onclick="modificar();">Guardar cambios</button>
               </div>
               <div class="w3-half w3-padding">
                 <button class="w3-btn background-color-black color-sec" onclick="eliminar(<?=$id_usuario?>);">Eliminar usuario</button>
               </div>
           </div>
         </form>
       </div>
     </div>

   </div>
 </div>

<?php } #else - contenido principal

function comprobar_contra($nombre,$contra,$vieja_contra){
  $id_usuario = $_SESSION["idUsuario"];
  $contra_usuario = $_SESSION["contraUsuario"];
  //Comprobar la contraseña facilitada por el usuario
  if ($vieja_contra == $contra_usuario) {
    //Generar la sentencia sql
    $sql = datos_update("usuarios","nombre =? , contrasenia =?","usuarios.id_usuario =?");
    //Mandar la sentencia sql
    $reg = datos_ejecutar($sql,$nombre,$contra,$id_usuario);

  }
}


  ?>
