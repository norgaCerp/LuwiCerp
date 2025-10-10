<?php
include '../config/database.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/panel.css">
    <title>Panel Tv - App Salones</title>
</head>

<body>
    <div class="contenedorPrincipal">
        <form method="get" action="" id="formFiltrar">
            <header>
                <div class="logoCerp"><img src="../assets/logo.png"></div>
                <div class="contenedorFiltros">
                    <div class="select-wrapper">
                        <select id="selectCarrera" name="carrera">
                            <option value="">Seleccione una carrera</option>
                            <?php
                            $sql = "SELECT * FROM carreras";
                            $resultado = $conexion->query($sql);
                            if ($resultado->num_rows > 0) {
                                // Usar while para recorrer los resultados
                                while ($fila = $resultado->fetch_assoc()) {
                            ?>

                                    <option value="<?php echo $fila["id"]; ?>"><?php echo $fila["nombre"]; ?></option>

                                <?php
                                }
                            } else {
                                ?>
                                <option value="">No hay registro</option>
                            <?php
                            }
                            ?>
                        </select>
                        <input type="text" class="inp" id="inCarrera" value="<?php echo @$_GET['carrera']; ?>">
                    </div>
                    <div class="select-wrapper">
                        <select id="selectAnio" name="anio">
                            <option value="">Seleccione un año</option>
                            <option value="1">Primer año</option>
                            <option value="2">Segundo año</option>
                            <option value="3">Tercer año</option>
                            <option value="4">Cuarto año</option>
                        </select>
                        <input type="text" class="inp" id="inAnio" value="<?php echo @$_GET['anio']; ?>">
                    </div>
                    <div class="select-wrapper">
                        <select id="selectSemestre" name="semestre">
                            <option value="">Seleccione un semestre</option>
                            <option value="s1">Primer semestre</option>
                            <option value="s2">Segundo semestre</option>
                        </select>
                        <input type="text" class="inp" id="inSemestre" value="<?php echo @$_GET['semestre']; ?>">
                    </div>
                    <input type="submit" class="btnFiltrar" value="BUSCAR">
                </div>
                <div onclick="window.location.href='/LuwiCerp/panel/'" class="btnAux" title="Resetear opciones">
                    <span class="material-symbols-rounded">refresh</span>
                </div>
            </header>
        </form>
        <?php
        if (isset($_GET['carrera']) and isset($_GET['anio']) and isset($_GET['semestre'])) {
        ?>
            <div class="headerDias">
                <div class="horarioTitulo">
                    <span class="material-symbols-rounded">browse_gallery</span>
                    <p>HORARIOS</p>
                </div>
                <div class="contenedorDias" style="display:flex;font-weight:bold;">
                    <div class="celdaDia">LUNES</div>
                    <div class="celdaDia">MARTES</div>
                    <div class="celdaDia">MIERCOLES</div>
                    <div class="celdaDia">JUEVES</div>
                    <div class="celdaDia">VIERNES</div>

                </div>
                <div class="sabTitle">
                    <div class="celdaDia">SABADO</div>
                </div>
            </div>
            <div class="cont">
                <div class="contenedorDatos">
                    <?php
                    $carrera = $_GET['carrera'];
                    $semestre = $_GET['semestre'];
                    $anio = $_GET['anio'];
                    $diasSemana = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes'];
                    //este sql es para obtener el orden minimo y el maximo para no mostrar los demas rango que no tienen valores
                    $sqlRango = "SELECT MIN(s.orden) AS minOrden, MAX(s.orden) AS maxOrden
                         FROM salonario s
                         INNER JOIN asignaturas a ON s.idAsig = a.id
                         INNER JOIN carreras_asignaturas ac ON ac.idAsignatura = a.id
                         INNER JOIN carreras c ON c.id = ac.idCarrera
                         WHERE s.semestre=? AND a.anio=? AND c.id=? AND s.dia<>'sabado'";
                    $stmtRango = $conexion->prepare($sqlRango);
                    $stmtRango->bind_param("sii", $semestre, $anio, $carrera);
                    $stmtRango->execute();
                    $resRango = $stmtRango->get_result()->fetch_assoc();
                    $minOrden = (int)$resRango['minOrden'];
                    $maxOrden = (int)$resRango['maxOrden'];
                    $stmtRango->close();
                    //este sql es para obtener los datos
                    $sql = "SELECT 
                        s.dia,
                        s.orden,
                        a.nombre AS asignat,
                        d.nombre AS prof,
                        d.apellido AS ape,
                        sa.nombre AS salon
                    FROM salonario s 
                    INNER JOIN asignaturas a ON s.idAsig = a.id
                    INNER JOIN docentes d ON a.idProfesor = d.id
                    INNER JOIN carreras_asignaturas ac ON ac.idAsignatura = a.id
                    INNER JOIN carreras c ON c.id = ac.idCarrera
                    INNER JOIN salones sa ON s.idSalon = sa.id
                    WHERE s.semestre = ? 
                      AND a.anio = ? 
                      AND c.id = ? AND s.dia<>'sabado'";

                    $stmt = $conexion->prepare($sql);
                    $stmt->bind_param("sii", $semestre, $anio, $carrera);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $horarios = [];
                    while ($row = $result->fetch_assoc()) {
                        $horarios[$row['orden']][$row['dia']] = $row;
                    }

                    if ($result->num_rows > 0) {
                        for ($o = $minOrden; $o <= $maxOrden; $o++) {
                            include 'horarios.php';
                            echo '<div class="filaDatos">';
                            echo '<div class="celdaHorario">' . @$titleHora . '</div>';
                            echo '<div class="contenedorHorarios">';
                            //recorre y va rellenando las celdas
                            foreach ($diasSemana as $dia) {
                                if (isset($horarios[$o][$dia])) {
                                    $h = $horarios[$o][$dia];
                                    echo '<div class="celdaDatos">';
                                    echo '<p class="asigD">' . htmlspecialchars($h['asignat']) . '</p>';
                                    echo '<p class="profD">Prof: ' . htmlspecialchars($h['prof']) . ' ' . htmlspecialchars($h['ape']) . '</p>';
                                    echo '<p class="salonD">' . htmlspecialchars($h['salon']) . '</p>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="celdaDatos vacio"></div>';
                                }
                            }

                            echo '</div></div>';
                        }
                    } else {
                        echo '<div class="msg"><span class="material-symbols-rounded">report</span><p>No hay registros</p></div>';
                    }
                    ?>
                </div>
                <div class="sab">
                    <div class="celdaDatosSab">
                        <?php
                        // consulta solo para sabado
                        $sqlSab = "SELECT 
                        s.dia,
                        s.orden,
                        a.nombre AS asignat,
                        d.nombre AS prof,
                        sa.nombre AS salon
                    FROM salonario s 
                    INNER JOIN asignaturas a ON s.idAsig = a.id
                    INNER JOIN docentes d ON a.idProfesor = d.id
                    INNER JOIN carreras_asignaturas ac ON ac.idAsignatura = a.id
                    INNER JOIN carreras c ON c.id = ac.idCarrera
                    INNER JOIN salones sa ON s.idSalon = sa.id
                    WHERE s.semestre = ? 
                      AND a.anio = ? 
                      AND c.id = ? 
                      AND s.dia='sabado'
                    ORDER BY s.orden";

                        $stmtSab = $conexion->prepare($sqlSab);
                        $stmtSab->bind_param("sii", $semestre, $anio, $carrera);
                        $stmtSab->execute();
                        $resultSab = $stmtSab->get_result();

                        if ($resultSab->num_rows > 0) {
                            while ($rowSab = $resultSab->fetch_assoc()) {
                                $o = $rowSab['orden'];
                                include 'horarios.php';
                                echo '<div class="filaDatosSab">';
                                echo '<div class="celdaDatos">';
                                echo '<p class="asigD">' . htmlspecialchars($rowSab['asignat']) . '</p>';
                                echo '<p class="profD">Prof: ' . htmlspecialchars($rowSab['prof']) . '</p>';
                                echo '<p class="salonD">' . htmlspecialchars($rowSab['salon']) . '</p>';
                                echo '<p class="horaD">De: ' . $titleHora . '</p>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="celdaDatos"></div>';
                        }

                        $stmt->close();
                        $conexion->close();
                        ?>
                    </div>
                </div>
            </div>
        <?php
        } else {
            ?>
            <div class="landingPage">
                <h1><span class="material-symbols-rounded">arrow_circle_up</span> <p>Seleccione una carrera, un año y un semestre!!!</p></h1>
                <img src="../assets/landPage.jpg">
            </div>
            <?php
        }
        ?>
    </div>
    <script src="index.js"></script>
</body>

</html>