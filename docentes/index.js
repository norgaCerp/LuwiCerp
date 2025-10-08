//utiliza el evento keyup para mandar como parametro lo que se ingresa en la caja de buscar
const inputSearch = document.getElementById('inputBuscar');
inputSearch.addEventListener('keyup', (event) => {
    listar(inputSearch.value);
});

//funcion para listar los docentes
function listar(search) {
    fetch("listar.php?search=" + search)
        .then(response => response.text())
        .then(data => {
            document.getElementById("contenedorData").innerHTML = data;
        })
        .catch(error => {
            msgError('Ocurrio un error! ' + error);
        });
}

//funcion para validar el documento
function validarCI(ci) {
    // Eliminar puntos o guiones si los tiene
    ci = ci.replace(/\D/g, "");

    // Debe tener entre 7 y 8 dígitos
    if (ci.length < 7 || ci.length > 8) return false;

    // Si tiene 7 dígitos, agregamos un 0 delante
    ci = ci.padStart(8, "0");

    // Pesos definidos
    const pesos = [2, 9, 8, 7, 6, 3, 4];
    const digitos = ci.split("").map(Number);

    let suma = 0;
    for (let i = 0; i < 7; i++) {
        suma += digitos[i] * pesos[i];
    }

    const verificador = (10 - (suma % 10)) % 10;

    return verificador === digitos[7];
}

//funcion para abrir modal agregar docente
function abrirModalAgregar(w) {
    var modal = document.getElementById('modalAgregarDocente');
    document.getElementById('contenedorAgregarDocente').style.display = "flex";
    modal.style.width = w;
    modal.animate([{
        transform: 'scale(0.3)',
        opacity: 0
    }, {
        transform: 'scale(1)',
        opacity: 1
    }], {
        duration: 100,
        easing: 'ease-in-out',
        fill: 'forwards'
    });
}

function cerrarModalAgregar() {
    var modal = document.getElementById('modalAgregarDocente');
    modal.animate([{
        transform: 'scale(1)',
        opacity: 1
    }, {
        transform: 'scale(0.3)',
        opacity: 0
    }], {
        duration: 100,
        easing: 'ease-in-out',
        fill: 'forwards'
    });
    setTimeout(() => {
        document.getElementById('contenedorAgregarDocente').style.display = "none";
    }, 100);
    document.getElementById("agregarForm").reset();
    document.getElementById('nombreError').style.display = 'none';
    document.getElementById('apellidoError').style.display = 'none';
    document.getElementById('documentoError').style.display = 'none';
    document.getElementById('emailError').style.display = 'none';
    document.getElementById('celularError').style.display = 'none';
}

// funcion para validar campos
function validarCampo(valor, idError) {
    document.getElementById(idError).style.display = valor.trim() === '' ? 'block' : 'none';
}
//funcion para agregar docente
document.getElementById("agregarForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Evita que se recargue la página
    var nom = document.getElementById('nombreForm').value;
    var ape = document.getElementById('apellidoForm').value;
    var doc = document.getElementById('documentoForm').value;
    var mail = document.getElementById('emailForm').value;
    var cel = document.getElementById('celularForm').value;
    if (nom == '' || ape == '' || doc == '' || mail == '' || cel == '') {
        validarCampo(nom, 'nombreError');
        validarCampo(ape, 'apellidoError');
        validarCampo(doc, 'documentoError');
        validarCampo(mail, 'emailError');
        validarCampo(cel, 'celularError');
    }else if(validarCI(doc)==false){
        alert("El documento no es válido!!!");
    } else {
        // Capturamos los datos del formulario
        const datos = new FormData(this);
        // Enviamos con fetch
        fetch("fetchAgregar.php", {
            method: "POST",
            body: datos
        })
            .then(res => res.text()) // puedes usar .json() si tu PHP devuelve JSON
            .then(data => {
                if (data == 'ok') {
                    //document.getElementById("respuesta").innerHTML = data;
                    listar('');
                    cerrarModalAgregar();
                    msgConfirmacion('El docente se agregó correctamente!');
                } else {
                    msgError(data);
                }
            })
            .catch(error => msgError('Ocurrio un error! ' + error));
    }
});

//funcion para modal editar docente
function abrirModalEditar(w, id, nombre, apellido, documento, email, celular, observaciones) {
    var modal = document.getElementById('modalEditarDocente');
    document.getElementById('contenedorEditarDocente').style.display = "flex";
    document.getElementById('idF').value = id;
    document.getElementById('nombreF').value = nombre;
    document.getElementById('apellidoF').value = apellido;
    document.getElementById('documentoF').value = documento;
    document.getElementById('emailF').value = email;
    document.getElementById('celularF').value = celular;
    document.getElementById('obsF').value = observaciones;
    modal.style.width = w;
    modal.animate([{
        transform: 'scale(0.3)',
        opacity: 0
    }, {
        transform: 'scale(1)',
        opacity: 1
    }], {
        duration: 100,
        easing: 'ease-in-out',
        fill: 'forwards'
    });
}

function cerrarModalEditar() {
    var modal = document.getElementById('modalEditarDocente');
    modal.animate([{
        transform: 'scale(1)',
        opacity: 1
    }, {
        transform: 'scale(0.3)',
        opacity: 0
    }], {
        duration: 100,
        easing: 'ease-in-out',
        fill: 'forwards'
    });
    setTimeout(() => {
        document.getElementById('contenedorEditarDocente').style.display = "none";
    }, 100);
}

//funcion para editar docente
document.getElementById("editarForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Evita que se recargue la página

    // Capturamos los datos del formulario
    const datos = new FormData(this);

    // Enviamos con fetch
    fetch("fetchEditar.php", {
        method: "POST",
        body: datos
    })
        .then(res => res.text()) // puedes usar .json() si tu PHP devuelve JSON
        .then(data => {
            if (data == 'ok') {
                //document.getElementById("respuesta").innerHTML = data;
                listar('');
                document.getElementById("editarForm").reset();
                msgConfirmacion('El docente se edito correctamente!');
                cerrarModalEditar();

            } else {
                msgError(data);
            }
        })
        .catch(error => msgError('Ocurrio un error! ' + error));

});

//funcion para modal eliminar docente
function abrirModalEliminar(w, id) {
    var modal = document.getElementById('modalEliminarDocente');
    document.getElementById('contenedorEliminarDocente').style.display = "flex";
    modal.style.width = w;
    modal.animate([{
        transform: 'scale(0.3)',
        opacity: 0
    }, {
        transform: 'scale(1)',
        opacity: 1
    }], {
        duration: 100,
        easing: 'ease-in-out',
        fill: 'forwards'
    });
    document.getElementById('inputId').value = id;
}

function eliminarDocente(id) {
    // codigo para la peticion fetch
    fetch("fetchEliminar.php?id=" + id)
        .then(response => response.text())
        .then(data => {
            if (data == 'ok') {
                listar('');
                cerrarModalEliminar();
                msgConfirmacion('El docente se elimino correctamente! ');
            } else {
                msgError('No se eliminó el docente! ');
            }
        })
        .catch(error => {
            msgError('Ocurrio un error! ' + error);
        });
}
// cuando se presiona el boton de confirmar eliminacion se ejecuta la funcion eliminarDocente
document.getElementById('btnEliminar').addEventListener('click', (event) => {
    eliminarDocente(document.getElementById('inputId').value)
});

function cerrarModalEliminar() {
    var modal = document.getElementById('modalEliminarDocente');
    modal.animate([{
        transform: 'scale(1)',
        opacity: 1
    }, {
        transform: 'scale(0.3)',
        opacity: 0
    }], {
        duration: 100,
        easing: 'ease-in-out',
        fill: 'forwards'
    });
    setTimeout(() => {
        document.getElementById('contenedorEliminarDocente').style.display = "none";
    }, 100);
}


//al cargar la pagina se ejecuta la funcion
window.onload = listar('');