<?php
switch ($titlePage) {
    case "Docentes":
        $optMenu1 = 'menuActive';
        break;
    case "Salones":
        $optMenu2 = 'menuActive';
        break;
    case "Carreras":
        $optMenu3 = 'menuActive';
        break;
    case "Asignaturas":
        $optMenu4 = 'menuActive';
        break;
    case "Salonario":
        $optMenu5 = 'menuActive';
        break;
    case "Ayuda":
        $optMenu6 = 'menuActive';
        break;
    default:
        $optMenu1 = 'menuActive';
}
?>
<div class="contenedorMenu" id="contenedorMenu">
    <div class="menu" id="menu">
        <div class="topMenu">
            <div class="logoBox">
                <div class="leftLogo">
                    <div class="logo"><span class="material-symbols-rounded">empty_dashboard</span></div>
                    <div class="titleBox">
                        <div class="titleMenu">App Salones</div>
                        <span>Cerp del Litoral</span>
                    </div>
                </div>
                <span title="Cerrar menu" onclick="cerrarMenu()" class="material-symbols-rounded btnCloseMenu">close</span>
            </div>
            <div class="menuItemBox">
                <div onclick="window.location.href='../docentes/'" class="menuItem <?= $optMenu1; ?>"><span class="material-symbols-rounded">group_add</span>
                    <p>DOCENTES</p>
                </div>
                <div onclick="window.location.href='../salones/'" class="menuItem <?= $optMenu2; ?>"><span class="material-symbols-rounded">add_home_work</span>
                    <p>SALONES</p>
                </div>
                <div onclick="window.location.href='../carreras/'" class="menuItem <?= $optMenu3; ?>"><span class="material-symbols-rounded">school</span>
                    <p>CARRERAS</p>
                </div>
                <div onclick="window.location.href='../asignaturas/'" class="menuItem <?= $optMenu4; ?>"><span class="material-symbols-rounded">dictionary</span>
                    <p>ASIGNATURAS</p>
                </div>
                <div onclick="window.location.href='../salonario/'" class="menuItem <?= $optMenu5; ?>"><span class="material-symbols-rounded">calendar_month</span>
                    <p>SALONARIO</p>
                </div>
                <div onclick="window.open('../panel/', '_blank')" class="menuItem <?= $optMenu6; ?>"><span class="material-symbols-rounded">tv</span>
                    <p>PANEL TV</p>
                </div>
            </div>
        </div>
        <div class="footerMenu">
            <button onclick="window.location.href='../logout.php'" class="btnSesion">
                <span class="material-symbols-rounded">chip_extraction</span>
                <p>CERRAR SESIÓN</p>
            </button>
        </div>
    </div>
</div>

<script>
    const element = document.getElementById('menu');

    function abrirMenu() {
        document.getElementById('contenedorMenu').style.display = "block";
        element.animate([{
            left: '-250px',
            opacity: 0
        }, {
            left: '0px',
            opacity: 1
        }], {
            duration: 100,
            easing: 'ease-in-out',
            fill: 'forwards'
        });
    }

    function cerrarMenu() {
        element.animate([{
            left: '0px',
            opacity: 1
        }, {
            left: '-250px',
            opacity: 0
        }], {
            duration: 100,
            easing: 'ease-in-out',
            fill: 'forwards'
        });
        setTimeout(() => {
            document.getElementById('contenedorMenu').style.display = "none";
        }, 100);
    }

    //window.onload = abrirMenu();
</script>