<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AGENDA - MENÚ PRINCIPAL</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@600&display=swap');

:root {
    --color-primary: #4c7c88;
    --color-secondary: #7f9c97;
    --color-danger: #8fad87;
    --color-info: #cadf90;
    --color-text: #37474f;
    --color-background: #f4f6f9;
    --color-card: #ffffff;
}

body {
    font-family: 'Roboto', sans-serif;
    background-color: var(--color-background);
    color: var(--color-text);
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
}

.main-container {
    background-color: var(--color-card);
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    max-width: 700px;
    width: 95%;
    text-align: center;
}

h1 {
    font-family: 'Poppins', sans-serif;
    color: var(--color-primary);
    font-size: 2.2em;
    font-weight: 700;
    margin-bottom: 30px;
}

h2 {
    color: var(--color-text);
    font-weight: 600;
    font-size: 1.4em;
    margin-top: 25px;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 2px solid #eceff1;
    padding-bottom: 5px;
}

.button-group {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-top: 15px;
}

a.btn {
    display: inline-block;
    text-decoration: none;
    color: white;
    padding: 12px 15px;
    border-radius: 8px;
    font-weight: 700;
    transition: all 0.2s ease-in-out;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    text-align: center;
    font-size: 0.95em;
}

.btn-primary { background-color: var(--color-primary); }
.btn-primary:hover { background-color: #4c7c88; transform: translateY(-2px); box-shadow: 0 6px 10px rgba(0,0,0,0.15); }

.btn-secondary { background-color: var(--color-secondary); }
.btn-secondary:hover { background-color: #7f9c97; transform: translateY(-2px); box-shadow: 0 6px 10px rgba(0,0,0,0.15); }

.btn-danger { background-color: var(--color-danger); }
.btn-danger:hover { background-color: #8fad87; transform: translateY(-2px); box-shadow: 0 6px 10px rgba(0,0,0,0.15); }

.btn-info { background-color: var(--color-info); color:#37474f;}
.btn-info:hover { background-color: #cadf90; transform: translateY(-2px); box-shadow: 0 6px 10px rgba(0,0,0,0.15); }

hr {
    border: none;
    height: 1px;
    background: linear-gradient(to right, #eceff1, #cfd8dc, #eceff1);
    margin: 25px 0;
}

@media (max-width: 480px) {
    .button-group {
        grid-template-columns: 1fr;
    }
    .main-container {
        padding: 20px;
    }
}
</style>
</head>
<body>
<div class="main-container"> 
<header>
<h1>📅 SISTEMA DE AGENDACIÓN</h1>
</header>

<div class="menu-section">
<h2>GESTIÓN DE PERSONAS</h2>
<nav class="button-group">
<a href="persona_adicion.php" class="btn btn-primary">Adicionar Persona</a>
<a href="persona_modificacion.php" class="btn btn-secondary">Modificar Persona</a>
<a href="persona_eliminacion.php" class="btn btn-danger">Eliminar Persona</a>
<a href="persona_reporte.php" class="btn btn-info">Reporte de Personas</a>
</nav>
</div>

<hr>

<div class="menu-section">
<h2>GESTIÓN DE AGENDACIONES</h2>
<nav class="button-group">
<a href="agenda_adicion.php" class="btn btn-primary">Adicionar Agendación</a>
<a href="agenda_modificacion.php" class="btn btn-secondary">Modificar Agendación</a>
<a href="agenda_eliminacion.php" class="btn btn-danger">Eliminar Agendación</a>
<a href="agenda_reporte.php" class="btn btn-info">Reporte de Agendaciones</a>
</nav>
</div>

</div>
</body>
</html>
