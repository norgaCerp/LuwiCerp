<?php include '../config/comp.php'; ?>
<?php $titlePage = 'Salonario'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilosGenerales.css">
    <link rel="stylesheet" href="../css/salonario.css">
    <title>Salonario - App Salones</title>
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
                <div class="contenedorDias">
                    <div onclick="cargarSalonario('lunes', document.getElementById('inputSem').value)" id="lunes" class="itemDias">LUNES</div>
                    <div onclick="cargarSalonario('martes', document.getElementById('inputSem').value)" id="martes" class="itemDias">MARTES</div>
                    <div onclick="cargarSalonario('miercoles', document.getElementById('inputSem').value)" id="miercoles" class="itemDias">MIERCOLES</div>
                    <div onclick="cargarSalonario('jueves', document.getElementById('inputSem').value)" id="jueves" class="itemDias">JUEVES</div>
                    <div onclick="cargarSalonario('viernes', document.getElementById('inputSem').value)" id="viernes" class="itemDias">VIERNES</div>
                    <div onclick="cargarSalonario('sabado', document.getElementById('inputSem').value)" id="sabado" class="itemDias">SABADO</div>
                </div>
                <input type="text" id="inputDias" style="display: none;">
                <input type="text" id="inputSem" style="display: none;">
            </div>
            <div class="rightHeader">
                <div class="contenedorSemestre">
                    <div id="s1" onclick="cargarSalonario(document.getElementById('inputDias').value, 's1')" class="itemSem">SEMESTRE 1</div>
                    <div id="s2" onclick="cargarSalonario(document.getElementById('inputDias').value, 's2')" class="itemSem">SEMESTRE 2</div>
                </div>
            </div>
        </div>
        <div class="bodyPrincipal">
            <div class="contenedorSalonario" id="contenedorSalonario">
                
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