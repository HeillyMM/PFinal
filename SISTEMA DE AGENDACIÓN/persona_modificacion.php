<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar Persona</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="main-container">
	<form action="persona_modificacion2.php" method="POST">
		<h1>Modificar Persona</h1>

		ID: <input type="number" name="idp"><br>
		NOMBRE: <input type="text" name="nom"><br>
		PATERNO: <input type="text" name="pat"><br>
		MATERNO: <input type="text" name="mat"><br>
		FECHA NAC.: <input type="date" name="fec"><br>

		<input class="button-group btn btn-primary" type="submit" value="Modifique">
	</form>
	<div style="text-align:center; margin-top:20px;">
		<button onclick="history.back()" class="button-group btn btn-primary">Volver</button>
	</div>
</div>
</body>
</html>
