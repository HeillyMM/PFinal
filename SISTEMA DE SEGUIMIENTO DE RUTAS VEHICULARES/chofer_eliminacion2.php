<?php
include("conecte.php");
$el = "DELETE FROM chofer WHERE idchofer='".$_POST['idc']."'";
$el = mysqli_query($conexion, $el);
header(header: 'Location: chofer_eliminacion.php');
?>
