<?php
session_start();
include 'config/database.php';

if (isset($_POST["user"]) and isset($_POST["pwd"])) {
    
    $usuario = $_POST['user'] ?? '';
    $password = md5($_POST['pwd']) ?? '';

    $sql = "SELECT * FROM user WHERE user='$usuario' AND password='$password'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $_SESSION['usuario'] = $usuario;
        echo "ok";
    } else {
        echo "error";
    }
}

if (isset($_SESSION['usuario'])) {
    header("Location: http://localhost/luwiCerp/pages/inicio/");
    exit; // Important!
} else {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/index.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
        <title>App Salones - Inicio</title>
    </head>

    <body>
        <form action="index.php" name="loginForm" id="loginForm" method="post">
            <div class="loginBox">
                <div class="topLogin">
                    <img src="img/logo.png" class="imgLogin" />
                    <p>App Salones</p>
                    <span>Cerp del Litoral</span>
                </div>
                <div class="labelBox">
                    <p>Nombre:</p>
                    <span class="error" id="errorUser">¡Campo obligatorio!</span>
                </div>
                <input id="user" type="text" class="inputLogin" name="user" />
                <div class="labelBox">
                    <p>Contraseña:</p>
                    <span class="error" id="errorPwd">¡Campo obligatorio!</span>
                </div>
                <input id="pwd" type="password" class="inputLogin" name="pwd" />

                <input type="submit" class="btnLogin" value="ACCEDER">
            </div>
        </form>
        <script src="js/jquery-3.7.1.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#loginForm").on("submit", function(e) {
                    e.preventDefault(); // detenemos el envío por defecto

                    let usuario = $("#user").val().trim();
                    let password = $("#pwd").val().trim();
                    let valido = true;

                    // Ocultamos errores
                    $(".error").hide();

                    if (usuario === "") {
                        $("#errorUser").show();
                        valido = false;
                    }
                    if (password === "") {
                        $("#errorPwd").show();
                        valido = false;
                    }

                    if (valido) {

                        this.submit(); // descomenta si querés que se envíe realmente
                    }
                });
            });
        </script>
    </body>

    </html>
<?php
}
?>