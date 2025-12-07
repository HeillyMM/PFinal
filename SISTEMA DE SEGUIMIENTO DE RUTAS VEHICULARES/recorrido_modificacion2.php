<?php 
include("conecte.php"); 

if (!isset($_POST['idr']) || empty($_POST['idr'])) {
    die("<div style='color:red; text-align:center;'>Error: Debe proporcionar el ID del recorrido. <a href='recorrido_modificacion1.php'>Volver a buscar.</a></div>");
}

$id_a_buscar = mysqli_real_escape_string($conexion, $_POST['idr']);

$query_recorrido = "SELECT idrecorrido, idchofer, idvehiculo, idparada, fecha, hora FROM recorrido WHERE idrecorrido = $id_a_buscar";
$resultado_recorrido = mysqli_query($conexion, $query_recorrido);

if (!$resultado_recorrido || mysqli_num_rows($resultado_recorrido) === 0) {
    mysqli_close($conexion);
    die("<div style='color:red; text-align:center;'>Error: Recorrido con ID **$id_a_buscar** no encontrado. <a href='recorrido_modificacion1.php'>Volver a buscar.</a></div>");
}

$datos_recorrido = mysqli_fetch_array($resultado_recorrido);
$idr_actual = htmlspecialchars($datos_recorrido[0]);
$idc_actual = htmlspecialchars($datos_recorrido[1]); 
$idv_actual = htmlspecialchars($datos_recorrido[2]); 
$idp_actual = htmlspecialchars($datos_recorrido[3]); 
$fec_actual = htmlspecialchars($datos_recorrido[4]); 
$hor_actual = htmlspecialchars($datos_recorrido[5]); 

$c = mysqli_query($conexion, "SELECT idchofer, nombrecompleto FROM chofer ORDER BY nombrecompleto ASC");
$v = mysqli_query($conexion, "SELECT idvehiculo, placa FROM vehiculo ORDER BY placa ASC");
$p = mysqli_query($conexion, "SELECT idparada, puntoparada FROM parada ORDER BY puntoparada ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Modificar Recorrido - ID: <?php echo $idr_actual; ?></title>
    </head>

    <style>
        :root {
            --color-bg: #eef1f6;
            --color-card: #ffffff;
            --color-secondary: #5c6bc0;
            --color-text: #4a6572;
            --color-header: #2c3e50;
            --color-input-border: #cfd8dc;
            --shadow-soft: 0 4px 10px rgba(0, 0, 0, 0.05);
            --color-danger: #e53935; 
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-bg);
            color: var(--color-text);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            background-color: var(--color-card);
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: var(--shadow-soft);
            max-width: 500px;
            width: 100%;
            text-align: center;
            border-top: 5px solid var(--color-secondary);
        }

        h1 {
            color: var(--color-secondary);
            font-weight: 700;
            font-size: 1.8em;
            margin-bottom: 25px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 15px;
            width: 100%;
            text-align: left;
        }
        .form-group label {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--color-header);
            font-size: 0.9em;
        }
        input[type="number"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--color-input-border);
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.2s, box-shadow 0.2s;
            box-sizing: border-box;
            background-color: #fcfcfc;
        }
        input:focus, select:focus {
            border-color: var(--color-secondary);
            box-shadow: 0 0 0 3px rgba(92, 107, 192, 0.2);
            outline: none;
        }
        input[type="submit"] {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1em;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.2s, transform 0.1s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #4b5a9b;
            transform: translateY(-1px);
        }
        .back-link {
            display: block;
            margin-top: 20px;
            color: var(--color-text);
            text-decoration: none;
            font-size: 0.9em;
            transition: color 0.2s;
        }
        .back-link:hover {
            color: #1e88e5;
        }
        .error-message {
            background-color: #ffebee;
            color: var(--color-danger); 
            padding: 15px;
            border: 1px solid var(--color-danger);
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
<body>
    <div class="form-container">
        <form action="recorrido_modificacion3.php" method="POST" onsubmit="return validateModification(this)">
            <h1>Editando Recorrido: ID <?php echo $idr_actual; ?></h1>
            
            <p class="instruction">Los datos actuales se muestran abajo. Modifique lo necesario y guarde.</p>
            
            <input type="hidden" name="idr_original" value="<?php echo $idr_actual; ?>">

            <div class="form-group">
                <label for="chofer">NUEVO CHOFER:</label>
                <select id="chofer" name="idc" required>
                    <?php
                    if (mysqli_num_rows($c) == 0) {
                        echo "<option value=''>--- No hay choferes disponibles ---</option>";
                    } else {
                        while ($r = mysqli_fetch_array($c)) {
                            $selected = ($r[0] == $idc_actual) ? 'selected' : '';
                            echo "<option value='" . htmlspecialchars($r[0]) . "' $selected>" . htmlspecialchars($r[1]) . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="vehiculo">NUEVO VEHÍCULO:</label>
                <select id="vehiculo" name="idv" required>
                    <?php
                    if (mysqli_num_rows($v) == 0) {
                        echo "<option value=''>--- No hay vehículos disponibles ---</option>";
                    } else {
                        while ($r = mysqli_fetch_array($v)) {
                            $selected = ($r[0] == $idv_actual) ? 'selected' : ''; 
                            echo "<option value='" . htmlspecialchars($r[0]) . "' $selected>" . htmlspecialchars($r[1]) . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="parada">NUEVA PARADA INICIAL:</label>
                <select id="parada" name="idp" required>
                    <?php
                    if (mysqli_num_rows($p) == 0) {
                        echo "<option value=''>--- No hay paradas disponibles ---</option>";
                    } else {
                        while ($r = mysqli_fetch_array($p)) {
                            $selected = ($r[0] == $idp_actual) ? 'selected' : ''; 
                            echo "<option value='" . htmlspecialchars($r[0]) . "' $selected>" . htmlspecialchars($r[1]) . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="fecha">NUEVA FECHA:</label>
                <input type="date" id="fecha" name="fec" required value="<?php echo $fec_actual; ?>">
            </div>

            <div class="form-group">
                <label for="hora">NUEVA HORA:</label>
                <input type="time" id="hora" name="hor" required value="<?php echo $hor_actual; ?>">
            </div>

            <input type="submit" value="GUARDAR MODIFICACIONES">
        </form>

        <a href="recorrido_modificacion1.php" class="back-link">← Buscar otro Recorrido</a>
    </div>

    <script>
        function validateModification(form) {
            const idr = form.idr_original.value.trim();
            const fec = form.fec.value.trim();
            const choferSelected = form.idc.value;
            const vehiculoSelected = form.idv.value;
            const paradaSelected = form.idp.value;
            
            if (choferSelected === '' || vehiculoSelected === '' || paradaSelected === '' || fec === '') {
                alert('ERROR: Todos los campos (incluyendo las selecciones) son obligatorios.');
                return false;
            }

            const inputDate = new Date(fec);
            const today = new Date();
            today.setHours(0, 0, 0, 0); 
            if (inputDate < today) {
                alert('ERROR: La Nueva Fecha del recorrido no puede ser una fecha pasada.');
                form.fec.focus();
                return false;
            }
            return confirm(`¿Confirma que desea actualizar el Recorrido ID ${idr}?`);
        }
    </script>
</body>
</html>

<?php 
if (isset($c) && $c) mysqli_free_result($c);
if (isset($v) && $v) mysqli_free_result($v);
if (isset($p) && $p) mysqli_free_result($p);
mysqli_close($conexion); 
?>