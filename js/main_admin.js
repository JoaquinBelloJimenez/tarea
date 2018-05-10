//Main de usuarios corrientes

  //Ocultar la nueva lista
  $("#nuevaLista").hide();

function nueva_lista() {
  $("#nuevaLista").show();
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


function php_borrar(elemento) {
  //Sistema ajax para eliminar elemento
  $.post("servicios/funciones.php",
    {
      id: elemento.name,
      desde: "listas",
      donde: "id_lista ="+ elemento.name,
      funcion: "delete",
    },
    function(){
      console.log("eliminado!");
      /*$("#idlista_" + elemento.name).fadeOut("slow", function(){
        $("#idlista_" + elemento.name).remove();
      });*/
    });
}