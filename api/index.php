<?php
"SELECT TOP 5
  PlayerID, SUM(AST) ASTSUM
FROM tblIndStats
GROUP BY PlayerID
ORDER BY ASTSUM DESC"
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../css/w3.css">
     <link rel="stylesheet" href="../css/color_flower.css">
     <meta name="viewport" content="width=device-width, user-scalable=no">
     <title></title>
   </head>
   <body class="color-gunmetal">
     <div class="w3-container w3-animate-top color-viridian">
       <p><h3 class=""> Expande tus horizontes con </h3>
       <h2 class="">TAREA - API</h2></p>
       </div>

       <div class="w3-row">

       <div class="w3-container w3-third w3-animate-left">
       <div class="w3-panel w3-card-4 w3-white">
         <div class="w3-container">
           <h4 class="w3-center">¿Qué etiqueta mola más?</h4>
         </div>
         <p>
           Cuáles son las últimas usadas, las listas recien creadas y mucho más.
         </p>
       </div>
     </div>

     <div class="w3-container w3-third w3-animate-left">
     <div class="w3-panel w3-card-4 w3-white">
       <div class="w3-container">
         <h4 class="w3-center">¿Cómo empiezo?</h4>
       </div>
       <p>
         Regístrate con tu usuario de TAREA y recibe la clave ya.
       </p>
     </div>
   </div>

   <div class="w3-container w3-third w3-animate-left">
   <div class="w3-panel w3-card-4 w3-white">
     <div class="w3-container">
       <h4 class="w3-center">¿Es difícil?</h4>
     </div>
     <p>
       Accede a este <a href="#">enlace</a> usando tu clave y compruébalo tú mismo.
     </p>
   </div>
 </div>

</div>
<div class="w3-row">
  <div class="w3-third w3-container"></div>
  <div class="w3-third">
    <div class="w3-shadow w3-card-4">
      <div class="w3-container color-viridian">
        <h2>Inicio de sesión</h2>
      </div>
      <form class="w3-container w3-white w3-center">
        <input class="w3-input w3-padding-16" type="text" name="usuario" placeholder="USUARIO">
        <input class="w3-input w3-padding-16" type="password" name="contrasenia" placeholder="CONTRASEÑA">
        <h3><input class="w3-btn" type="submit" value="ENTRAR"></h3>
     </form>
    </div>

  </div>
</div>
   </body>
 </html>
