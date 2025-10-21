<?php
include '../config/database.php';
?>
<div class="salonarioBox" id="salonarioBox">

    <div class="salonarioDate">
        <div class="itemHora princ">
            <div class="princIn">
                <span class="material-symbols-rounded">browse_gallery</span>
                <p>HORARIOS</p>
            </div>
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

    <div class="salonarioColumna">
        <?php
        $sql = "SELECT * FROM salones";
        $resultado = $conexion->query($sql);

        $sqlEdit = "
            SELECT 
                s.*,
                s.id AS idSalonario,
                a.nombre AS nombreAsig,
                a.id AS idAsigna,
                a.anio AS anio, 
                d.nombre AS nombreProf, 
                d.apellido AS apellidoProf, 
                GROUP_CONCAT(c.nombre SEPARATOR ', ') AS nombreCarrera,
                GROUP_CONCAT(c.color SEPARATOR ',') AS colorCarrera
            FROM salonario s
            INNER JOIN asignaturas a ON s.idAsig = a.id
            INNER JOIN docentes d ON a.idProfesor = d.id
            INNER JOIN carreras_asignaturas ac ON ac.idAsignatura = a.id
            INNER JOIN carreras c ON c.id = ac.idCarrera
            WHERE s.idSalon = ? AND s.orden = ? AND s.semestre = ? AND s.dia = ?
            GROUP BY s.id, s.idAsig, s.orden, s.semestre, s.dia";

        if ($stmt = $conexion->prepare($sqlEdit)) {
            $stmt->bind_param("iiss", $idSalon, $i, $_GET["semestre"], $_GET["dia"]);
            
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $idSalon = $fila["id"];
        ?>
                    <div class="itemSalon">
                        <div class="itemSalonData titleData">
                            <div><?php echo htmlspecialchars($fila["nombre"]); ?></div>
                        </div>

                        <?php for ($i = 1; $i <= 20; $i++) {
                            $stmt->execute();
                            $resultadoEdit = $stmt->get_result();

                            if ($resultadoEdit && $resultadoEdit->num_rows > 0) {
                                $fila1 = $resultadoEdit->fetch_assoc();
                                $asig = $fila1["idAsigna"];
                        ?>
                                <div class="itemSalonData" onclick="abrirModalEditar('500px', '<?= htmlspecialchars($asig); ?>', '<?= htmlspecialchars($_GET["dia"]); ?>', '<?= htmlspecialchars($_GET["semestre"]); ?>', '<?= htmlspecialchars($i); ?>', '<?= htmlspecialchars($fila["id"]); ?>', '<?= htmlspecialchars($fila1["idSalonario"]); ?>', '<?= htmlspecialchars($fila1["nombreProf"]); ?> <?= htmlspecialchars($fila1["apellidoProf"]); ?>')">
                                    <div class="itemOcupado" style="background-color: <?= htmlspecialchars(explode(',', $fila1["colorCarrera"])[0]); ?>">
                                        <div class="titleItemCarrera"><?= htmlspecialchars($fila1["nombreAsig"]); ?></div>
                                        <div class="titleItemGrado"><?= htmlspecialchars($fila1["nombreCarrera"]); ?></div>
                                        <div class="titleItemAsig"><?= htmlspecialchars($fila1["anio"]); ?> Año</div>
                                        <div class="titleItemBox">
                                            <div class="titleItemDoce">Prof: <p class="nomP<?php echo $i; ?>"><?= htmlspecialchars($fila1["nombreProf"]); ?> <?= htmlspecialchars($fila1["apellidoProf"]); ?></p></div>
                                            <span class="material-symbols-rounded">edit_document</span>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="itemSalonData" onclick="abrirModalAgregar('500px', '<?= htmlspecialchars($_GET["dia"]); ?>', '<?= htmlspecialchars($_GET["semestre"]); ?>', '<?= htmlspecialchars($i); ?>', '<?= htmlspecialchars($fila["id"]); ?>')">
                                    <div class="itemLibre"><span class="material-symbols-rounded">add_circle</span></div>
                                </div>
                        <?php
                            }
                        } ?>
                    </div>
        <?php 
                }
            }
        } else {
            echo 'Error en la preparación de la consulta: ' . $conexion->error;
        }

        $stmt->close();
        ?>
    </div>
</div>
<?php
$conexion->close();
?>