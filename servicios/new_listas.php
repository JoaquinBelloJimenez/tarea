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
         <div class="w3-container w3-border-top w3-padding-16 color-white background-color-black">
             <span style="font-size:28px;" class="w3-padding w3-hide-small"> <?= $tarea['nombre_lista'] ?>  </span>
           <div class="w3-right">
             <a href="#"><i class="fas fa-pen-square color-white w3-btn color-hover-pri " style="font-size:28px;"></i></a>
             <a href="#"><i class="fas fa-minus-square color-white w3-btn color-hover-sec" style="font-size:28px;"></i></a>
           </div>
         </div>
      </div>

    <?php } ?>

   </div>

  </div>
