<?php 
session_start(); 
	$id_usuario = $_SESSION['id'];	
	$email=$_SESSION['email'];
	$phone=$_SESSION['phone'];
	$type=$_SESSION['type'];

	if(empty($_SESSION['id']) ) 
			{
				include('logout.php');
			}		
	include ("scripts/conn.php");
	include("scripts/consulta_usuario.php");		

?>