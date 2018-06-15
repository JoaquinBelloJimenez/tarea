//JS para usuarios del tipo Administrador
//Archivo principal

  //Cargar el gestor de listas / asignador de tareas
  $("#cuerpo").hide();
  lista_first_select();



  //Funciones para cargar contenido
    //cargar de primera
    function lista_first_select(){
      php_lista_select();
      console.log('cargado las listas');
    }

    function usuario_first_select(){
      php_usuario_select();
      console.log('cargado los usuarios');
    }

    function config_first_select(){
      php_config_select();
      console.log('cargado el config');
    }

  //Cargar la vista de listas
  function php_lista_select() {
    $("#cuerpo").hide();
    $.getScript( "js/tareas_admin.js");
    $.post("servicios/web_admin.php",
    {
      tipo: "lista",
    },
    function(respuesta){
      $("#cuerpo").empty();
      $("#cuerpo").append(respuesta);
      //Aparecer de forma suave
      $("#cuerpo").fadeIn("fast", function(){});
    });
  }

  //Cargar la vista de usuarios
  function php_usuario_select() {
    $("#cuerpo").hide();
    $.getScript( "js/usuarios_admin.js");
    $.post("servicios/usuarios_admin.php",
    {
      tipo: "lista_usuarios",
    },
    function(respuesta){
      $("#cuerpo").empty();
      $("#cuerpo").append(respuesta);
      //Aparecer de forma suave
      $("#cuerpo").fadeIn("fast", function(){});
    });
  }

  //Cargar la vista de configuracion
  function php_config_select() {
    $("#cuerpo").hide();
    $.getScript( "js/config_admin.js");
    $.ajax({
      url: 'servicios/config_admin.php',
      success: function(html) {
        $("#cuerpo").empty();
        $("#cuerpo").append(html);
        //Aparecer de forma suave
        $("#cuerpo").fadeIn("fast", function(){});
      }
   });
  };


  //Funciones auxiliares

  //Comprobar la longitud de un texto
  function comprobar_longitud(text){
    if (text.length > 0) {
      return true;
    }
    else {
      return false;
    }
  }
