const formulario = document.getElementById("loginForm");

formulario.addEventListener("submit", function (event) {
    event.preventDefault();
    let usuario = document.getElementById('user').value.trim();
    let password = document.getElementById('pwd').value.trim();
    let valido = true;
    if (usuario === "") {
        document.getElementById('errorUser').style.display = "block";
        valido = false;
    } else {
        document.getElementById('errorUser').style.display = "none";
    }

    if (password === "") {
        document.getElementById('errorPwd').style.display = "block";
        valido = false;
    } else {
        document.getElementById('errorPwd').style.display = "none";
    }

    if (valido) {
        formulario.submit();
    }
});