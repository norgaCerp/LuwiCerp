<?php
include '../../config/comp.php';
$titlePage = 'Inicio';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
    <title>App Salones - Inicio</title>
</head>

<body>
    <header class="headerTop">
        <div class="leftHeader">
            <div onclick="openMenu()" class="logo"><span class="material-symbols-rounded">sort</span></div>
            <p class="titlePage"><?= $titlePage; ?></p>
        </div>
        <div class="centerHeader">
            
        </div>
        <div class="rightHeader">
            
        </div>
    </header>
    
    <?php include '../../components/menu.php'; ?>
    <script src="../../js/jquery-3.7.1.min.js"></script>
</body>

</html>