<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Chofer</title>
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
</head>
<body>
    <div class="form-container">
        <form action="chofer_modificacion2.php" method="POST" onsubmit="return validateSearch(this)"> 
            <h1> Buscar Chofer a Modificar</h1>
            
            <p class="instruction">Ingrese el ID del chofer para ver su registro actual y editarlo.</p>
            
            <div class="form-group">
                <label for="idchofer">ID CHOFER:</label>
                <input type="number" id="idchofer" name="idc" required placeholder="Ingrese el ID existente">
            </div>
            
            <input type="submit" value="BUSCAR CHOFER">
        </form>

        <a href="index.php" class="back-link">← Volver al Menú Principal</a>
    </div>

    <script>
        function validateSearch(form) {
            const idc = form.idc.value.trim();
            if (idc === '' || isNaN(idc) || parseInt(idc) <= 0) {
                alert('ERROR: ID CHOFER debe ser un número positivo.');
                form.idc.focus();
                return false;
            }
            return true;
        }
    </script>

    <script>
        function validateModification(form) {
            const idc = form.idc.value.trim();
            const nom = form.nom.value.trim();

            if (idc === '' || nom === '') {
                alert('ERROR: Ambos campos (ID y Nombre) son obligatorios para la modificación.');
                return false;
            }

            if (isNaN(idc) || parseInt(idc) <= 0) {
                alert('ERROR: ID CHOFER debe ser un número positivo.');
                form.idc.focus();
                return false;
            }

            if (nom.length < 3) {
                alert('ERROR: El Nuevo Nombre debe tener al menos 3 caracteres.');
                form.nom.focus();
                return false;
            }
            return confirm(`¿Confirma que desea modificar el registro del chofer con ID: ${idc} al nuevo nombre: ${nom}?`);
        }
    </script>
</body>
</html>