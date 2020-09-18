	<?php
		$bd	= new PDO($dsnw, $userw, $passw, $optPDO);
	 $sql="SELECT * FROM usuarios WHERE idUsuario=$id_usuario";
		$result=$bd->query($sql);
		foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	
			 $usuario=$row['Usuario'];
			 $utelefono=$row['phone'];
			 $uemail=$row['email'];
			  $uempresa=$row['empresa'];
			   $nmiembro=$row['fist_name'];
			   $napellido=$row['last_name'];
			   $ugiro=$row['giro'];
			   $uespecialidad=$row['especialidad'];
			 $imagen=$row['imagen'];
			 $uservicios=$row['servicios'];
			  $estado=$row['Estatus'];
		}

?>
