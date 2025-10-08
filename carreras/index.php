<?php include '../config/comp.php'; ?>
<?php $titlePage = 'Carreras'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilosGenerales.css">
    <link rel="stylesheet" href="../css/carreras.css">
    <title>Carreras - App Salones</title>
</head>

<body>
    <?php include 'modalAgregar.php'; ?>
    <?php include 'modalEditar.php'; ?>
    <?php include 'modalEliminar.php'; ?>
    
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
                <input class="inputBuscar" id="inputBuscar" name="inputBuscar" placeholder="Buscar...">
                <span class="material-symbols-rounded iconBuscar">search</span>
            </div>
            <div class="rightHeader">
                <button onclick="abrirModalAgregar('500px')" class="btnAgregar"><span class="material-symbols-rounded">add</span>
                    <p>AGREGAR CARRERA</p>
                </button>
            </div>
        </div>
        <div class="bodyPrincipal">
            <div class="contenedorCarreras">
                <div class="loadData" id="loadData">
                    
                </div>
            </div>
        </div>
        <div class="footerPrincipal">
            <?php include '../components/footer.php'; ?>
        </div>
    </div>
    <script src="../js/color.js"></script>
    <script src="index.js"></script>
    <script src="../js/notificaciones.js"></script>
</body>

</html>