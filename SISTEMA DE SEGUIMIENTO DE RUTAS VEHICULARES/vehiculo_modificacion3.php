<?php
include("conecte.php");

if (
    !isset($_POST['idv_original']) || 
    !isset($_POST['pla']) || 
    !isset($_POST['col']) || 
    !isset($_POST['mod']) || 
    !isset($_POST['tip'])
) {
    die("<div style='color:red; text-align:center;'>Error de datos. Vuelva al inicio. <a href='vehiculo_modificacion1.php'>Buscar Vehículo</a></div>");
}

$idv_original = mysqli_real_escape_string($conexion, $_POST['idv_original']);
$pla_nuevo    = mysqli_real_escape_string($conexion, $_POST['pla']);
$col_nuevo    = mysqli_real_escape_string($conexion, $_POST['col']);
$mod_nuevo    = mysqli_real_escape_string($conexion, $_POST['mod']);
$tip_nuevo    = mysqli_real_escape_string($conexion, $_POST['tip']);

$update_query = "UPDATE vehiculo SET 
                    placa = '$pla_nuevo', 
                    color = '$col_nuevo', 
                    modelo = '$mod_nuevo', 
                    tipo = '$tip_nuevo' 
                 WHERE idvehiculo = '$idv_original'";

$result = mysqli_query($conexion, $update_query);
header(header: 'Location: vehiculo_reporte.php');
?>