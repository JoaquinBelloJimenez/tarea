//JS para usuarios del tipo Administrador
//Ejecutar al inicio

//Variables globales
lista_seleccionada = 0;
id_usuario = 0;
obtener_categorias();



//Abrir "modals"
function modal_show(id,seleccionada,nombre, desc){
  switch (id) {
    case '#modal_lista':
    lista_seleccionada = seleccionada;
    $.post("servicios/tareas_admin.php",
    {
      tipo: "modal_listas",
      id_lista: seleccionada,
      nombre: nombre,
    },
    function(respuesta){
      $("#modal_lista").append(respuesta);
      $("#modal_lista").css("display","block");
    });
      break;
    case '#modal_nueva_lista':
    $(id).show();
    //Limpiar los campos escritos
    $('#modal_nuevo_usuario').find('input.nombre').val('');
    break;
  case '#modal_editar_lista':
    $(id).show();
    break;
    default:
    $(id).show();
  }
}


//cerrar "modals"
function modal_hide(id){
  $(id).hide();
  if (id = '#modal_lista') {
    $(id).empty();
  }
}


//Crear una nueva lista
function crear_lista(id){
  //Tomar los valores de nombre y contraseña
  var nombre = $('#modal_editar_lista').find('input.nombre').val();
  var categoria = $('option:selected').val();
  $.post("oad/funciones_oad.php",
  {
    funcion:'insert',
    donde: 'listas',
    que: "(NULL,'"+nombre+"','"+categoria+"',"+id+")",
  },
  function(){
    $('#modal_editar_lista').find('input.nombre').val('');
    modal_hide('#modal_editar_lista');
    location.reload();
  });
}

function nueva_tarea(){
  modal_show('#modal_editar_tarea');
}

function guardar_tarea(id,tarea_id){
  var nombre = $('#modal_editar_tarea').find('input.nombre').val();
  var desc = $('#modal_editar_tarea').find('input.desc').val();

    $.post("oad/funciones_oad.php",
    {
      funcion: "insert",
      donde: "tareas",
      que: "(NULL,'"+nombre+"','"+desc+"','"+lista_seleccionada+"')",
    },
    function(){
      $.post("servicios/tareas_admin.php",
      {
        tipo: "obtener_ultima_tarea",
        id_lista: lista_seleccionada,
      },
      function(respuesta){
        $('#modal_lista').find('div.w3-row').after(respuesta);
      });
    });
  }

//Botón para eliminar una tarea
function eliminar_lista(){
  console.log(lista_seleccionada);
  $.post("oad/funciones_oad.php",
  {
    funcion:'delete',
    que: '',
    desde: 'listas',
    donde: 'listas.id_lista ='+lista_seleccionada,
  },
  function(){
    modal_hide('.w3-modal');
    $("#lista_" + lista_seleccionada).fadeOut("slow", function(){
      $("#lista_" + lista_seleccionada).remove();
    });
  });
};



//Generar el desplegable con las categorías
function obtener_categorias(){
  $.post("servicios/tareas_admin.php",
  {
    tipo:'obtener_categorias',
  },
  function(respuesta){
    $('#modal_editar_lista').append(respuesta);
  });
}
