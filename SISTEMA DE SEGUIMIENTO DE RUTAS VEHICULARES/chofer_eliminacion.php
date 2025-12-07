<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Chofer</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>        
        :root {
            --color-bg: #eef1f6;
            --color-card: #ffffff;
            --color-danger: #e53935;
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
            max-width: 400px;
            width: 100%;
            text-align: center;
            border-top: 5px solid var(--color-danger);
        }
        h2 {
            color: var(--color-danger);
            font-weight: 700;
            font-size: 1.8em;
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 20px;
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
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 2px solid var(--color-danger); 
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.2s, box-shadow 0.2s;
            box-sizing: border-box;
            text-align: center;
        }
        input[type="number"]:focus {
            border-color: #c62828;
            box-shadow: 0 0 0 3px rgba(229, 57, 53, 0.2);
            outline: none;
        }
        input[type="submit"] {
            background-color: var(--color-danger);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1em;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.2s, transform 0.1s;
            box-shadow: 0 4px 6px rgba(229, 57, 53, 0.3);
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #c62828;
            transform: translateY(-1px);
        }
        .warning-message {
            color: var(--color-danger);
            background-color: #ffebee;
            border: 1px solid var(--color-danger);
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 0.9em;
            font-weight: 600;
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
    </style>
</head>
<body>
    <div class="form-container">
        <form action="chofer_eliminacion2.php" method="post" onsubmit="return confirmDeletion(this)">
            <h2>Eliminar CHOFER</h2>
            
            <div class="warning-message">
                ⚠️ Advertencia: Esta acción es irreversible.
            </div>

            <div class="form-group">
                <label for="idchofer">Ingrese ID del Chofer a ELIMINAR:</label>
                <input type="number" id="idchofer" name="idc" required placeholder="Ej: 123">
            </div>
            
            <input type="submit" value="ELIMINAR PERMANENTEMENTE">
        </form>

        <a href="index.php" class="back-link">← Volver al Menú Principal</a>
    </div>

    <script>
        function confirmDeletion(form) {
            const idc = form.idc.value.trim();
            if (idc === '' || isNaN(idc) || parseInt(idc) <= 0) {
                alert('ERROR: Por favor, ingrese un ID de Chofer válido (número positivo).');
                form.idc.focus();
                return false;
            }
            const confirmation = confirm(`¿Está absolutamente seguro de ELIMINAR al chofer con ID: ${idc}?`);
            
            if (confirmation) {
                return confirm('¡ADVERTENCIA FINAL! Esta acción no se puede deshacer. Presione Aceptar para confirmar la eliminación.');
            }
            return false;
        }
    </script>
</body>
</html>