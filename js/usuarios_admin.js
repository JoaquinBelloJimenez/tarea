//JS de administradores para gestión de usuarios

//Variables globales
usuario_seleccionado = 0;

//Funciones de modales

//Botón para eliminar un usuario
$('#bt_eliminar_usuario').click(function(){
  console.log(usuario_seleccionado);
  //php_usuario_eliminar(usuario_seleccionado);
})


//Abrir "modals"
function modal_show_user(id,seleccionado,nombre){
  $(id).show();
  usuario_seleccionado = seleccionado;
}


//cerrar "modals"
function modal_hide(id){
  $(id).hide();
}
