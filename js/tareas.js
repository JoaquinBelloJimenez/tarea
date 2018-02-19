//Encargado de mandar datos a crud.php

//Escoger entre Editar, eliminar, crear
$(document).ready(function() {

  //Abrir diálogo de crear
  $(".crear").click(function(){
    dialog_crear();
  });

  //Abrir diálogo de editar
  $(".editar").click(function(){
    dialog_editar(this.name);
  });

  //Abrir diálogo de eliminar
  $(".eliminar").click(function(){
    dialog_eliminar(this);
  });

}); //--document ready

//Contenido dialog crear
function dialog_crear(){
  $( "#dialog_formulario" ).dialog({
    modal: true,
    width: 350,
    close:function(){$("#form_crear").trigger("reset")}, //limpiar formualrio
    buttons: [
   {
     text: "Crear",
     click: function() {

       //Comprobar si los campos están rellenos
       var rellenos = true;
       rellenos = relleno($("#nombre"));
       rellenos = relleno($("#desc"));
       rellenos = relleno($("#reco"));
       if (rellenos) {

       //obtener los datos del formulario
      var datos = $("#formulario").serializeArray();
      $.each(datos, function(i, campo){
        switch (i) {
          case i = 0: nombre = campo.value; //Variable nombre
          case i = 1: desc = campo.value;   //Variable desc
          case i = 2: reco = campo.value;   //Variable reco
          break;
        }
        });
      //Llamar la función crear enviando los datos obtenidos
      crear(nombre, desc, reco);
       $("#form_crear").trigger("reset");
       $( this ).dialog( "close" );
     } else{
       $("#rojoCrear").removeClass("oculto");
     }
    }
  }] //--buttons
  });
} //--Dialog crear

//Contenido dialog editar
function dialog_editar(id){
  //Obtener los datos de la base
    obtener_editar(id);
    //Mostrar el formulario
  $( "#dialog_formulario" ).dialog({
    modal: true,
    width: 350,
    buttons: [
   {
     text: "Editar",
     click: function() {
       //Comprobar si los campos están rellenos
       var rellenos = true;
       rellenos = relleno($("#nombre"));
       rellenos = relleno($("#desc"));
       rellenos = relleno($("#reco"));
       if (rellenos) {

       //obtener los datos del formulario
      var datos = $("#formulario").serializeArray();
      $.each(datos, function(i, campo){
        switch (i) {
          case i = 0: nombre = campo.value; //Variable nombre
          case i = 1: desc = campo.value;   //Variable desc
          case i = 2: reco = campo.value;   //Variable reco
          break;
        }
        });
      //Llamar la función crear enviando los datos obtenidos
      enviar_editar(id,nombre, desc, reco);
       $("#form_crear").trigger("reset");
       $( this ).dialog( "close" );
     } else{
       $("#rojoCrear").removeClass("oculto");
     }
    }
  }] //--buttons
  });
}



//Contenido dialog eliminar
function dialog_eliminar(elemento){
  $( "#dialog_eliminar" ).dialog({
    modal: true,
    width: 350,
    buttons: [
   {
     text: "Eliminar",
     click: function() {
       eliminar(elemento);
       $( this ).dialog( "close" );
     }
   }]
  });
}


//Enviar datos a php
  //Para crear
  function crear(nombre, desc, reco){
    //Sistema ajax para crear elemento
    $.post("crud.php",
      {
        nombre: nombre,
        desc: desc,
        reco: reco,
        tipo: "tareas",
        funcion: "crear",
      },
      function(){
        location.reload();
        //$("#contenido")load('../codigo/listas.php');
      });
  }

  function obtener_editar(id){
  //Sistema ajax para eliminar elemento
  $.post("crud.php",
    {
      id: id,
      tipo: "tareas",
      funcion: "obtener_editar",
    },
    function(datos){
      datosarray = JSON.parse(datos);
      $("#nombre").val(datosarray["nombre"]);
      $("#desc").val(datosarray["descripcion"]);
      $("#reco").val(datosarray["premio"]);
    })
};

//Para enviar los datos editados
function enviar_editar(id,nombre, desc, reco){
  //Sistema ajax para crear elemento
  $.post("crud.php",
    {
      id:id,
      nombre: nombre,
      desc: desc,
      reco: reco,
      tipo: "tareas",
      funcion: "enviar_editar",
    },
    function(){
      location.reload();
      //$("#contenido")load('../codigo/listas.php');
    });
}


 //Para eliminar
function eliminar(elemento){
  //Sistema ajax para eliminar elemento
  $.post("crud.php",
    {
      id: elemento.name,
      tipo: "tareas",
      funcion: "eliminar",
    },
    function(){
      location.reload();
      //$("#contenido")load('../codigo/listas.php');
    });
}

//Comprobar si los campos están rellenos
function relleno(campo){
  if (campo.val().length < 4) {
    return false;
  }
  return true;
}
