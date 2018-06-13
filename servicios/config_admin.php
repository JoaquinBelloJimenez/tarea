<?php
#Contenido web de la vista Configuración para usuarios del tipo Administrador

//Comprobar sesión
session_start();

#Require

#Variables
$id_usuario = $_SESSION['idUsuario'];
$contra_usuario = $_SESSION['contraUsuario'];
$nombre_usuario = $_SESSION["nombreUsuario"];
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
             <label><b>Nueva contraseña</b><span id="error_contra" class="color-sec">*</span></label>
             <input id="contra" class="w3-input w3-border w3-sand" type="password" value=""></p>
             <p>
             <label><b>Contraseña anterior</b><span id="error_anterior" class="color-sec">*</span></label>
             <input class="w3-input w3-border w3-sand" type="password"></p>
             <div class="w3-center w3-large w3-row">
               <div class="w3-half w3-padding">
                 <button class="w3-btn background-color-black color-pri" onclick="prueba();">Guardar cambios</button>
               </div>
               <div class="w3-half w3-padding">
                 <button class="w3-btn background-color-black color-sec" onclick="">Eliminar usuario</button>
               </div>
           </div>
         </form>
       </div>
     </div>

   </div>
 </div>
 <script type="text/javascript">
 //Obtener la contraseña del usuario
 contra_usuario = <?php echo json_encode($the_php_var) ?>;
 </script>
