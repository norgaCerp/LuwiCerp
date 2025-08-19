
function cargarSalonario(idDia, idSemestre) {
    $('.semestreTab').removeClass('semestreTabActive');
    $('#s'+idSemestre).addClass('semestreTabActive');
    $('#valSemestre').val(idSemestre);
    $('#inputDay').val(idDia);
    $('.dayMenu').removeClass('dayActive');
    $('#' + idDia).addClass('dayActive');
    $('#cargarDiasBox').load('listarDias.php?dia=' + idDia +'&&semestre='+ idSemestre);
}

// funciones para abrir y cerrar los modal 
function openModalForm(url) {
    $('body').css('overflow', 'hidden');
    $("#modalDate").load(url);
    $("#modalDateBox").fadeIn("fast");
    $('#modalDate').css('marginTop', '0');
}
function closeModalForm() {
    $('body').css('overflow', 'auto');
    $('#modalDate').css('marginTop', '-100px');
    $("#modalDate").html('');
    $("#modalDateBox").fadeOut("fast");
}



// funcion ready para ejecutar funciones al cargar el body
$(document).ready(function () {
    // poner un if para elegir el dia de la semana tomada con date y lo mismo para semestre
    cargarSalonario('lunes', 1); 
    //openModalForm('agregarReserva.php');
    
});