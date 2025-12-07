<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control Sistema</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
        
            --color-bg: #eef1f6;    
            --color-card: #ffffff;  
            --color-primary: #1e88e5; 
            --color-secondary: #5c6bc0;
            --color-danger: #e53935;  
            --color-info: #00acc1;    
            --color-header: #2c3e50;  
            --color-text: #4a6572;    
            --shadow-light: 0 4px 15px rgba(0, 0, 0, 0.08); 
            --shadow-hover: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-bg);
            color: var(--color-text);
            margin: 0;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            box-sizing: border-box;
            opacity: 0; 
            transition: opacity 0.5s ease-in;
        }
        .contenedor {
            max-width: 950px;
            width: 100%;
            margin: 0 auto;
            text-align: center; 
        }
        .main-header {
            margin-bottom: 30px;
            padding: 15px 0;
        }
        .main-header h1 {
            color: var(--color-header);
            font-size: 2.5em;
            font-weight: 700;
            border-bottom: 3px solid var(--color-primary);
            display: inline-block;
            padding-bottom: 10px;
            letter-spacing: 0.5px;
        }
        .menu-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); 
            gap: 25px;
            margin-top: 20px;
        }
        .card-menu {
            background-color: var(--color-card);
            padding: 25px;
            border-radius: 12px;
            box-shadow: var(--shadow-light);
            text-align: left;
            transition: box-shadow 0.3s ease;
            border-top: 5px solid var(--color-primary); 
        }
        .card-menu:hover {
            box-shadow: var(--shadow-hover);
        }
        .card-menu h2 {
            color: var(--color-header);
            font-size: 1.6em;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
            padding-bottom: 10px;
            border-bottom: 1px dashed #cfd8dc;
        }
        .module-group {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #e0e6ed;
            border-radius: 8px;
            background-color: #fcfcfc;
        }
        .module-group h3 {
            color: var(--color-primary);
            font-size: 1.2em;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 10px;
            text-align: center;
        }
        .button-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr)); 
            gap: 10px;
        }
        .btn {
            display: block;
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 0.9em;
            text-align: center;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .btn-primario {
            background-color: var(--color-primary);
        }
        .btn-primario:hover {
            background-color: #1565c0;
        }
        .btn-editar {
            background-color: var(--color-secondary);
        }
        .btn-editar:hover {
            background-color: #455a64; 
        }
        .btn-rojo {
            background-color: var(--color-danger);
        }
        .btn-rojo:hover {
            background-color: #c62828;
        }
        .btn-reporte {
            background-color: var(--color-info);
        }
        .btn-reporte:hover {
            background-color: #00838f;
        }
        @media (max-width: 600px) {
            body {
                padding: 15px;
            }
            .main-header h1 {
                font-size: 1.8em;
                padding-bottom: 5px;
            }
            .menu-container {
                grid-template-columns: 1fr; 
            }
            .button-grid {
                grid-template-columns: 1fr 1fr; 
            }
            .btn {
                font-size: 0.85em;
                padding: 12px 10px;
            }
        }
    </style>
</head>
<body>

<div class="contenedor">
    <header class="main-header">
        <h1 id="welcome-title">Panel de Control del Sistema</h1>
    </header>

    <div class="menu-container">

        <div class="card-menu">
            <h2>🗺️ Rutas y Logística Vehicular</h2>

            <div class="module-group">
                <h3>🧑‍✈️ Choferes   </h3>
                <div class="button-grid">
                    <a class="btn btn-primario" href="chofer_adicion.php">Adicionar</a>
                    <a class="btn btn-editar" href="chofer_modificacion.php">Modificar</a>
                    <a class="btn btn-rojo" href="chofer_eliminacion.php">Eliminar</a>
                    <a class="btn btn-reporte" href="chofer_reporte.php">Reporte</a>
                </div>
            </div>

            <div class="module-group">
                <h3>🚗 Vehículos   </h3>
                <div class="button-grid">
                    <a class="btn btn-primario" href="vehiculo_adicion.php">Adicionar</a>
                    <a class="btn btn-editar" href="vehiculo_modificacion.php">Modificar</a>
                    <a class="btn btn-rojo" href="vehiculo_eliminacion.php">Eliminar</a>
                    <a class="btn btn-reporte" href="vehiculo_reporte.php">Reporte</a>
                </div>
            </div>

            <div class="module-group">
                <h3>📍 Paradas   </h3>
                <div class="button-grid">
                    <a class="btn btn-primario" href="parada_adicion.php">Adicionar</a>
                    <a class="btn btn-editar" href="parada_modificacion.php">Modificar</a>
                    <a class="btn btn-rojo" href="parada_eliminacion.php">Eliminar</a>
                    <a class="btn btn-reporte" href="parada_reporte.php">Reporte</a>
                </div>
            </div>

            <div class="module-group">
                <h3>🔄 Recorridos   </h3>
                <div class="button-grid">
                    <a class="btn btn-primario" href="recorrido_adicion.php">Adicionar</a>
                    <a class="btn btn-editar" href="recorrido_modificacion.php">Modificar</a>
                    <a class="btn btn-rojo" href="recorrido_eliminacion.php">Eliminar</a>
                    <a class="btn btn-reporte" href="recorrido_reporte.php">Reporte</a>
                </div>
            </div>
        </div>
        
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.body.style.opacity = 1;
        function setGreeting() {
            const titleElement = document.getElementById('welcome-title');
            const currentHour = new Date().getHours();
            let greeting = '¡Bienvenido!';

            if (currentHour < 12) {
                greeting = '¡Buenos días! ☀️';
            } else if (currentHour < 19) {
                greeting = '¡Buenas tardes! 🌤️';
            } else {
                greeting = '¡Buenas noches! 🌙';
            }
        }
        setGreeting();
    });

</script>
</body>
</html>