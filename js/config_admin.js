//JS de administradores para gestión de usuarios

//Funciones de "modals"

//Abrir "modals"
function modal_show_user(id,seleccionado,nombre){
  $(id).show();
  usuario_seleccionado = seleccionado;
}


//cerrar "modals"
function modal_hide(id){
  $(id).hide();
}


function prueba(){
  //Comprobar la longitud de un texto
  if ( comprobar_longitud($('#nombre').val()) ) {
    console.log('hay nombre');
    if ( comprobar_longitud($('#contra').val()) ) {
      console.log('hay contraseña');
    }
  }
}
