<?php

function usar_api(){
  //Coger el token definido
  require_once "constantes/token.php";
  require_once "constantes/datos_bd.php";

//Comprobar que existe el token
  try {
    $base_api = new PDO(BT_DSN,BT_USUARIO,BT_CONTRASENIA);
  } catch (PDOException $e) {
    die("**Error en API: ". $e->getMessage());
  }

  $sql = $base_api->prepare("SELECT * FROM token WHERE id_token = ?");
  $reg = $sql->execute(array(TOKEN));

    if ($sql->rowCount()){
      #Si la clave es correcta conecta con la base de datos del proyecto
      #principal y accede a los datos de las categorías.
      $sql = "";
      $base_api = "";
      $base_api = new PDO(BD_DSN,BD_USUARIO,BD_CONTRASENIA);

      $reg = $base_api->query("SELECT l.id_categoria, c.id_categoria, c.nombre_categoria  FROM listas l, categorias c WHERE l.id_categoria = c.id_categoria LIMIT 5");

      //Mostrar con un BadFunctionCallException
      while ($categoria = $reg->fetch(PDO::FETCH_ASSOC)) {
        $objeto[] = $categoria['nombre_categoria'] ;
      }

      $encode = json_encode($objeto);

      return $encode;

    } else{
      echo "Clave errónea";
    };
}



























 ?>
