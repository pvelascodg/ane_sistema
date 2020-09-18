<?php session_start();
error_reporting(error_reporting() & ~E_NOTICE);
	$id_usuario = $_SESSION['id'];
	$cargo=$_SESSION["Cargo"];
	$username=$_SESSION["usuario"];
	$permiso=$_SESSION["permiso"];
	$country=$_SESSION["country"];
	$lastname=$_SESSION["last_name"];
	$email=$_SESSION["email"];
	$phone=$_SESSION["phone"];
	
?>