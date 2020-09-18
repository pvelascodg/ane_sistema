	<?php
		$bd	= new PDO($dsnw, $userw, $passw, $optPDO);
		$sql="SELECT * FROM usuarios WHERE idUsuario=$id_usuario";
		$result=$bd->query($sql);
		foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	
			 $usuario=$row['Usuario'];
			 $phone=$row['phone'];
			 $email=$row['email'];
			 $imagen=$row['imagen'];
		}

?>
