//JS de administradores para gestión de usuarios

//Variables globales
usuario_seleccionado = 0;

//Funciones de modales

//Botón para eliminar un usuario
$('#bt_eliminar_usuario').click(function(){
  $.post("oad/funciones_oad.php",
  {
    funcion:'delete',
    que: '',
    desde: 'usuarios',
    donde: 'usuarios.id_usuario ='+usuario_seleccionado,
  },
  function(){
    modal_hide_user('#modal_eliminar_usuario');
    $("#usuario_" + usuario_seleccionado).fadeOut("slow", function(){
      $("#usuario_" + usuario_seleccionado).remove();
    });
  });
})


//Abrir "modals"
function modal_show_user(id,seleccionado,nombre){
  if (id = '#modal_usuario') {
    $.post("oad/funciones_oad.php",
    {
      tipo: "tareas_usuarios",
      id_usuario: seleccionado,
      nombre: nombre,
    },
    function(respuesta){
      $("#modal_usuario").append(respuesta);
      $("#modal_usuario").css("display","block");
    });
  }
  else {
    $(id).show();
    usuario_seleccionado = seleccionado;
  }
}


//cerrar "modals"
function modal_hide_user(id){
  $(id).hide();
}
