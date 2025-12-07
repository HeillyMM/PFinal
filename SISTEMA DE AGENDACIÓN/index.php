<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGENDA - MENÚ PRINCIPAL</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="main-container"> 
        <header>
            <h1>📅 SISTEMA DE AGENDACIÓN</h1>
        </header>

        <div class="menu-section">
            <h2> GESTIÓN DE PERSONAS</h2>
            <nav class="button-group">
                <a href="persona_adicion.php" class="btn btn-primary">Adicionar Persona</a>
                <a href="persona_modificacion.php" class="btn btn-secondary">Modificar Persona</a>
                <a href="persona_eliminacion.php" class="btn btn-danger">Eliminar Persona</a>
                <a href="persona_reporte.php" class="btn btn-info">Reporte de Personas</a>
            </nav>
        </div>

        <hr>

        <div class="menu-section">
            <h2> GESTIÓN DE AGENDACIONES</h2>
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