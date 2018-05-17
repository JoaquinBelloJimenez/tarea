//Main de usuarios corrientes

  //Cargar el php interno
  php_lista_select();

function nueva_lista() {
  $("#nuevaLista").show();
  $("#nuevaLista input").focus();
  $("#bt_nuevaLista").hide();
}

function borrar_lista(elemento) {
  //Abrir el modal
  $("#modal_eliminar").css("display","block");

  //Al aceptar se elimina el elemento y se oculta el modal
    $("#bt_modal_eliminar").click( function(){
      //Llamar a php para eliminar el elemento de la base de datos

      $("#idlista_" + elemento.name).hide();
      $('#modal_eliminar').hide();
      php_borrar(elemento);
    });

  //Al cancelar se limpian los valores de los botones
    $("#bt_cancelar_eliminar").click( function(){
      elemento = 0;
      $('#modal_eliminar').hide();
    });
}


function ver_escrito(elemento){
  nombre = $( elemento ).siblings( "input" ).val();
  php_lista_crear(nombre);
}

//Lamadas a php

function php_lista_select() {
  $.post("oad/funciones_oad.php",
  {
    funcion: "select",
    tipo: "listas",
  },
  function(respuesta){
    $("#cuerpo").append(respuesta);
    $("#nuevaLista").hide();
  });
}

function php_lista_crear(nombre) {
  $.post("oad/funciones_oad.php",
  {
    funcion: "create",
    donde: "listas",
    nombre: nombre,
    categoria: 1,
    usuario: 1,
  },
  function(respuesta){
    $("#cuerpo").empty();
    $("#cuerpo").append(respuesta);
    $("#nuevaLista").hide();
  });
}

function php_borrar(elemento) {
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
