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
            document.getElementById("loadData").innerHTML = data;
        })
        .catch(error => {
            msgError('Ocurrio un error! ' + error);
        });
}

//funcion para abrir modal agregar docente
function abrirModalAgregar(w) {
    var modal = document.getElementById('modalAgregarCarrera');
    document.getElementById('contenedorAgregarCarrera').style.display = "flex";
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
    var modal = document.getElementById('modalAgregarCarrera');
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
        document.getElementById('contenedorAgregarCarrera').style.display = "none";
    }, 100);
    document.getElementById("agregarForm").reset();
    document.getElementById('nombreError').style.display = 'none';
    document.getElementById('colorError').style.display = 'none';

}

// funcion para validar campos
function validarCampo(valor, idError) {
    document.getElementById(idError).style.display = valor.trim() === '' ? 'block' : 'none';
}
//funcion para agregar docente
document.getElementById("agregarForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Evita que se recargue la página
    var nom = document.getElementById('nombreForm').value;
    var color = document.getElementById('hexInput').value;
    if (nom == '' || color == '') {
        validarCampo(nom, 'nombreError');
        validarCampo(color, 'colorError');
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
                    msgConfirmacion('La carrera se agregó correctamente!');
                } else {
                    msgError(data);
                }
            })
            .catch(error => msgError('Ocurrio un error! ' + error));
    }
});


//funcion para modal editar docente
function abrirModalEditar(w, id, nombre, colorH) {
    var modal = document.getElementById('modalEditarCarrera');
    document.getElementById('contenedorEditarCarrera').style.display = "flex";
    document.getElementById('idF').value = id;
    document.getElementById('nombreF').value = nombre;
    applyColor1(colorH);

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
    var modal = document.getElementById('modalEditarCarrera');
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
        document.getElementById('contenedorEditarCarrera').style.display = "none";
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
                msgConfirmacion('La carrera se edito correctamente!');
                cerrarModalEditar();

            } else {
                msgError(data);
            }
        })
        .catch(error => msgError('Ocurrio un error! ' + error));

});


//funcion para modal eliminar carrera
function abrirModalEliminar(w, id) {
    var modal = document.getElementById('modalEliminarCarrera');
    document.getElementById('contenedorEliminarCarrera').style.display = "flex";
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

function eliminarCarrera(id) {
     // codigo para la peticion fetch
     fetch("fetchEliminar.php?id=" + id)
         .then(response => response.text())
         .then(data => {
             if (data == 'ok') {
                 listar('');
                 cerrarModalEliminar();
                 msgConfirmacion('La carrera se elimino correctamente! ');
             } else {
                 msgError('No se eliminó el docente! ');
             }
         })
         .catch(error => {
             msgError('Ocurrio un error! ' + error);
         });
 }
 // cuando se presiona el boton de confirmar eliminacion se ejecuta la funcion eliminar Carrera
 document.getElementById('btnEliminarCarrera').addEventListener('click', (event) => {
     eliminarCarrera(document.getElementById('inputId').value)
 });

function cerrarModalEliminar() {
    var modal = document.getElementById('modalEliminarCarrera');
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
        document.getElementById('contenedorEliminarCarrera').style.display = "none";
    }, 100);
}

// aplicar valor inicial
applyColor(color.value.toUpperCase());

//al cargar la pagina se ejecuta la funcion
window.onload = listar('');