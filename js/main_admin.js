//JS para usuarios del tipo Administrador

  //Cargar el gestor de listas / asignador de tareas
  php_lista_select();

//Menu superior (Selector de secciones)


//Seccion de listas

  //Ver listas
  //Regresar a la vista de listas
  function bt_atras_tareas() {
      $("#modal_tareas").empty();
      $("#modal_tareas").css("display","none");
  }

  //Crear listas
  function nueva_lista() {
    $("#nuevaLista").show();
    $("#nuevaLista input").focus();
    $("#bt_nuevaLista").hide();
  }

  //Eliminar listas
  function borrar_lista(elemento) {
    //Abrir el modal
    $("#modal_eliminar").css("display","block");

    //Al aceptar se elimina el elemento y se oculta el modal
      $("#bt_modal_eliminar").click( function(){
        //Llamar a php para eliminar el elemento de la base de datos
        $("#idlista_" + elemento.name).hide();
        $('#modal_eliminar').hide();
        php_lista_borrar(elemento);
      });
    }

    function borrar_lista_tarea(elemento) {
      console.log(elemento.name);
      }

//Sección de listas: llamadas PHP

  //select
  function php_lista_select() {
    $.post("servicios/funciones_admin.php",
    {
      tipo: "lista",
    },
    function(respuesta){
      $("#cuerpo").append(respuesta);
      $("#nuevaLista").hide();
    });
  }

  function php_lista_tarea_select(elemento) {
    $.post("servicios/funciones_admin.php",
    {
      tipo: "lista_tarea",
      id_lista: elemento.name,
    },
    function(respuesta){
      $("#modal_tareas").append(respuesta);
      $("#modal_tareas").css("display","block");
    });
  }

  //create
  function php_lista_crear(nombre) {
    $.post("oad/funciones_oad.php",
    {
      funcion: "create",
      donde: "listas",
      nombre: nombre,
      categoria: 1,
      usuario: 1,
    },
    function(){
      $("#cuerpo").empty();
      php_lista_select();
    });
  }

  //delete
  function php_lista_borrar(elemento) {
    //Sistema ajax para eliminar elemento
    $.post("oad/funciones_oad.php",
      {
        que: "l",
        desde: "listas l",
        donde: "l.id_lista = "+ elemento.name,
        funcion: "delete",
      },
      function(respuesta){
        console.log("eliminado!");
        /*$("#idlista_" + elemento.name).fadeOut("slow", function(){
          $("#idlista_" + elemento.name).remove();
        });*/
      });
  }

  function php_lista_tarea_borrar(elemento) {
    //Sistema ajax para eliminar elemento
    $.post("oad/funciones_oad.php",
      {
        que: "t",
        desde: "tareas t",
        donde: "t.id_tarea = "+ elemento.name,
        funcion: "delete",
      },
      function(respuesta){
        console.log("¡tarea eliminada!");
        /*$("#idlista_" + elemento.name).fadeOut("slow", function(){
          $("#idlista_" + elemento.name).remove();
        });*/
      });
  }


  //Seccion de usuarios

    //Ver usuarios

    //Crear usuarios

    //Eliminar usuarios

  //Sección de usuarios: llamadas PHP

    //select

    //create

    //delete



    //Seccion de tareas

      //Ver tareas

      //Crear tareas

      //Eliminar tareas

    //Sección de tareas: llamadas PHP

      //select
      function php_tareas_select() {
        $.post("servicios/funciones_admin.php",
        {
          tipo: "tarea",
        },
        function(respuesta){
          $("#cuerpo").append(respuesta);
          $("#nuevaLista").hide();
        });
      }

      //create

      //delete





// -- Funciones dentro de la página --

  // -- Botones --
  //Eliminar una tarea
  function bt_borrar_tarea(elemento) {
      $("#bt_modal_eliminar").click( function(){
        $("#idlista_" + elemento.name).hide();
        $('#modal_eliminar').hide();
        php_borrar(elemento);
      });
  }



  //Al cancelar se limpian los valores de los botones
    $("#bt_cancelar_eliminar").click( function(){
      elemento = 0;
      $('#modal_eliminar').hide();
    });


function ver_escrito(elemento){
  nombre = $( elemento ).siblings( "input" ).val();
  php_lista_crear(nombre);
}
