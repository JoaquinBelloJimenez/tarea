<?php
  //Tomar datos inicio en base de datos
  require_once "constantes/datos_bd.php";

  class tarea_bd
  {

    function __construct(){
      try{
      $this->basedatos = new PDO(BD_DSN,BD_USUARIO,BD_CONTRASENIA);
      $this->basedatos->exec("SET CHARACTER SET utf8");
      }catch(PDOException $e){
        die("**Error: ". $e->getMessage());
      }
    }

    public function sentencia($presql,$datos){
      //Asegurar cadena escapada
      $sql = $this->basedatos->prepare($presql); //Prepara la sentencia para evitar errores
      $sql->execute($datos);
      //Devolver los datos
      return $sql;
  }
}

 ?>
