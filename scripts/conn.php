<?php 
//Conexión PDO en localhost

	$dsnw="mysql:host=dev.amdenegocios.com; dbname=devamde_wwwamde_bd; charset=utf8";
	$userw="devamde";
	$passw="VGICSbHfvigIicgoFp";
	$optPDO=array(PDO::ATTR_EMULATE_PREPARES=>false, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	//datos de servidor
	@define("HOST",$_SERVER['HTTP_HOST']);
	@define("LIGA","HTTP://".$_SERVER['HTTP_HOST']);
	?>