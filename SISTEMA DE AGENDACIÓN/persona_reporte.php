<?php
	include("conecte.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Reporte de Personas</title>
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
    max-width: 900px;
    width: 95%;
    text-align: center;
}

h1 {
    font-family: 'Poppins', sans-serif;
    color: var(--color-primary);
    font-size: 2.2em;
    font-weight: 700;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

table, th, td {
    border: 1px solid #eceff1;
}

th, td {
    padding: 10px;
    text-align: center;
}

th {
    background-color: var(--color-background);
}

tr:nth-child(even) {
    background-color: #f9fafb;
}

.btn {
    display: inline-block;
    border: none !important;
    text-decoration: none;
    color: white;
    padding: 12px 15px;
    border-radius: 8px;
    font-weight: 700;
    transition: all 0.2s ease-in-out;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    font-size: 0.95em;
    cursor: pointer;
    margin-top: 15px;
}

.btn-primary { background-color: var(--color-primary); }
.btn-primary:hover { background-color: #4c7c88; transform: translateY(-2px); box-shadow: 0 6px 10px rgba(0,0,0,0.15); }

@media (max-width: 480px) {
    .main-container {
        padding: 20px;
    }
}
</style>
</head>
<body>
<div class="main-container">
<h1>Reporte Personas</h1>
<table>
<tr>
	<th>ID</th>
	<th>Nombre</th>
	<th>Paterno</th>
	<th>Materno</th>
	<th>Fecha Nac.</th>
</tr>
<?php
$ls="SELECT * FROM persona";
$ls=mysqli_query($conexion,$ls);
while($r=mysqli_fetch_array($ls))
{
?>
<tr>
	<td><?php echo $r[0]; ?></td>
	<td><?php echo $r[1]; ?></td>
	<td><?php echo $r[2]; ?></td>
	<td><?php echo $r[3]; ?></td>
	<td><?php echo $r[4]; ?></td>
</tr>
<?php
}
?>
</table>
<div style="text-align:center; margin-top:20px;">
<button onclick="history.back()" class="btn btn-primary">Volver</button>
</div>
</div>
</body>
</html>
