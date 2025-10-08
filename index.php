<?php
session_start();
include 'config/database.php';
$errorMsg = false;

if (isset($_SESSION['usuario'])) {
    header("Location: http://localhost/appSalones/docentes/");
    exit;
}

if (isset($_POST["user"]) && isset($_POST["pwd"])) {

    $usuario = $_POST['user'] ?? '';
    $password = md5($_POST['pwd']) ?? ''; 

    $sql = "SELECT user FROM user WHERE user = ? AND password = ?";
    
    if ($stmt = $conexion->prepare($sql)) {
        
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $_SESSION['usuario'] = $usuario;
            header("Location: http://localhost/appSalones/docentes/");
            exit;
        } else {
            $errorMsg = true;
        }
        
        $stmt->close();

    } else {
        $errorMsg = true;
    }
   
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
    <title>Login - App Salones</title>
</head>

<body>
    <div class="loginHeader">
        <div class="logoHeader">
            <span class="material-symbols-rounded">app_registration</span>
            <p>App Salones - Cerp del Litoral Salto</p>
        </div>
        <span class="material-symbols-rounded btnHelp">help</span>
    </div>
    
    <form action="index.php" name="loginForm" id="loginForm" method="post">
        <div class="loginBox">
            <div class="loginBanner">
                <div class="logoBanner"></div>
            </div>
            <div class="spaceTop"></div>
            <div class="inputBox">
                <div class="titleForm">
                    <p>Nombre de usuario:</p>
                    <span class="msgErrorForm" id="errorUser" style="display:none;">¡Datos obligatorios!</span>
                </div>
                <input type="text" class="inputText" name="user" id="user" >
                <br><br>
                <div class="titleForm">
                    <p>Password:</p>
                    <span class="msgErrorForm" id="errorPwd" style="display:none;">¡Datos obligatorios!</span>
                </div>
                <input type="password" class="inputText" name="pwd" id="pwd" >
                
                <?php
                // Mostrar el mensaje de error de credenciales si $errorMsg es true
                if ($errorMsg === true) { ?>
                    <div class="msgErrorBox" id="msgErrorBox">
                        ¡El nombre de usuario o contraseña son incorrectos!
                    </div>
                <?php } ?>
                
                <input type="submit" class="btnLogin" value="ACCEDER">
            </div>
        </div>
    </form>
    
    <div class="footerLogin">
        <p>Proyecto interdisciplinario 3° año profesorado de informática - Integrantes: Luis M. Suarez Bennett - Wilton Alfredo Mascarañas Pereira</p>
    </div>
    
    <script src="js/login.js"></script>
</body>

</html>