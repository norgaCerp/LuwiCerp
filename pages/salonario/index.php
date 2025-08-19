<?php
include '../../config/comp.php';
$titlePage = 'Salonario';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/estilos.css">
    <link rel="stylesheet" href="css/salonario.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
    <title>App Salones - Salonario</title>
</head>

<body>
    <header class="headerTop">
        <div class="leftHeader">
            <div onclick="openMenu()" class="logo"><span class="material-symbols-rounded">sort</span></div>
            <p class="titlePage"><?= $titlePage; ?></p>
        </div>
        <div class="centerHeader">
            <div onclick="cargarSalonario('lunes')" class="dayMenu" id="lunes"><p>LUNES</p></div>
            <div onclick="cargarSalonario('martes')" class="dayMenu" id="martes"><p>MARTES</p></div>
            <div onclick="cargarSalonario('miercoles')" class="dayMenu" id="miercoles"><p>MIERCOLES</p></div>
            <div onclick="cargarSalonario('jueves')" class="dayMenu" id="jueves"><p>JUEVES</p></div>
            <div onclick="cargarSalonario('viernes')" class="dayMenu" id="viernes"><p>VIERNES</p></div>
            <div onclick="cargarSalonario('sabado')" class="dayMenu" id="sabado"><p>SABADO</p></div>
        </div>
        <div class="rightHeader">
            <div class="semestreTabBox">
                <div id="semestretab1" class="semestreTab semestreTabActive">1 semestre</div>
                <div id="semestretab2" class="semestreTab">2 semestre</div>
            </div>
        </div>
    </header>
    <section id="cargarDiasBox">

    </section>
    <?php include '../../components/menu.php'; ?>
    <script src="../../js/jquery-3.7.1.min.js"></script>
    <script src="js/salonario.js"></script>
</body>

</html>