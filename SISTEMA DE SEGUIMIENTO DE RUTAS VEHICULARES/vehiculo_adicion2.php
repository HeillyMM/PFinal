<?php
include("conecte.php");

echo $pla = $_POST['pla'];
echo $col = $_POST['col'];
echo $mod = $_POST['mod'];
echo $tip = $_POST['tip'];

$re = "INSERT INTO vehiculo(placa, color, modelo, tipo)
       VALUES ('".$pla."', '".$col."', '".$mod."', '".$tip."')";
$re = mysqli_query($conexion, $re);
header('Location: vehiculo_adicion.php');
?>