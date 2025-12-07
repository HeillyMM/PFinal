<?php 
include("conecte.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Recorridos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --color-bg: #eef1f6;
            --color-card: #ffffff;
            --color-info: #00acc1; 
            --color-header: #2c3e50;
            --color-text: #4a6572;
            --color-table-border: #e0e6ed;
            --color-table-header: #f4f6f9;
            --shadow-soft: 0 4px 10px rgba(0, 0, 0, 0.05);
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-bg);
            color: var(--color-text);
            margin: 0;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        .report-container {
            background-color: var(--color-card);
            padding: 30px;
            border-radius: 12px;
            box-shadow: var(--shadow-soft);
            max-width: 1100px; 
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
            border-top: 5px solid var(--color-info);
            overflow-x: auto;
        }
        h1 {
            color: var(--color-header);
            font-weight: 700;
            font-size: 2em;
            margin-bottom: 25px;
            color: var(--color-info);
        }
        .data-table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden; 
        }
        .data-table th, .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--color-table-border);
        }
        .data-table th {
            background-color: var(--color-table-header);
            color: var(--color-header);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85em;
        }
        .data-table tbody tr:hover {
            background-color: #f0f8ff;
        }
        .data-table tbody tr:nth-child(even) {
            background-color: #f9fbfd;
        }
        .empty-message {
            padding: 20px;
            color: var(--color-text);
            font-style: italic;
            border: 1px solid var(--color-table-border);
            border-radius: 8px;
            margin-top: 20px;
        }
        .back-link {
            display: inline-block;
            margin-top: 30px;
            background-color: var(--color-header);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.2s, transform 0.1s;
        }
        .back-link:hover {
            background-color: #3f51b5;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <div class="report-container">
        <h1>Reporte de Recorridos Programados</h1>

        <?php
        $query = "
            SELECT 
                r.idrecorrido, 
                c.nombrecompleto, 
                v.placa, 
                p.puntoparada, 
                DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha_formato,
                r.hora
            FROM recorrido r
            INNER JOIN chofer c ON r.idchofer = c.idchofer
            INNER JOIN vehiculo v ON r.idvehiculo = v.idvehiculo
            INNER JOIN parada p ON r.idparada = p.idparada
            ORDER BY r.fecha DESC, r.hora ASC
        ";

        $ls = mysqli_query($conexion, $query);
        if (!$ls) {
            echo "<div class='empty-message'>Error al ejecutar la consulta: " . mysqli_error($conexion) . "</div>";
            $count = 0;
        } else {
            $count = mysqli_num_rows($ls);
        }
        ?>

        <?php if ($count > 0): ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Chofer</th>
                        <th>Vehículo (Placa)</th>
                        <th>Parada Inicial</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($r = mysqli_fetch_array($ls)) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($r[0]); ?></td>
                        <td><?php echo htmlspecialchars($r[1]); ?></td>
                        <td><?php echo htmlspecialchars($r[2]); ?></td>
                        <td><?php echo htmlspecialchars($r[3]); ?></td>
                        <td><?php echo htmlspecialchars($r[4]); ?></td>
                        <td><?php echo htmlspecialchars($r[5]); ?></td>
                    </tr>
                    <?php } 
                    mysqli_free_result($ls);
                    ?>
                </tbody>
            </table>
        <?php elseif ($count == 0): ?>
            <div class="empty-message">
                No hay **Recorridos** programados en el sistema.
            </div>
        <?php endif; ?>
        
        <?php 
        if (isset($conexion)) {
            mysqli_close($conexion);
        }
        ?>
    </div>

    <a href="index.php" class="back-link">← Volver al Menú Principal</a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.querySelector('.data-table tbody');
            if (table) {
                const rowCount = table.querySelectorAll('tr').length;
                const title = document.querySelector('.report-container h1');
                if (rowCount > 0) {
                    title.innerHTML += ` (${rowCount} Recorridos)`;
                }
            }
        });
    </script>
</body>
</html>