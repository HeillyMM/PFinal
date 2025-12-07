<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Parada</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --color-bg: #eef1f6;
            --color-card: #ffffff;
            --color-primary: #1e88e5;
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
            border-top: 5px solid var(--color-primary);
        }
        h2 {
            color: var(--color-primary);
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
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(30, 136, 229, 0.2);
            outline: none;
        }
        input[type="submit"] {
            background-color: var(--color-primary);
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
            background-color: #1565c0;
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
            color: var(--color-primary);
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
        <form action="parada_adicion2.php" method="post" onsubmit="return validateParadaForm(this)">
            <h2>Adicionar PARADA</h2>
            
            <div class="form-group">
                <label for="punto">PUNTO DE PARADA:</label>
                <input type="text" id="punto" name="pun" required placeholder="Ej: Plaza Central, Terminal">
            </div>
            
            <div class="form-group">
                <label for="descripcion">DESCRIPCIÓN / REFERENCIA:</label>
                <input type="text" id="descripcion" name="des" required placeholder="Ej: Frente al mercado principal">
            </div>
            
            <input type="submit" value="ADICIONAR PARADA">
        </form>

        <a href="index.php" class="back-link">← Volver al Menú Principal</a>
    </div>

    <script>
        function validateParadaForm(form) {
            const idp = form.idp.value.trim();
            const pun = form.pun.value.trim();
            const des = form.des.value.trim();

            if (idp === '' || pun === '' || des === '') {
                alert('ERROR: Todos los campos (Punto de Parada y Descripción) son obligatorios.');
                return false;
            }

            if (isNaN(idp) || parseInt(idp) <= 0) {
                alert('ERROR: ID PARADA debe ser un número positivo.');
                form.idp.focus();
                return false;
            }

            if (pun.length < 5) {
                alert('ERROR: El Punto de Parada debe ser más descriptivo (mínimo 5 caracteres).');
                form.pun.focus();
                return false;
            }
            
            if (des.length < 10) {
                alert('ERROR: La Descripción debe ser más detallada (mínimo 10 caracteres).');
                form.des.focus();
                return false;
            }

            return confirm('¿Confirma que desea adicionar esta nueva Parada?');
        }
    </script>
</body>
</html>