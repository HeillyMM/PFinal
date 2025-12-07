<?php 
include("conecte.php");

if (!isset($_POST['idv']) || empty($_POST['idv'])) {
    die("<div style='color:red; text-align:center;'>Error: Debe proporcionar el ID del vehículo. <a href='vehiculo_modificacion1.php'>Volver a buscar.</a></div>");
}

$id_a_buscar = mysqli_real_escape_string($conexion, $_POST['idv']);

$query = "SELECT idvehiculo, placa, color, modelo, tipo FROM vehiculo WHERE idvehiculo = $id_a_buscar";
$resultado = mysqli_query($conexion, $query);

if (!$resultado || mysqli_num_rows($resultado) === 0) {
    mysqli_close($conexion);
    die("<div style='color:red; text-align:center;'>Error: Vehículo con ID **$id_a_buscar** no encontrado. <a href='vehiculo_modificacion1.php'>Volver a buscar.</a></div>");
}

$datos_vehiculo = mysqli_fetch_array($resultado);
$idv_actual = htmlspecialchars($datos_vehiculo[0]);
$pla_actual = htmlspecialchars($datos_vehiculo[1]);
$col_actual = htmlspecialchars($datos_vehiculo[2]);
$mod_actual = htmlspecialchars($datos_vehiculo[3]);
$tip_actual = htmlspecialchars($datos_vehiculo[4]);

mysqli_free_result($resultado);
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Vehículo - ID: <?php echo $idv_actual; ?></title>
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
            max-width: 450px;
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
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }
        .form-group label {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--color-header);
            font-size: 0.9em;
        }
        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--color-input-border);
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.2s, box-shadow 0.2s;
            box-sizing: border-box;
        }
        input[type="number"]:focus,
        input[type="text"]:focus {
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
        <form action="vehiculo_modificacion3.php" method="POST" onsubmit="return validateModification(this)">
            <h1>Editando Vehículo: ID <?php echo $idv_actual; ?></h1>
            
            <p class="instruction">Modifique solo los campos necesarios y presione **Guardar**.</p>

            <input type="hidden" name="idv_original" value="<?php echo $idv_actual; ?>">
            
            <div class="form-group">
                <label for="placa">NUEVA PLACA:</label>
                <input type="text" id="placa" name="pla" required value="<?php echo $pla_actual; ?>" placeholder="Ej: XYZ-9876">
            </div>
            
            <div class="form-group">
                <label for="color">NUEVO COLOR:</label>
                <input type="text" id="color" name="col" required value="<?php echo $col_actual; ?>" placeholder="Ej: Rojo Metálico">
            </div>
            
            <div class="form-group">
                <label for="modelo">NUEVO MODELO:</label>
                <input type="text" id="modelo" name="mod" required value="<?php echo $mod_actual; ?>" placeholder="Ej: Mercedes Benz Sprinter">
            </div>
            
            <div class="form-group">
                <label for="tipo">NUEVO TIPO (Ej: Bus, Minibus):</label>
                <input type="text" id="tipo" name="tip" required value="<?php echo $tip_actual; ?>" placeholder="Ej: Minibus">
            </div>
            
            <input type="submit" value="GUARDAR MODIFICACIONES">
        </form>

        <a href="vehiculo_modificacion1.php" class="back-link">← Buscar otro Vehículo</a>
    </div>

    <script>
        function validateModification(form) {
            const idv = form.idv_original.value.trim();
            const pla = form.pla.value.trim();
            const col = form.col.value.trim();
            const mod = form.mod.value.trim();
            const tip = form.tip.value.trim();

            if (pla === '' || col === '' || mod === '' || tip === '') {
                alert('ERROR: Todos los campos son obligatorios para la modificación.');
                return false;
            }

            if (pla.length < 5 || pla.length > 10) {
                alert('ERROR: La PLACA debe tener entre 5 y 10 caracteres.');
                form.pla.focus();
                return false;
            }
            return confirm(`¿Confirma que desea actualizar el Vehículo ID: ${idv}?`);
        }
    </script>
</body>
</html>