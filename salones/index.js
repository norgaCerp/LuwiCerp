//utiliza el evento keyup para mandar como parametro lo que se ingresa en la caja de buscar
const inputSearch = document.getElementById('inputBuscar');
inputSearch.addEventListener('keyup', (event) => {
    listar(inputSearch.value)
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

//funcion para abrir modal agregar docente
function abrirModalAgregar(w) {
    var modal = document.getElementById('modalAgregarSalon');
    document.getElementById('contenedorAgregarSalon').style.display = "flex";
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
    var modal = document.getElementById('modalAgregarSalon');
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
        document.getElementById('contenedorAgregarSalon').style.display = "none";
    }, 100);
    document.getElementById("agregarForm").reset();
    document.getElementById('nombreError').style.display = 'none';
    document.getElementById('pisoError').style.display = 'none';
    document.getElementById('capacidadError').style.display = 'none';
    document.getElementById('televisorError').style.display = 'none';
    document.getElementById('aireError').style.display = 'none';
}

// funcion para validar campos
function validarCampo(valor, idError) {
    document.getElementById(idError).style.display = valor.trim() === '' ? 'block' : 'none';
}
//funcion para agregar Salon
document.getElementById("agregarForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Evita que se recargue la página
    var nom = document.getElementById('nombreForm').value;
    var piso = document.getElementById('selectPiso').value;
    var capacidad = document.getElementById('selectCapacidad').value;
    var televisor = document.getElementById('selectTelevisor').value;
    var aire = document.getElementById('selectAire').value;
    if (nom == '' || piso == '' || capacidad == '' || televisor == '' || aire == '') {
        validarCampo(nom, 'nombreError');
        validarCampo(piso, 'pisoError');
        validarCampo(capacidad, 'capacidadError');
        validarCampo(televisor, 'televisorError');
        validarCampo(aire, 'aireError');
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
                    msgConfirmacion('El salon se agregó correctamente!');
                } else {
                    msgError(data);
                }
            })
            .catch(error => msgError('Ocurrio un error! ' + error));
    }
});

//funcion para modal editar salon
function abrirModalEditar(w, id, nombre, piso, capacidad, televisor, aire, observaciones) {
    var modal = document.getElementById('modalEditarSalon');
    document.getElementById('contenedorEditarSalon').style.display = "flex";
    document.getElementById('idF').value = id;
    document.getElementById('nombreFormF').value = nombre;
    document.getElementById('selectPisoF').value = piso;
    document.getElementById('selectCapacidadF').value = capacidad;
    document.getElementById('selectTelevisorF').value = televisor;
    document.getElementById('selectAireF').value = aire;
    document.getElementById('obsFormF').value = observaciones;
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
    var modal = document.getElementById('modalEditarSalon');
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
        document.getElementById('contenedorEditarSalon').style.display = "none";
    }, 100);
    document.getElementById("editarForm").reset();
    document.getElementById('nombreEr').style.display = 'none';
    document.getElementById('pisoEr').style.display = 'none';
    document.getElementById('capacidadEr').style.display = 'none';
    document.getElementById('televisorEr').style.display = 'none';
    document.getElementById('aireEr').style.display = 'none';
}

//funcion para editar salon
document.getElementById("editarForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Evita que se recargue la página
    var nom = document.getElementById('nombreFormF').value;
    var piso = document.getElementById('selectPisoF').value;
    var capacidad = document.getElementById('selectCapacidadF').value;
    var televisor = document.getElementById('selectTelevisorF').value;
    var aire = document.getElementById('selectAireF').value;
    if (nom == '' || piso == '' || capacidad == '' || televisor == '' || aire == '') {
        validarCampo(nom, 'nombreEr');
        validarCampo(piso, 'pisoEr');
        validarCampo(capacidad, 'capacidadEr');
        validarCampo(televisor, 'televisorEr');
        validarCampo(aire, 'aireEr');
    } else {
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
                    listar('');
                    document.getElementById("editarForm").reset();
                    msgConfirmacion('El salon se editó correctamente!');
                    cerrarModalEditar();

                } else {
                    msgError(data);
                }
            })
            .catch(error => msgError('Ocurrio un error! ' + error));
    }
});

//funcion para modal eliminar salon
function abrirModalEliminar(w, id) {
    var modal = document.getElementById('modalEliminarSalon');
    document.getElementById('contenedorEliminarSalon').style.display = "flex";
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
                msgConfirmacion('El salon se eliminó correctamente! ');
            } else {
                msgError('No se eliminó el salon! ');
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
    var modal = document.getElementById('modalEliminarSalon');
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
        document.getElementById('contenedorEliminarSalon').style.display = "none";
    }, 100);
}


//al cargar la pagina se ejecuta la funcion
window.onload = listar('');