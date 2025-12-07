<?php
	include("conecte.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reporte de Personas</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="main-container">
	<h1>Reporte Personas</h1>
	<table border="2">
		<tr>
			<td>ID</td>
			<td>Nombre</td>
			<td>Paterno</td>
			<td>Materno</td>
			<td>Fecha Nac.</td>
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
		<button onclick="history.back()" class="button-group btn btn-primary">Volver</button>
	</div>
</div>
</body>
</html>
