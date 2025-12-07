<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Eliminar Agendación</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="main-container">
		<h1>ELiminar Agenda</h1>
		<form action="agenda_eliminacion2.php" method="post">
			Ingrese ID DE LA AGENDACION: <input type="number" name="ida">
			<input  class="button-group btn btn-primary" type="submit" value="Elimine">
		</form>
	<div style="text-align:center; margin-top:20px;">
		<button onclick="history.back()" class="button-group btn btn-primary">Volver</button>
	</div>
</div>
</body>
</html>
