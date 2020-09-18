<?php session_start();
error_reporting(0);
include("conn.php");
	header("Content-type: application/json");
	$bd	= new PDO($dsnw, $userw, $passw, $optPDO);

	
	$combo=$_POST['accion'];
	$idR=$_POST['idR'];
	$id=addslashes($_POST['id']);
	$invitado=addslashes($_POST['invitado']);
	$visitas=addslashes($_POST['visitas']);
	$miembros=addslashes($_POST['miembros']);
	$referencia=addslashes($_POST['referencia']);
	$monto=$_POST['monto'];
	$porcentaje=$_POST['porcentaje'];
	$comision=$_POST['comision'];
	$pagado=$_POST['pagado'];
	$fecha=$_POST['fecha'];
	$pagadoa=$_POST['pagadoa'];
	$giro=$_POST['giro'];
	$empresa=$_POST['empresa'];
	$servicios=$_POST['servicios'];
	$anios=$_POST['anios'];
	$telefono=$_POST['telefono'];
	$email=$_POST['email'];
	$redes=$_POST['redes'];
	$pass=md5($_POST['pass']);	
	
	
	if($combo=="get"){
		try{
		$result=$bd->query("select * from usuarios where IdUsuario != $id and type = 2");
		foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {			
			}
			$r=$row;
		}catch(Exception $e){
			$r["continuar"]=$e;
		}
		echo json_encode($r);
		
	}if($combo=="getMiembros"){
		
		try {
			$sql="SELECT * FROM usuarios WHERE IdUsuario != $id AND type != 0";
			$res=$bd->query($sql);
			$r="<option value=''>Elige un Miembro</option>";
			foreach($res->fetchAll(PDO::FETCH_ASSOC) as $row){
				$r.='<option value="'.$row["IdUsuario"].'">'.$row["fist_name"].' '.$row["last_name"].'</option>';
			}
		}catch(PDOException $err){
			$r=false;
		}
		echo json_encode($r);
		
	}if($combo=="getGiros"){
		
		try {
			$sql="SELECT * FROM giro ";
			$res=$bd->query($sql);
			$r="<option value=''>Elige un Giro</option>";
			foreach($res->fetchAll(PDO::FETCH_ASSOC) as $row){
				$r.='<option value="'.$row["id"].'">'.$row["nombre"].'</option>';
			}
		}catch(PDOException $err){
			$r=false;
		}
		echo json_encode($r);
		
	}else if($combo=='guardaMiembro'){
		try {
			
				$sql ="INSERT INTO vis (fecha,id_usuario,tipo,persona,fechar) VALUES (NOW(),$id,'Miembro','$miembros','$fecha')";
		
			
			$bd->query($sql);
			$r["continuar"]=true;
		} catch (Exception $e) {
			$r["continuar"]=$sql;
		}
		$r["sql"]=$sql;
		echo json_encode($r);
	}else if($combo=='guardaInvitado'){
		try {
			
				$sql ="INSERT INTO vis (fecha,id_usuario,tipo,persona,fechar) VALUES (NOW(),$id,'Invitado','$invitado','$fecha')";
			
			
			$bd->query($sql);
			$r["continuar"]=true;
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		echo json_encode($r);
	}else if($combo=='guardaReferencia'){
		try {
			
				$sql ="INSERT INTO referencias (fecha,id_usuario,referencia) VALUES (NOW(),$id,'$referencia')";
			
			
			$bd->query($sql);
			$r["continuar"]=true;
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		echo json_encode($r);
	}else if($combo=='guardaVisitas'){
		try {
			
				$sql ="INSERT INTO invitados (fecha,id_usuario,invitado,giro,empresa,servicios,anios,telefono,email,redes,no_visitas) VALUES (NOW(),$id,'$invitado','$giro','$empresa','$servicios','$anios','$telefono','$email','$redes',$visitas)";
			
			
			$bd->query($sql);
			$r["continuar"]=true;
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		echo json_encode($r);
	}
	else if($combo=='guardaNegocio'){
		try {
			
				$sql ="INSERT INTO negocios (fecha,id_usuario,miembro,monto,porcentaje,comision,pagado,pagadoa,fechar,tipo) VALUES (NOW(),$id,$miembros,'$monto','$porcentaje','$comision','$pagado',$pagadoa,'$fecha','Miembro')";
			
			
			$bd->query($sql);
			$r["continuar"]=true;
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		echo json_encode($r);
	}else if($combo=='guardaNegocioi'){
		try {
			
				$sql ="INSERT INTO negocios (fecha,id_usuario,miembro,monto,porcentaje,comision,pagado,pagadoa,fechar,tipo) VALUES (NOW(),$id,'$invitado','$monto','$porcentaje','$comision','$pagado',$pagadoa,'$fecha','Persona')";
			
			
			$bd->query($sql);
			$r["continuar"]=true;
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		echo json_encode($r);
	}else if($combo=='guardaPass'){
		try {
			
				 $sql="update usuarios set Password = '$pass' where IdUsuario = $id;";
				$bd->query($sql);
			$r["continuar"]=true;
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		echo json_encode($r);
	}
	


	?>