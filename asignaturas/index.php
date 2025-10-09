<?php include '../config/comp.php'; ?>
<?php $titlePage = 'Asignaturas'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilosGenerales.css">
    <link rel="stylesheet" href="../css/asignaturas.css">
    <title>Asignaturas - App Salones</title>
</head>

<body>
    <?php include 'modalAgregar.php'; ?>
    <?php include 'modalEditar.php'; ?>
    <?php include 'modalEliminar.php'; ?>
    <?php include 'modalBuscarProf.php'; ?>

    <?php include '../components/menu.php'; ?>
    <!-- se hace include los componentes de notificaciones -->
    <?php include '../components/msgConfirmacion.php'; ?>
    <?php include '../components/msgError.php'; ?>

    <div class="contenedorPrincipal">
        <div class="headerPrincipal">
            <div class="leftHeader">
                <button onclick="abrirMenu()" class="btnMenu"><span class="material-symbols-rounded">menu</span></button>
                <p class="titlePage"><?= $titlePage; ?></p>
            </div>
            <div class="centerHeader">
                <input id="inputBuscar" class="inputBuscar" name="inputBuscar" placeholder="Buscar...">
                <span class="material-symbols-rounded iconBuscar">search</span>
            </div>
            <div class="rightHeader">
                <button onclick='abrirModalAgregar("700px")' class="btnAgregar"><span class="material-symbols-rounded">add</span>
                    <p>AGREGAR ASIGNATURA</p>
                </button>
            </div>
        </div>
        <div class="bodyPrincipal">
            <div class="contenedorAsignaturas">
                
                <div class="loadData" id="loadData">

                </div>
            </div>
        </div>
        <div class="footerPrincipal">
            <?php include '../components/footer.php'; ?>
        </div>
    </div>
    <script src="index.js"></script>
    <script src="../js/notificaciones.js"></script>
</body>

</html>