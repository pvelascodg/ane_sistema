<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	@$id_usuario = $_SESSION["id"];
	@$username=$_SESSION['usuario'];
	@$permiso=$_SESSION["permiso"];
	@$estatus=$_SESSION["Estatus"];
	@$verificado=$_SESSION["verificado"];
	@$email=$_SESSION["email"];
	@$phone=$_SESSION["phone"];
	echo @$type=$_SESSION["type"];
	if(empty($_SESSION["id"]) ) 
			{
				//include('logout.php');
			}		
	include ("../scripts/conn.php");
	$bd	= new PDO($dsnw, $userw, $passw, $optPDO);
	echo $sql="SELECT * FROM usuarios WHERE idUsuario=$id_usuario";
		@$result=$bd->query($sql);
		foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	
			 $usuario=$row['Usuario'];
			 $phone=$row['phone'];
			 $email=$row['email'];
			 $imagen=$row['imagen'];
		}			
?>	