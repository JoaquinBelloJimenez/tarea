<?php
  //Id del usuario
  $id_usuario = $_SESSION['idUsuario'];

  //Obtener las listas
  $sql = datos_select("l.nombre_lista","listas l, usuarios u","WHERE l.id_usuario = u.id_usuario ORDER BY l.nombre_lista");
  $reg = datos_ejecutar($sql,$id_usuario);

?>

<div class="w3-panel w3-center full-width">
</div>

  <div class="w3-container w3-padding w3-display">
    <div class="w3-panel background-color-pri-light w3-center">
    </div>

    <div class="w3-row-padding w3-center">

     <?php   while ($tarea = $reg->fetch(PDO::FETCH_ASSOC)) { ?>

       <div class="s1 w3-third w3-display-container">
         <div class="w3-card">
           <div class="w3-container background-color-black color-white">
             <h4><?=$tarea["nombre_lista"]?></h4>
          </div>
           <div class="w3-row">
             <a href="#" class="w3-half w3-padding-64 background-color-pri w3-btn">
                <h1><i class="fas fa-pen-square color-white"></i></h1>
             </a>
             <a href="#" class="w3-half background-color-sec-light w3-padding-64 w3-btn">
               <h1><i class="fas fa-minus-square color-white"></i></h1>
             </a>
          </div>
        </div>
      </div>

    <?php } ?>

   </div>

  </div>
