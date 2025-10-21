
function cargarSalonario(idDia, idSemestre) {
    selectTabDias(idDia);
    selectTabSem(idSemestre);

    fetch("listar.php?dia=" + idDia + "&&semestre=" + idSemestre)
        .then(response => response.text())
        .then(data => {
            document.getElementById("contenedorSalonario").innerHTML = data;
        })
        .catch(error => {
            msgError('Ocurrio un error! ' + error);
        });

}

function selectTabDias(id) {
    let items = document.querySelectorAll(".itemDias");
    items.forEach(el => el.classList.remove("itemDiasActive"));
    let activo = document.getElementById(id);
    if (activo) {
        activo.classList.add("itemDiasActive");
    }
    document.getElementById('inputDias').value = id;
}

function selectTabSem(id) {
    let items = document.querySelectorAll(".itemSem");
    items.forEach(el => el.classList.remove("itemSemestreActive"));
    let activo = document.getElementById(id);
    if (activo) {
        activo.classList.add("itemSemestreActive");
    }
    document.getElementById('inputSem').value = id;
}
// funcion para validar campos
function validarCampo(valor, idError) {
    document.getElementById(idError).style.display = valor.trim() === '' ? 'block' : 'none';
}


//funcion para abrir modal agregar asignatura
function abrirModalAgregar(w, dia, semestre, orden, salon) {
    document.getElementById('diaForm').value = dia;
    document.getElementById('semestreForm').value = semestre;
    document.getElementById('ordenForm').value = orden;
    document.getElementById('salonForm').value = salon;
    var modal = document.getElementById('modalAgregarAsignacion');
    document.getElementById('contenedorAgregarAsignacion').style.display = "flex";
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
    var modal = document.getElementById('modalAgregarAsignacion');
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
        document.getElementById('contenedorAgregarAsignacion').style.display = "none";
    }, 100);
    document.getElementById("agregarForm").reset();
    document.getElementById('asigEr').style.display = 'none';
    document.querySelectorAll(".itemAsignas").forEach(doc => {
        doc.style.display = "block";
        doc.classList.remove("itemAsignasSelect");
    });
    document.getElementById('buscarAsignas').value = '';
}

//funcion para verificar si el docente esta asignado a una franja horaria
function verificarFranja(orden, nombre) {
  const nomProf = [...document.querySelectorAll('.nomP' + orden)];

  // Devuelve true si ninguno coincide
  const ningunoCoincide = nomProf.every(p => p.textContent !== nombre);

  return ningunoCoincide;
}


//funcion para agregar asignatura
document.getElementById("agregarForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Evita que se recargue la página
    var asig = document.getElementById('inputAsignas').value;

    if (verificarFranja(document.getElementById('ordenForm').value, document.getElementById('nomProfV').value) === true) {
        if (asig == '') {
            validarCampo(asig, 'asigEr');
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

                        cargarSalonario(document.getElementById('inputDias').value, document.getElementById('inputSem').value);
                        cerrarModalAgregar();
                        msgConfirmacion('La asignación se agregó correctamente!');
                    } else {
                        msgError(data);
                    }
                })
                .catch(error => msgError('Ocurrio un error! ' + error));
        }
    } else {
        alert('Docente ya asignado a esta franja horaria!!!');
    }
});

//funcion para modal editar asignatura
function abrirModalEditar(w, asignatura, dia, semestre, orden, salon, id, nombre) {
    document.getElementById('diaFormE').value = dia;
    document.getElementById('semestreFormE').value = semestre;
    document.getElementById('ordenFormE').value = orden;
    document.getElementById('salonFormE').value = salon;
    document.getElementById('nomProfE').value=nombre;
    var modal = document.getElementById('modalEditarAsignacion');
    document.getElementById('contenedorEditarAsignacion').style.display = "flex";
    document.getElementById('inputAsignasE').value = asignatura;
    document.querySelectorAll(".itemAsignas").forEach(doc => {
        doc.classList.remove("itemAsignasSelect");
    });
    const divInterno = document.getElementById('itE' + asignatura);
    divInterno.scrollIntoView({ behavior: "smooth", block: "center" });
    document.getElementById('itE' + asignatura).classList.add("itemAsignasSelect");
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
    document.getElementById('idF').value = id;
}

function cerrarModalEditar() {
    var modal = document.getElementById('modalEditarAsignacion');

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
        document.getElementById('contenedorEditarAsignacion').style.display = "none";
    }, 100);
    document.getElementById("editarForm").reset();
    document.getElementById('asigErEditar').style.display = 'none';
    document.querySelectorAll(".itemAsignas").forEach(doc => {
        doc.style.display = "block";
        doc.classList.remove("itemAsignasSelect");
    });
}

//funcion para editar asignatura
document.getElementById("editarForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Evita que se recargue la página
    var asig = document.getElementById('inputAsignasE').value;

    if (verificarFranja(document.getElementById('ordenFormE').value, document.getElementById('nomProfE').value) === true) {
        if (asig == '') {
            validarCampo(asig, 'asigErEditar');
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

                        cargarSalonario(document.getElementById('inputDias').value, document.getElementById('inputSem').value);
                        cerrarModalEditar();
                        msgConfirmacion('La asignación se edito correctamente!');
                    } else {
                        msgError(data);
                    }
                })
                .catch(error => msgError('Ocurrio un error! ' + error));
        }
    }else{
        alert('Docente ya asignado a esta franja horaria!!!');
    }
});

//funcion para modal eliminar asignacion
function abrirModalEliminar(w, id) {
    var modal = document.getElementById('modalEliminarAsignacion');
    document.getElementById('contenedorEliminarAsignacion').style.display = "flex";
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

function eliminarSalonario(id) {
    // codigo para la peticion fetch
    fetch("fetchEliminar.php?id=" + id)
        .then(response => response.text())
        .then(data => {
            if (data == 'ok') {
                cargarSalonario(document.getElementById('inputDias').value, document.getElementById('inputSem').value);
                cerrarModalEliminar();
                cerrarModalEditar();
                msgConfirmacion('La asignación se eliminó correctamente! ');
            } else {
                msgError('No se eliminó la asignacion! ');
            }
        })
        .catch(error => {
            msgError('Ocurrio un error! ' + error);
        });
}
// cuando se presiona el boton de confirmar eliminacion se ejecuta la funcion eliminarDocente
document.getElementById('btnEliminar').addEventListener('click', (event) => {
    eliminarSalonario(document.getElementById('inputId').value)
});

function cerrarModalEliminar() {
    var modal = document.getElementById('modalEliminarAsignacion');
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
        document.getElementById('contenedorEliminarAsignacion').style.display = "none";
    }, 100);
}

document.getElementById("btnEliminarAsig").addEventListener("click", function (e) {
    e.preventDefault(); // Evita que se recargue la página
    abrirModalEliminar('400px', document.getElementById("idF").value);
});

function selectAsignas(id, nom) {
    document.getElementById('inputAsignas').value = id;
    document.getElementById('nomProfV').value = nom;
    let items = document.querySelectorAll(".itemAsignas");
    items.forEach(el => el.classList.remove("itemAsignasSelect"));
    let activo = document.getElementById('it' + id);
    if (activo) {
        activo.classList.add("itemAsignasSelect");
    }
}
function selectAsignasE(id, nom) {
    document.getElementById('inputAsignasE').value = id;
    document.getElementById('nomProfE').value = nom;
    let items = document.querySelectorAll(".itemAsignas");
    items.forEach(el => el.classList.remove("itemAsignasSelect"));
    let activo = document.getElementById('itE' + id);
    if (activo) {
        activo.classList.add("itemAsignasSelect");
    }
}

const buscarAsignas = document.getElementById("buscarAsignas");
const asignas = document.querySelectorAll(".itemAsignas");
buscarAsignas.addEventListener("input", () => {
    const filtro = buscarAsignas.value.toLowerCase().trim();

    asignas.forEach(doc => {
        const nombre = doc.textContent.toLowerCase();

        if (nombre.includes(filtro)) {
            doc.style.display = "block";
        } else {
            doc.style.display = "none";
        }
    });
});

const buscarAsignasE = document.getElementById("buscarAsignasE");
const asignasE = document.querySelectorAll(".itemAsignas");
buscarAsignasE.addEventListener("input", () => {
    const filtro = buscarAsignasE.value.toLowerCase().trim();

    asignasE.forEach(doc => {
        const nombre = doc.textContent.toLowerCase();

        if (nombre.includes(filtro)) {
            doc.style.display = "block";
        } else {
            doc.style.display = "none";
        }
    });
});

let dias = ["domingo", "lunes", "martes", "miercoles", "jueves", "viernes", "sabado"];
let hoy = new Date();
window.onload = cargarSalonario(dias[hoy.getDay()], 's1');