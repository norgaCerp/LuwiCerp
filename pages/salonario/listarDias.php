<?php include '../../config/database.php'; ?>
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
        <?php
        $sql = "SELECT * FROM salones";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            // Usar while para recorrer los resultados
            while ($fila = $resultado->fetch_assoc()) {
        ?>
                <div class="itemSalon">
                    <div class="itemSalonData titleData"><?php echo $fila["nombre"]; ?></div>

                    <?php for ($i = 1; $i <= 20; $i++) {
                        $sqlEdit = "SELECT * FROM salonario WHERE idSalon='" . $fila["id"] . "' AND orden='" . $i . "' AND semestre='". $_GET["semestre"] ."' AND dia='". $_GET["dia"] ."'";

                        $resultadoEdit = $conexion->query($sqlEdit);

                        if ($resultadoEdit && $resultadoEdit->num_rows > 0) {
                            $fila1 = $resultadoEdit->fetch_assoc();
                    ?>
                            <!-- elementos cuando esta ocupado el salon -->
                            <div class="itemSalonData">
                                <div class="selectItembody" onclick="alert('<?= $fila["nombre"] . '- posicion ' . $i; ?>')">
                                    <div class="fullBox">
                                        <div class="titleCarrera"><?= $fila1["dia"]; ?></div>
                                        <div class="titleAsignatura">Base de datos</div>
                                        <div class="titleDate">Tercer año</div>
                                        <div class="titleDocente">Guillermo Uscudum</div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="itemSalonData">
                                <div class="selectItembody" onclick="openModalForm('agregarReserva.php?salon=<?= $fila["id"]; ?>&&pos=<?= $i; ?>&&dia=<?= $_GET["dia"]; ?>&&semestre=<?= $_GET["semestre"]; ?>')">
                                    <div class="emptyBox">
                                        <span class="material-symbols-rounded">add</span>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } ?>

                </div>
        <?php }
        } ?>
    </div>
</section>

<?php
// Cerrar conexión
$conexion->close();
?>