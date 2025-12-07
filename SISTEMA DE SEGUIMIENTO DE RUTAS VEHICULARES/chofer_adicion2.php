<?php
include("conecte.php");

echo $nom = $_POST['nom'];

$re = "INSERT INTO chofer(nombrecompleto) 
       VALUES ('".$nom."')";
$re = mysqli_query($conexion, $re);
header('Location: chofer_adicion.php');
?>
