// funcion para mostrar mensaje de confirmacion de eliminacion
function msgConfirmacion(msgTextData) {
    var msg = document.getElementById('msgConfirmacion');
    
    msg.classList.remove("animarOut");
    msg.classList.add("animarIn");
    msg.style.display = "flex";
    document.getElementById('msgText').textContent = msgTextData;
    // Después de 3 segundos, activa animación de salida
    setTimeout(() => {
        msg.classList.remove("animarIn");
        msg.classList.add("animarOut");

        // Cuando termine la animación de salida, ocultar con display:none
        msg.addEventListener("animationend", function handler() {
            if (msg.classList.contains("animarOut")) {
                msg.style.display = "none";
            }
            msg.removeEventListener("animationend", handler);
        });
    }, 1500);
}

// funcion para mostrar mensaje de confirmacion de eliminacion
function msgError(msgTextData) {
    const msg = document.getElementById('msgError');
    document.getElementById('msgTextError').textContent = msgTextData;
    msg.classList.remove("animarOut");
    msg.classList.add("animarIn");
    msg.style.display = "flex";
    // Después de 3 segundos, activar animación de salida
    setTimeout(() => {
        msg.classList.remove("animarIn");
        msg.classList.add("animarOut");

        // Cuando termine la animación de salida, ocultar con display:none
        msg.addEventListener("animationend", function handler() {
            if (msg.classList.contains("animarOut")) {
                msg.style.display = "none";
            }
            msg.removeEventListener("animationend", handler);
        });
    }, 4500);
}