<?php
include("conecte.php");

if (
    !isset($_POST['idr_original']) || 
    !isset($_POST['idc']) || 
    !isset($_POST['idv']) || 
    !isset($_POST['idp']) || 
    !isset($_POST['fec']) || 
    !isset($_POST['hor'])
) {
    die("<div style='color:red; text-align:center;'>Error de datos. Vuelva al inicio. <a href='recorrido_modificacion1.php'>Buscar Recorrido</a></div>");
}

$idr_original = mysqli_real_escape_string($conexion, $_POST['idr_original']);
$idc_nuevo    = mysqli_real_escape_string($conexion, $_POST['idc']);
$idv_nuevo    = mysqli_real_escape_string($conexion, $_POST['idv']);
$idp_nuevo    = mysqli_real_escape_string($conexion, $_POST['idp']);
$fec_nuevo    = mysqli_real_escape_string($conexion, $_POST['fec']);
$hor_nuevo    = mysqli_real_escape_string($conexion, $_POST['hor']);

$update_query = "UPDATE recorrido SET 
                    idchofer = '$idc_nuevo', 
                    idvehiculo = '$idv_nuevo', 
                    idparada = '$idp_nuevo', 
                    fecha = '$fec_nuevo', 
                    hora = '$hor_nuevo'
                 WHERE idrecorrido = '$idr_original'";

$result = mysqli_query($conexion, $update_query);
header(header: 'Location: recorrido_reporte.php');
?>