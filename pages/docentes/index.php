<?php $titlePage = 'Docentes'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/estilos.css">
    <link rel="stylesheet" href="css/docentes.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
    <title>App Salones - Docentes</title>
</head>

<body>
    <header class="headerTop">
        <div class="leftHeader">
            <div onclick="openMenu()" class="logo"><span class="material-symbols-rounded">sort</span></div>
            <p class="titlePage"><?= $titlePage; ?></p>
        </div>
        <div class="centerHeader">
            <input id="search" type="text" placeholder="Buscar..." class="searchBox" />
            <span class="material-symbols-rounded">search</span>
        </div>
        <div class="rightHeader">
            <button onclick="openModalForm('agregar.php')" class="btnAgregar"><span class="material-symbols-rounded">group_add</span>NUEVO DOCENTE</button>
        </div>
    </header>
    <!-- seccion donde se listan los datos del docente -->
    <section class="cargaDatosDocentes" id="cargaDatosDocentes">

    </section>

    <section class="modalFormBox" id="modalFormBox">
        <div class="modalForm" id="modalForm">
            <div id="loadModalForm"></div>
        </div>
    </section>

    <?php include '../../components/menu.php'; ?>

    <script src="../../js/jquery-3.7.1.min.js"></script>
    <script src="js/docentes.js"></script>
</body>

</html>