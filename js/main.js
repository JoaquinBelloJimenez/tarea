//Main de usuarios corrientes

//Seleccionar entre ver todas las tareas o ver las incompletas

//Recargar la página
function recargar(){
  $.post("servicios/tareas.php",
  {
    tipo: "recarga",
  },
  function(respuesta){
    $("#cuerpo").empty();
    $("#cuerpo").append(respuesta);
  });
}

function  enviar_Tarea(id){
  $.post("oad/funciones_oad.php",
  {
    funcion: "update",
    que: 'id_estado = 1',
    donde: 'tarea_usuario',
    comprueba: 'id_asignada ='+id,
  },
  function(){
    $('#asignada_'+id).find('.estado').text('Pendiente');
    $('#asignada_'+id).find('.enviar').hide();
  });
}
