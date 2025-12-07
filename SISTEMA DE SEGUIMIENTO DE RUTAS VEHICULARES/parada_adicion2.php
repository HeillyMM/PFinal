<?php
include("conecte.php");

echo $pun = $_POST['pun'];
echo $des = $_POST['des'];

$re = "INSERT INTO parada(puntoparada, descripcion) 
       VALUES ('".$pun."', '".$des."')";
$re = mysqli_query($conexion, $re);
header('Location: parada_adicion.php');
?>
