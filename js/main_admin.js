//Main de usuarios corrientes

//Seleccionar entre ver todas las tareas o ver las incompletas
  $("#nuevaLista").hide();

function nueva_lista() {
  $("#nuevaLista").show();
  $("#bt_nuevaLista").hide();
}

function borrar_lista(elemento) {
  console.log("#idlista_" + elemento.name);
  $("#idlista_" + elemento.name).hide();
}
