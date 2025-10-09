//utiliza el evento keyup para mandar como parametro lo que se ingresa en la caja de buscar
const inputSearch = document.getElementById('inputBuscar');
inputSearch.addEventListener('keyup', (event) => {
    listar(inputSearch.value);
});

//funcion para listar los asignatura
function listar(search) {
    fetch("listar.php?search=" + search)
        .then(response => response.text())
        .then(data => {
            document.getElementById("loadData").innerHTML = data;
        })
        .catch(error => {
            msgError('Ocurrio un error! ' + error);
        });
}



//funcion para abrir modal agregar asignatura
function abrirModalAgregar(w) {
    var modal = document.getElementById('modalAgregarAsignatura');
    document.getElementById('contenedorAgregarAsignatura').style.display = "flex";
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
    var modal = document.getElementById('modalAgregarAsignatura');
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
        document.getElementById('contenedorAgregarAsignatura').style.display = "none";
    }, 100);
    document.getElementById("agregarForm").reset();
    document.getElementById('nombreError').style.display = 'none';
    document.getElementById('anioError').style.display = 'none';
    document.getElementById('profError').style.display = 'none';
    document.getElementById('pDocente').innerText = 'Seleccione un docente';
}

// funcion para validar campos
function validarCampo(valor, idError) {
    document.getElementById(idError).style.display = valor.trim() === '' ? 'block' : 'none';
}
//funcion para agregar asignatura
document.getElementById("agregarForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Evita que se recargue la página
    var nom = document.getElementById('nombreForm').value;
    var anio = document.getElementById('selectAnio').value;
    var prof = document.getElementById('idDocente').value;

    if (nom == '' || anio == '' || prof == '') {
        validarCampo(nom, 'nombreError');
        validarCampo(anio, 'anioError');
        validarCampo(prof, 'profError');

    } else if (!document.querySelector('input[type="checkbox"]:checked')) {
        alert("No hay ningún checkbox seleccionado");
    } else {
        // Capturamos los datos del formulario
        const datos = new FormData(this);
        // Enviamos con fetch
        fetch("fetchAgregar.php", {
            method: "POST",
            body: datos
        })
            .then(res => res.text())
            .then(data => {
                if (data == 'ok') {
                    listar('');
                    cerrarModalAgregar();
                    msgConfirmacion('La asignatura se agregó correctamente!');
                } else {
                    msgError(data);
                }
            })
            .catch(error => msgError('Ocurrio un error! ' + error));
    }
});

//funcion para modal editar asignatura
function abrirModalEditar(w, id, nombre, idProf, nomProf, anio, carreraId) {
    var modal = document.getElementById('modalEditarAsignatura');
    document.getElementById('contenedorEditarAsignatura').style.display = "flex";
    document.getElementById('idF').value = id;
    document.getElementById('nombreF').value = nombre;
    document.getElementById('selectAnioF').value = anio;
    document.getElementById('accion').value = 'editar';
    docenteSeleccionado(idProf, nomProf);

    let ids = carreraId.split(",");
    document.querySelectorAll("input[type='checkbox']").forEach(chk => {
        if (ids.includes(chk.value)) {
            chk.checked = true; // marcar si está en la lista
        } else {
            chk.checked = false; // desmarcar si no está
        }
    });

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
    var modal = document.getElementById('modalEditarAsignatura');
    document.querySelectorAll("input[type='checkbox']").forEach(chk => {
        chk.checked = false;
    });
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
        document.getElementById('contenedorEditarAsignatura').style.display = "none";
    }, 100);
    document.getElementById("editarForm").reset();
    document.getElementById('nombreEr').style.display = 'none';
    document.getElementById('anioEr').style.display = 'none';
    document.getElementById('profEr').style.display = 'none';
}

//funcion para editar asignaturas
document.getElementById("editarForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Evita que se recargue la página
    var nom = document.getElementById('nombreF').value;
    var anio = document.getElementById('selectAnioF').value;
    var prof = document.getElementById('idDocenteF').value;

    if (nom == '' || anio == '' || prof == '') {
        validarCampo(nom, 'nombreEr');
        validarCampo(anio, 'anioEr');
        validarCampo(prof, 'profEr');

    } else if (!document.querySelector('input[type="checkbox"]:checked')) {
        alert("No hay ningún checkbox seleccionado");
    } else {
        // Capturamos los datos del formulario
        const datos = new FormData(this);

        // Enviamos con fetch
        fetch("fetchEditar.php", {
            method: "POST",
            body: datos
        })
            .then(res => res.text())
            .then(data => {
                if (data == 'ok') {
                    listar('');
                    document.getElementById("editarForm").reset();
                    msgConfirmacion('La asignatura se editó correctamente!');
                    cerrarModalEditar();

                } else {
                    msgError(data);
                }
            })
            .catch(error => msgError('Ocurrio un error! ' + error));
    }
});

//funcion para modal eliminar asignatura
function abrirModalEliminar(w, id) {
    var modal = document.getElementById('modalEliminarAsignatura');
    document.getElementById('contenedorEliminarAsignatura').style.display = "flex";
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

function eliminarAsignatura(id) {
    // codigo para la peticion fetch
    fetch("fetchEliminar.php?id=" + id)
        .then(response => response.text())
        .then(data => {
            if (data == 'ok') {
                listar('');
                cerrarModalEliminar();
                msgConfirmacion('La asignatura se eliminó correctamente! ');
            } else {
                msgError('No se eliminó la asignatura! ');
            }
        })
        .catch(error => {
            msgError('Ocurrio un error! ' + error);
        });
}
// cuando se presiona el boton de confirmar eliminacion se ejecuta la funcion eliminar asignatura
document.getElementById('btnEliminar').addEventListener('click', (event) => {
    eliminarAsignatura(document.getElementById('inputId').value)
});

function cerrarModalEliminar() {
    var modal = document.getElementById('modalEliminarAsignatura');
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
        document.getElementById('contenedorEliminarAsignatura').style.display = "none";
    }, 100);
}

const inputDocente = document.getElementById("inputBuscarDoc");
const docentes = document.querySelectorAll(".btnDoc");

function openModalBuscarDocente(w, accion) {
    document.getElementById('accion').value = accion;
    var modal = document.getElementById('modalBuscarProf');
    document.getElementById('contenedorBuscarProf').style.display = "flex";
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

function closeModalBuscarDocente() {
    var modal = document.getElementById('modalBuscarProf');
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
        document.getElementById('contenedorBuscarProf').style.display = "none";
    }, 100);
    document.getElementById("inputBuscarDoc").value = '';
    docentes.forEach(doc => {
        doc.style.display = "block";
    });
}
function docenteSeleccionado(id, nombre) {
    if (document.getElementById('accion').value == 'agregar') {
        document.getElementById('pDocente').innerText = 'Docente: ' + nombre;
        document.getElementById('idDocente').value = id;
    } else {
        document.getElementById('pDocenteF').innerText = 'Docente: ' + nombre;
        document.getElementById('idDocenteF').value = id;
    }

    closeModalBuscarDocente();
}




inputDocente.addEventListener("input", () => {
    const filtro = inputDocente.value.toLowerCase().trim();

    docentes.forEach(doc => {
        const nombre = doc.textContent.toLowerCase();

        if (nombre.includes(filtro)) {
            doc.style.display = "block";
        } else {
            doc.style.display = "none";
        }
    });
});

//al cargar la pagina se ejecuta la funcion
window.onload = listar('');