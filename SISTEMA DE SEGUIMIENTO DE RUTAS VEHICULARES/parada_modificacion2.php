<?php 
include("conecte.php");

if (!isset($_POST['idp']) || empty($_POST['idp'])) {
    die("<div style='color:red; text-align:center;'>Error: Debe proporcionar el ID de la parada.</div>");
}

$id_a_buscar = mysqli_real_escape_string($conexion, $_POST['idp']);

$query = "SELECT idparada, puntoparada, descripcion FROM parada WHERE idparada = $id_a_buscar";
$resultado = mysqli_query($conexion, $query);

if (!$resultado || mysqli_num_rows($resultado) === 0) {
    mysqli_close($conexion);
    die("<div style='color:red; text-align:center;'>Error: Parada con ID **$id_a_buscar** no encontrada. <a href='parada_modificacion1.php'>Volver a buscar.</a></div>");
}

$datos_parada = mysqli_fetch_array($resultado);
$idp_actual = htmlspecialchars($datos_parada[0]);
$pun_actual = htmlspecialchars($datos_parada[1]);
$des_actual = htmlspecialchars($datos_parada[2]);

mysqli_free_result($resultado);
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Modificar Parada - ID: <?php echo $idp_actual; ?></title>
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
        <form action="parada_modificacion3.php" method="POST" onsubmit="return validateModification(this)">
            <h1>Editando Parada: ID <?php echo $idp_actual; ?></h1>
            
            <p class="instruction">Modifique el punto y/o descripción y presione **Guardar**.</p>

            <input type="hidden" name="idp_original" value="<?php echo $idp_actual; ?>">
            
            <div class="form-group">
                <label for="punto">NUEVO PUNTO DE PARADA:</label>
                <input type="text" id="punto" name="pun" required value="<?php echo $pun_actual; ?>" placeholder="Nuevo punto (Ej: Mercado Central)">
            </div>
            
            <div class="form-group">
                <label for="descripcion">NUEVA DESCRIPCIÓN:</label>
                <input type="text" id="descripcion" name="des" required value="<?php echo $des_actual; ?>" placeholder="Nueva referencia (Ej: Esquina de calle X)">
            </div>
            
            <input type="submit" value="GUARDAR MODIFICACIONES">
        </form>

        <a href="parada_modificacion1.php" class="back-link">← Buscar otra Parada</a>
    </div>

    <script>
        function validateModification(form) {
            const idp = form.idp_original.value.trim();
            const pun = form.pun.value.trim();
            const des = form.des.value.trim();

            if (pun === '' || des === '') {
                alert('ERROR: Los campos de Punto y Descripción son obligatorios.');
                return false;
            }

            if (pun.length < 5) {
                alert('ERROR: El Nuevo Punto de Parada debe tener al menos 5 caracteres.');
                form.pun.focus();
                return false;
            }
            
            if (des.length < 10) {
                alert('ERROR: La Nueva Descripción debe ser más detallada (mínimo 10 caracteres).');
                form.des.focus();
                return false;
            }
            return confirm(`¿Confirma actualizar la Parada ID ${idp} con los nuevos datos?`);
        }
    </script>
</body>
</html>