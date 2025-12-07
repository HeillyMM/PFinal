<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Eliminar Persona</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="main-container">
	<h1>Eliminar Persona</h1>
	<form action="persona_eliminacion2.php" method="post">
		Ingrese ID DE LA PERSONA: <input type="number" name="idp">
		<input class="button-group btn btn-primary" type="submit" value="Elimine">
	</form>
	<div style="text-align:center; margin-top:20px;">
		<button onclick="history.back()" class="button-group btn btn-primary">Volver</button>
	</div>
</div>
</body>
</html>
