//JS de administradores para gestión de usuarios

//Variables globales
usuario_seleccionado = 0;
lista_tareas = 0;

obtener_tareas();
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
  switch (id) {
    case '#modal_usuario':
    $.post("servicios/usuarios_admin.php",
    {
      tipo: "tareas_usuarios",
      id_usuario: seleccionado,
      nombre: nombre,
    },
    function(respuesta){
      $("#modal_usuario").append(respuesta);
      $("#modal_usuario").css("display","block");
    });
      break;
    default:
    $(id).show();
  }
  usuario_seleccionado = seleccionado;
}


//cerrar "modals"
function modal_hide_user(id){
  $(id).hide();
  if (id = '#modal_usuario') {
    $(id).empty();
  }
}

//Generar el desplegable con las tareas asocaibales
function obtener_tareas(){
  $('#bt_asignar').prop('disabled', true);
  $.post("servicios/usuarios_admin.php",
  {
    tipo:'obtener_tareas',
  },
  function(respuesta){
    lista_tareas = respuesta;
  });
}

//Mostrar el desplegable con las tareas asociables
function nueva_asignada(){
  $("table tbody").append(lista_tareas);
}
