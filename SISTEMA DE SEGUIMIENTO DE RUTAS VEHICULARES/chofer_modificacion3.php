<?php
include("conecte.php");
if (!isset($_POST['idc_original']) || !isset($_POST['nom'])) {
    die("<div style='color:red; text-align:center;'>Error de datos. Vuelva al inicio. <a href='chofer_modificacion1.php'>Buscar Chofer</a></div>");
}

$idc_original = mysqli_real_escape_string($conexion, $_POST['idc_original']);
$nom_nuevo    = mysqli_real_escape_string($conexion, $_POST['nom']);
$update_query = "UPDATE chofer SET 
                    nombrecompleto = '$nom_nuevo'
                 WHERE idchofer = '$idc_original'";

$result = mysqli_query($conexion, $update_query);
header(header: 'Location: chofer_reporte.php');
?>