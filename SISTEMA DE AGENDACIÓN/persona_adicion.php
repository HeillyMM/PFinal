<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Adicionar Persona</title>
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
    margin-bottom: 20px;
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
<form id="formPersona" action="persona_adicion2.php" method="post">
<h1>Adicionar Persona</h1>
<label>ID Persona</label>
<input type="number" name="idp" required>
<label>Nombre</label>
<input type="text" name="nom" required>
<label>Paterno</label>
<input type="text" name="pat" required>
<label>Materno</label>
<input type="text" name="mat" required>
<label>Fecha de Nacimiento</label>
<input type="date" name="fec" required>
<input type="submit" class="btn btn-primary" value="Adicione">
</form>
<div style="text-align:center; margin-top:20px;">
<button onclick="history.back()" class="btn btn-secondary">Volver</button>
</div>
</div>
<script>
document.getElementById("formPersona").addEventListener("submit", function(e){
    const nombre = document.querySelector('input[name="nom"]').value.trim();
    const paterno = document.querySelector('input[name="pat"]').value.trim();
    const materno = document.querySelector('input[name="mat"]').value.trim();
    if(nombre === "" || paterno === "" || materno === ""){
        e.preventDefault();
        alert("Todos los campos de texto son obligatorios");
    }
});
</script>
</body>
</html>
