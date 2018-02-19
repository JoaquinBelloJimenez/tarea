//Código de la web submain

//Escoger entre Listas y Tareas
$(document).ready(function() {

  $(".opcion").click(function(){
    opcion_seleccionada(this);
  });

}); //--ready



function opcion_seleccionada(opcion){
  console.log(opcion.name);
  $("#cuerpo").empty();
  //Mandar la opción a php usando ajax
  $.post("submain.php",
    {
      opcion: opcion.name,
    },
    function(html){
      $("#cuerpo").append(html);
    });
}
