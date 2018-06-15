//JS de administradores para gestión de usuarios

//Ejecutar al inicio
$(function(){
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
});

//Botón para crear un usuario
$('#bt_confirmar_usuario').click(function(){
  //Tomar los valores de nombre y contraseña
  var nombre = $('#modal_nuevo_usuario').find('input.nombre').val();
  var contra = $('#modal_nuevo_usuario').find('input.contra').val();
  $.post("oad/funciones_oad.php",
  {
    funcion:'insert',
    donde: 'usuarios',
    que: "(NULL,'"+nombre+"','"+contra+"',"+usuario_seleccionado+")",
  },
  function(){
    php_usuario_select()
    $("#usuario_" + usuario_seleccionado).fadeOut("slow", function(){
      $("#usuario_" + usuario_seleccionado).remove();
    });
  });
});

});

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
    case '#modal_nuevo_usuario':
    $(id).show();
    //Limpiar los campos escritos
    $('#modal_nuevo_usuario').find('input.nombre').val('');
    $('#modal_nuevo_usuario').find('input.contra').val('');
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
  $('#bt_asignar').prop("disabled",true);
  $("table tbody").append(lista_tareas);
}

//Escribir la nueva asignación en la base de datos
function escribir_asignada(id){
  $.post("oad/funciones_oad.php",
  {
    funcion: "insert",
    donde: "tarea_usuario",
    que: "(NULL,"+usuario_seleccionado+","+id+",0)",
  },
  function(){
    $.post("servicios/usuarios_admin.php",
    {
      tipo: "obtener_ultima_tarea",
      id_usuario: usuario_seleccionado,
    },
    function(respuesta){
      $('#selector_asignada').remove();
      $('#bt_asignar').prop("disabled",false);
      $("table tbody").append(respuesta);
    });
  });
}

//Completar asiganada
function completar_asignada(id){
  $.post("oad/funciones_oad.php",
  {
    funcion: "update",
    que: 'id_estado = 2',
    donde: 'tarea_usuario',
    comprueba: 'id_asignada ='+id,
  },
  function(){
    $('#asignada_'+id).find('.estado').text('Completa');
  });
}

//Eliminar la asignada seleccionada
function eliminar_asignada(id){
  $.post("oad/funciones_oad.php",
  {
    funcion: "delete",
    que: '',
    desde: 'tarea_usuario',
    donde: 'id_asignada ='+id,
  },
  function(){
    $('#asignada_'+id).hide();
  });
}
