<?php
#"Modals" usados por el usuario administrador

//Documentos requeridos
  require_once __DIR__.'/../oad/funciones_oad.php';

//Comprobar que tipo de elemento que requiere el main
if(isset($_POST['tipo'])) {
  switch ($_POST['tipo']) {
    case 'lista':

      modal_lista();
      break;
  }
}
 ?>
