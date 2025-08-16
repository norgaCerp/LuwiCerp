function buscar(search) {
    $('#cargaDatosDocentes').load('listar.php?search=' + search);
}
$("#search").on("keyup", function () {
    buscar($('#search').val());
});

function openModalForm(url) {
    $("#loadModalForm").load(url);
    $("#modalFormBox").fadeIn();
    $('#modalForm').css('marginTop', '0');
}
function closeModalForm() {
    $('#modalForm').css('marginTop', '-100px');
    $("#loadModalForm").html('');
    $("#modalFormBox").fadeOut();
}


$(document).ready(function () {
    buscar('');
});