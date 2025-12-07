<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Modificar Agendación</title>
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
    margin-bottom: 5px;
}

form {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 15px;
}

label {
    font-weight: 600;
    text-align: left;
}

input[type="text"], input[type="number"], input[type="date"], input[type="time"], select {
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #cfd8dc;
    font-size: 1em;
    width: 100%;
}

input[type="submit"], button {
    cursor: pointer;
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
}

.btn-primary { background-color: var(--color-primary); }
.btn-primary:hover { background-color: #4c7c88; transform: translateY(-2px); box-shadow: 0 6px 10px rgba(0,0,0,0.15); }

.btn-secondary { background-color: var(--color-secondary); }
.btn-secondary:hover { background-color: #7f9c97; transform: translateY(-2px); box-shadow: 0 6px 10px rgba(0,0,0,0.15); }

@media (max-width: 480px) {
    .main-container {
        padding: 20px;
    }
}
</style>
</head>
<body>
<div class="main-container">
<h1>Modificar Agendación</h1>
<form id="formModificar" action="agenda_modificacion2.php" method="POST">
<label>ID</label>
<input type="number" name="ida" required>
<label>Fecha</label>
<input type="date" name="fec" required>
<label>Hora</label>
<input type="time" name="hor" required>
<label>Actividad</label>
<input type="text" name="act" required>
<label>Completado (0/1)</label>
<input type="number" name="com" min="0" max="1" required>
<label>ID Persona</label>
<input type="number" name="idp" required>
<input type="submit" class="btn btn-primary" value="Modifique">
</form>
<div style="text-align:center; margin-top:20px;">
<button onclick="history.back()" class="btn btn-secondary">Volver</button>
</div>
</div>
<script>
document.getElementById("formModificar").addEventListener("submit", function(e){
    const comp = document.querySelector('input[name="com"]').value;
    if(comp !== "0" && comp !== "1"){
        e.preventDefault();
        alert("El campo COMPLETADO debe ser 0 o 1");
    }
});
</script>
</body>
</html>
