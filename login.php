<?php session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include("scripts/conn.php");
	$bd	= new PDO($dsnw, $userw, $passw, $optPDO);

	$user=addslashes($_POST["usuario"]);
	$password=addslashes($_POST["pass"]);

	//die($user."  este es el usuario");

	if($user != "" && $password != ""){
		try {
			$md5pass=md5($password);
			$bd->query('SET SQL_SAFE_UPDATES=0;');
			$sql="SELECT usuarios.* FROM usuarios WHERE  email='$user' AND Password='$md5pass' AND  verificado = 1 ";
			$res=$bd->query($sql);
			if($res->rowCount()>0){
				$res=$res->fetchAll(PDO::FETCH_ASSOC);
				$d=$res[0];
				unset($d["password"]);
				$_SESSION['id']=$d["IdUsuario"];
				$_SESSION['email']=$d["email"];
				$_SESSION['country']=$d["country"];
				$_SESSION['phone']=$d["phone"];
				$_SESSION['usuario']=$d["Usuario"];
				$_SESSION['verificado']=$d["verificado"];
				$_SESSION['estatus']=$d["Estatus"];
				$_SESSION['type']=$d["type"];
				
				print "<meta http-equiv='refresh' content='0;URL=".LIGA."/dashboard.php' />";
				exit();
			}else{
			print "<meta http-equiv='refresh' content='0;URL=".LIGA."/index.php?status=2' />";
			}
		} catch (Exception $e) {
							print "<meta http-equiv='refresh' content='0;URL=".LIGA."/index.php?status=2' />";

		}
	}else{
					print "<meta http-equiv='refresh' content='0;URL=".LIGA."/index.php?status=2' />";

	}

	//die("si entro ");

?>