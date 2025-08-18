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

        </div>
        <div class="rightHeader">

        </div>
    </header>
    <section id="lunesBox" class="salonarioBox">
        <div class="horariosBox">
            <div class="itemHora princ">
                <span class="material-symbols-rounded">browse_gallery</span>
                <p>HORARIOS</p>
            </div>
            <div class="itemHora">
                <p>07:10 a 07:55</p>
            </div>
            <div class="itemHora">
                <p>07:55 a 08:40</p>
            </div>
            <div class="itemHora">
                <p>08:50 a 09:35</p>
            </div>
            <div class="itemHora">
                <p>09:35 a 10:20</p>
            </div>
            <div class="itemHora">
                <p>10:30 a 11:15</p>
            </div>
            <div class="itemHora">
                <p>11:15 a 12:00</p>
            </div>
            <div class="itemHora">
                <p>12:10 a 12:55</p>
            </div>
            <div class="itemHora">
                <p>12:55 a 13:40</p>
            </div>
            <div class="itemHora">
                <p>13:50 a 14:35</p>
            </div>
            <div class="itemHora">
                <p>14:35 a 15:20</p>
            </div>
            <div class="itemHora">
                <p>15:30 a 16:15</p>
            </div>
            <div class="itemHora">
                <p>16:15 a 17:00</p>
            </div>
            <div class="itemHora">
                <p>17:10 a 17:55</p>
            </div>
            <div class="itemHora">
                <p>17:55 a 18:40</p>
            </div>
            <div class="itemHora">
                <p>18:50 a 19:35</p>
            </div>
            <div class="itemHora">
                <p>19:35 a 20:20</p>
            </div>
            <div class="itemHora">
                <p>20:25 a 21:10</p>
            </div>
            <div class="itemHora">
                <p>21:10 a 21:55</p>
            </div>
            <div class="itemHora">
                <p>22:05 a 22:50</p>
            </div>
            <div class="itemHora">
                <p>22:50 a 23:35</p>
            </div>

        </div>
        <div class="datosBox">
            <div class="itemSalon">
                <div class="itemSalonData titleData">SALON 01</div>
                <div class="itemSalonData">lorem</div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
            </div>
            <div class="itemSalon">
                <div class="itemSalonData titleData">SALON 02</div>
                <div class="itemSalonData">lorem</div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
            </div>
            <div class="itemSalon">
                <div class="itemSalonData titleData">SALON 03</div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
            </div>
            <div class="itemSalon">
                <div class="itemSalonData titleData">SALON 04</div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
            </div>
            <div class="itemSalon">
                <div class="itemSalonData titleData">SALON 05</div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
            </div>
            <div class="itemSalon">
                <div class="itemSalonData titleData">SALON 06</div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
            </div>
            <div class="itemSalon">
                <div class="itemSalonData titleData">SALON 07</div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
            </div>
            <div class="itemSalon">
                <div class="itemSalonData titleData">SALON 08</div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
            </div>
            <div class="itemSalon">
                <div class="itemSalonData titleData">SALON 09</div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
            </div>
            <div class="itemSalon">
                <div class="itemSalonData titleData">SALON 10</div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
            </div>
            <div class="itemSalon">
                <div class="itemSalonData titleData">SALON 11</div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
            </div>
            <div class="itemSalon">
                <div class="itemSalonData titleData">SALON 12</div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
                <div class="itemSalonData"></div>
            </div>
        </div>
    </section>
    <?php include '../../components/menu.php'; ?>
    <script src="../../js/jquery-3.7.1.min.js"></script>
</body>

</html>