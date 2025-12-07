<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Adicionar Agendación</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="main-container">
<form action="agenda_adicion2.php" method="post">
	<h1>Adicionar Agendación</h1>

	IDAGENDACION: <input type="number" name="ida"><br>
	FECHA: <input type="date" name="fec"><br>
	HORA: <input type="time" name="hor"><br>
	ACTIVIDAD: <input type="text" name="act"><br>
	COMPLETADO (0/1): <input type="number" name="com"><br>
	IDPERSONA: <input type="number" name="idp"><br>

	<input  class="button-group btn btn-primary" type="submit" value="Adicione">
</form>
	<div style="text-align:center; margin-top:20px;">
		<button onclick="history.back()" class="button-group btn btn-primary">Volver</button>
	</div>
</div>
</body>
</html>