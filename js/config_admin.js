//JS de administradores para gestión de usuarios

function modificar(){
  //Si todos los campos están completos se procede a comprobar los datos
  if ( comprobar_longitud($('#nombre').val()) ) {
    if ( comprobar_longitud($('#contra').val()) ) {
      if ( comprobar_longitud($('#vieja_contra').val()) ) {
        $.post("servicios/config_admin.php",
        {
          nombre: $('#nombre').val(),
          contra: $('#contra').val(),
          vieja_contra: $('#vieja_contra').val(),
        },
        function(){
          //Al finalizar cerramos la sesión
          $.get({ url: 'main_admin.php?eliminar' });
          window.location.href = 'login.php';
        });
      }
    }
  }
  //Mostrar la alerta
  if (!comprobar_longitud($('#nombre').val()) || !comprobar_longitud($('#contra').val()) || !comprobar_longitud($('#vieja_contra').val()) ) {
      $('#error_nombre').text('* Todos los campos son obligatorios');
  }
}

function eliminar(id) {
  if ( comprobar_longitud($('#vieja_contra').val()) ) {
    $.post("oad/funciones_oad.php",
    {
      funcion:'delete',
      que: '',
      desde: 'usuarios',
      donde: 'usuarios.id_usuario ='+id,
    },
    function(){});
  } else {
    $('#error_nombre').text('* Inserta tu contraseña anterior');
  }
}
