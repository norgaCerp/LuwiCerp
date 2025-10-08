<?php include '../config/comp.php'; ?>
<?php $titlePage = 'Salones'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilosGenerales.css">
    <link rel="stylesheet" href="../css/salones.css">
    <title>Docentes - App Salones</title>
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
                <input class="inputBuscar" name="inputBuscar" id="inputBuscar" placeholder="Buscar...">
                <span class="material-symbols-rounded iconBuscar">search</span>
            </div>
            <div class="rightHeader">
                <button onclick='abrirModalAgregar("800px")' id="btnAgregar" class="btnAgregar"><span class="material-symbols-rounded">add</span>
                    <p>AGREGAR SALÓN</p>
                </button>
            </div>
        </div>
        <div class="bodyPrincipal" id="bodyPrincipal">
            <!-- <button onclick='abrirModal("900px", "contenedorEditarDocente", "modalEditarDocente")'>editar</button>
            <button onclick='abrirModal("400px", "contenedorEliminarDocente", "modalEliminarDocente")'>eliminar</button> -->
            <div class="loadData">
                <div class="headerList">
                    <div class="headerListItem">Nombre</div>
                    <div class="headerListItem">Piso</div>
                    <div class="headerListItem">Capacidad</div>
                    <div class="headerListItem">Televisor</div>
                    <div class="headerListItem">Aire acond.</div>
                    <div class="headerListItem">Observaciones</div>
                    <div class="headerListItem opc">Editar</div>
                    <div class="headerListItem opc">Eliminar</div>
                </div>
                <div id="contenedorData"></div>
                
            </div>

        </div>
        <div class="footerPrincipal">
            <?php include '../components/footer.php'; ?>
        </div>
    </div>

</body>
<script src="index.js"></script>
<script src="../js/notificaciones.js"></script>
</html>