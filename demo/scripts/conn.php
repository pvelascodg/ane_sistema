<?php
//Conexión PDO en localhost
	$dsnw="mysql:host=localhost; dbname=wwwamde_bd; charset=utf8";
	$userw="wwwamde_user";
	$passw="sistema.2020*";
	$optPDO=array(PDO::ATTR_EMULATE_PREPARES=>false, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	//datos de servidor
	@define("HOST",$_SERVER['HTTP_HOST']);
	@define("LIGA","HTTP://".$_SERVER['HTTP_HOST']."/demo");
	?>