
function cargarSalonario(id) {
    $('.dayMenu').removeClass('dayActive');
    $('#' + id).addClass('dayActive');
    $('#cargarDiasBox').load('listarDias.php?dia=' + id);
}


// funcion ready para ejecutar funciones al cargar el body
$(document).ready(function () {
    cargarSalonario('lunes'); 
});