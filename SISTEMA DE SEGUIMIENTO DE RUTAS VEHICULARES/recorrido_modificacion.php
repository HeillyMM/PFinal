<?php 
include("conecte.php"); 

if (!isset($conexion) || mysqli_connect_error()) {
    $db_error = "Error al conectar a la base de datos. Verifique 'conecte.php'.";
} else {
    $db_error = null;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Recorrido a Modificar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
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
</head>
<body>
    <div class="form-container">
        
        <?php if ($db_error): ?>
            <div class="error-message">
                <strong>¡ERROR!</strong> No se pudo cargar el formulario. <?php echo $db_error; ?>
            </div>
        <?php else: ?>
        
            <form action="recorrido_modificacion2.php" method="POST" onsubmit="return validateSearch(this)">
                <h1>Buscar Recorrido a Modificar</h1>
                
                <p class="instruction">Ingrese el ID del recorrido que desea editar.</p>
                
                <div class="form-group">
                    <label for="idrecorrido">ID RECORRIDO a Modificar:</label>
                    <input type="number" id="idrecorrido" name="idr" required placeholder="ID del recorrido existente">
                </div>

                <input type="submit" value="BUSCAR RECORRIDO">
            </form>
            
            <?php mysqli_close($conexion); ?>
        <?php endif; ?>

        <a href="index.php" class="back-link">← Volver al Menú Principal</a>
    </div>

    <script>
        function validateSearch(form) {
            const idr = form.idr.value.trim();
            if (idr === '' || isNaN(idr) || parseInt(idr) <= 0) {
                alert('ERROR: ID RECORRIDO debe ser un número positivo.');
                form.idr.focus();
                return false;
            }
            return true;
        }
    </script>
</body>
</html>