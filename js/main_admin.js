//JS para usuarios del tipo Administrador

  //Cargar el gestor de listas / asignador de tareas
  php_lista_select();



  //Gestion de "modals"
  //Mostrar "modals"
  function modal_show(id,tipo,val1,val2){

    switch (tipo) {
      case 'lista':
          php_tarea_select(id,val1);
          $('#modal_lista').show();
          $('#modal_lista_nombre').text(val1);
          console.log('lista');
        break;
      default:
        console.log('error en modal_show');
    }
  }





  //"Modals" segun sus funciones
  function modal_listas(id,val1) {

  }




//Seccion de listas

  //Ver listas
  //Regresar a la vista de listas
  function bt_atras_tareas() {
      $("#modal_tareas").empty();
      $("#modal_tareas").css("display","none");
  }

  //Crear / editar listas
  function nueva_lista() {
    $("#nuevaLista").show();
    $("#nuevaLista input").focus();
    $("#bt_nuevaLista").hide();
  }

  //Editar una tarea en la vista de listas
  function editar_lista_tarea(elemento){
    var id = $(elemento).parent().attr('id');
    $('#nueva_tarea').css('display','block');
    $('#nueva_tnombre').val($('#tnombre_' + id).text());
    $('#nueva_tdesc').val($('#tdesc_' + id).text());

    //Mostrar el editor
    $('#modal_tareas_editar').show();
    //Ocultar la lista
    $("#modal_tareas_lista").hide();

    //Botón de aceptar
    $('#bt_guardar_tarea').click(function(){
      var tnombre = $('#nueva_tnombre').val();
      var tdesc = $('#nueva_tdesc').val();
      $('#tnombre_' + id).text(tnombre);
      $('#tdesc_' + id).text(tdesc);
      //Ocultar el editor
      $('#modal_tareas_editar').hide();
      //Mostrar la lista
      $("#modal_tareas_lista").show();

      //Llamar a la base de datos
      php_lista_tarea_editar(tnombre, tdesc, id);
      id = 0;
    });
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
        php_lista_tarea_borrar(elemento)
      }

//Sección de listas: llamadas PHP

  //select
  function php_lista_select() {
    $.post("servicios/web_admin.php",
    {
      tipo: "lista",
    },
    function(respuesta){
      $("#cuerpo").append(respuesta);
      $("#nuevaLista").hide();
    });
  }

  function php_tarea_select(id,nombre) {
    $.post("servicios/web_admin.php",
    {
      tipo: "tarea",
      id_lista: id,
      nombre: nombre,
    },
    function(respuesta){
      $("#modal_lista").append(respuesta);
      $("#modal_lista").css("display","block");
    });
  }

  //create / insert
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

  function php_lista_tarea_crear(nombre) {
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

  function php_lista_tarea_editar(tnombre, tdesc, id) {
    $.post("oad/funciones_oad.php",
    {
      funcion: "update",
      donde: "tareas",
      que: 'nombre_tarea ="' + tnombre + '", desc_tarea ="' + tdesc + '"',
      comprueba: "id_tarea =" + id,
    },
    function(){
      console.log("guardado en bbdd");
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
        $('#tarea_'+ elemento.name).hide();
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
