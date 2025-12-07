<?php
include("conecte.php");

if (!isset($_POST['idp_original']) || !isset($_POST['pun']) || !isset($_POST['des'])) {
    die("<div style='color:red; text-align:center;'>Error de datos. Vuelva al inicio. <a href='parada_modificacion1.php'>Buscar Parada</a></div>");
}

$idp_original = mysqli_real_escape_string($conexion, $_POST['idp_original']);
$pun_nuevo    = mysqli_real_escape_string($conexion, $_POST['pun']);
$des_nuevo    = mysqli_real_escape_string($conexion, $_POST['des']);

$update_query = "UPDATE parada SET 
                    puntoparada = '$pun_nuevo', 
                    descripcion = '$des_nuevo'
                 WHERE idparada = '$idp_original'";

$result = mysqli_query($conexion, $update_query);
header(header: 'Location: parada_reporte.php');
?>