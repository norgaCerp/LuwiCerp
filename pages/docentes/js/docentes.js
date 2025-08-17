// funcion para cargar en el div lo que devuelve el archivo listar.php
function buscar(search) {
    $('#cargaDatosDocentes').load('listar.php?search=' + search);
}
// evento al escribir cada caracter de la caja de texto de buscar
$("#search").on("keyup", function () {
    buscar($('#search').val());
});

// funcion para agregar nuevos docentes, tambien hace las comprobaciones de datos
function agregarDocente(directiva) {
    let nombre = $('#nombreDoc').val();
    let apellido = $('#apellidoDoc').val();
    let documento = $('#documentoDoc').val();
    let celular = $('#celularDoc').val();
    let email = $('#emailDoc').val();
    let obs = $('#obsDoc').val();
    if (nombre === '' || apellido === '' || documento === '' || celular === '' || email === '' || obs === '') {
        if (nombre === '') {
            $('#errorNombre').show();
        } else {
            $('#errorNombre').hide();
        }
        if (apellido === '') {
            $('#errorApellido').show();
        } else {
            $('#errorApellido').hide();
        }
        if (documento === '') {
            $('#errorDocumento').show();
        } else {
            $('#errorDocumento').hide();
        }
        if (celular === '') {
            $('#errorCelular').show();
        } else {
            $('#errorCelular').hide();
        }
        if (email === '') {
            $('#errorEmail').show();
        } else {
            $('#errorEmail').hide();
        }
        if (obs === '') {
            $('#errorObs').show();
        } else {
            $('#errorObs').hide();
        }
    } else {
        $.post(directiva,
            {
                nombre: nombre,
                apellido: apellido,
                documento: documento,
                celular: celular,
                email: email,
                obs: obs

            },
            function (respuesta) {
                // Aquí recibes lo que devuelve el servidor
                $('#loadModalForm').html(respuesta);
            }
        );
    }

}

// funciones para abrir y cerrar los modal 
function openModalForm(url) {
    $('body').css('overflow', 'hidden');
    $("#loadModalForm").load(url);
    $("#modalFormBox").fadeIn("fast");
    $('#modalForm').css('marginTop', '0');
    buscar('');
}
function closeModalForm() {
    $('body').css('overflow', 'auto');
    $('#modalForm').css('marginTop', '-100px');
    $("#loadModalForm").html('');
    $("#modalFormBox").fadeOut("fast");
    buscar('');
}

// funcion ready para ejecutar funciones al cargar el body
$(document).ready(function () {
    buscar('');
    //openModalForm('eliminar.php?id=1');
});