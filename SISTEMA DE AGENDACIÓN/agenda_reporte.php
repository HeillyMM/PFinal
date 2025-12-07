<?php
	include("conecte.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reporte Agendaciones</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="main-container">
	<h1>Agenda Reporte</h1>
<table border="2">
	<tr>
		<td>ID</td>
		<td>Fecha</td>
		<td>Hora</td>
		<td>Actividad</td>
		<td>Completado</td>
		<td>ID Persona</td>
	</tr>

	<?php
	$ls="SELECT * FROM agendacion";
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
		<td><?php echo $r[5]; ?></td>
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
