<?php
include("conecte.php");

echo $idc = $_POST['idc'];
echo $idv = $_POST['idv'];
echo $idp = $_POST['idp'];
echo $fec = $_POST['fec'];
echo $hor = $_POST['hor'];

$re = "INSERT INTO recorrido(idchofer, idvehiculo, idparada, fecha, hora)
       VALUES ('".$idc."', '".$idv."', '".$idp."', '".$fec."', '".$hor."')";
$re = mysqli_query($conexion, $re);
header('Location: recorrido_adicion.php');
?>