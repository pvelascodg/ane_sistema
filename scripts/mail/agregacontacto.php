<?php

include ("conn2.php");

$nombre= $_POST["nombre"];
$apellidos= $_POST["apellidos"];
$correo= $_POST["correo"];
$comentarios= $_POST["comentarios"];

$insertar = "INSERT INTO Contacto(Nombre,Apellidos,CorreoElectronico,Comentarios) VALUES ('$nombre', '$apellidos','$correo','$comentarios')";

$resultado=mysqli_query($conexion,$insertar);


if(!$resultado){
	echo "Error al registrarse";
}
else{

	echo "Contacto registrado";
}

mysqli_close($conexion);

?>

