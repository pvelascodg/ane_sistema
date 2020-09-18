<?php session_start();
error_reporting(0);
include("conn.php");
	header("Content-type: application/json");
	$bd	= new PDO($dsnw, $userw, $passw, $optPDO);
	date_default_timezone_set('America/Toronto');

	require_once('mail/class.phpmailer.php');
	include("mail/class.smtp.php");
	$mail             = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	 //$mail->IsSMTP(); telling the class to use SMTP
	$mail->Host       = "mail.amdenegocios.com"; // SMTP server
	$mail->SMTPDebug  = false;                     // enables SMTP debug information (for testing)
											   // 1 = errors and messages
											   // 2 = messages only
	$mail->SMTPAuth   = false;  
	$mail->SMTPSecure = false;                // enable SMTP authentication
	$mail->Host       = "mail.amdenegocios.com"; // sets the SMTP server
	$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
	$mail->Username   = "webmaster@amdenegocios.com"; // SMTP account username
	$mail->Password   = "webmaster.10";        // SMTP account password
	$mail->SetFrom("webmaster@amdenegocios.com", 'ANE');
	
	
	
	
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
	$face=$_POST['face'];
	$insta=$_POST['insta'];
	$link=$_POST['link'];
	$pass=md5($_POST['pass']);	
	$reunion=$_POST['reunion'];
	$tratamiento=$_POST['tratamiento'];
	$profesiones=$_POST['profesiones'];
	$especialidad=$_POST['especialidad'];
	$redireccion=$_POST['redireccion'];
	$invitadop=$_POST['invitadop'];
	$nombre=$_POST['nombre'];
	$caliente=$_POST['caliente'];
	$tipo=$_POST['tipo'];
	$descripcion=$_POST['descripcion'];
	$select = $_POST['select'];
	$estado = $_POST['estado'];
	
	
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
			$sql="SELECT * FROM usuarios WHERE IdUsuario != $id  AND  Estatus = 'Activo' ORDER BY empresa ASC";
			$res=$bd->query($sql);
			$r="<option value=''>Elige un Miembro</option>";
			foreach($res->fetchAll(PDO::FETCH_ASSOC) as $row){
				$r.='<option value="'.$row["IdUsuario"].'">'.$row["empresa"].'</option>';
			}
		}catch(PDOException $err){
			$r=false;
		}
		echo json_encode($r);
		
	}if($combo=="getMiembrosO"){
		
		try {
			$sql="SELECT * FROM usuarios WHERE IdUsuario != $id AND Estatus = 'Activo' ORDER BY empresa ASC";
			$res=$bd->query($sql);
			$r="<option value=''>Elige un Miembro</option>";//<option value='Otro'>NO ES MIEMBRO</option>
			foreach($res->fetchAll(PDO::FETCH_ASSOC) as $row){
				$r.='<option value="'.$row["IdUsuario"].'">'.$row["empresa"].'</option>';
			}
		}catch(PDOException $err){
			$r=false;
		}
		echo json_encode($r);
		
	}if($combo=="getMiembrosN"){
		
		try {
			$sql="SELECT * FROM usuarios WHERE IdUsuario != $id AND  Estatus = 'Activo' ORDER BY empresa ASC";
			$res=$bd->query($sql);
			$r="<option value=''>Elige un Miembro</option>
			<option value='Otro'>NO ES MIEMBRO</option>
			<option value='NA'>No Aplica</option>";
			foreach($res->fetchAll(PDO::FETCH_ASSOC) as $row){
				$r.='<option value="'.$row["IdUsuario"].'">'.$row["empresa"].'</option>';
			}
		}catch(PDOException $err){
			$r=false;
		}
		echo json_encode($r);
		
	}if($combo=="getProfesiones"){
		
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
		
	}if($combo=="getEspecialidades"){	
		try {
			$sql="SELECT * FROM especialidad WHERE id_profesion = $id ";
			$res=$bd->query($sql);
			$r="<option value=''>Elige una Especialidad</option>";
			foreach($res->fetchAll(PDO::FETCH_ASSOC) as $row){
				if($select == $row["id"]){ $selected = "selected"; }
				$r.='<option value="'.$row["id"].'" '.$selected.'>'.$row["especialidad"].'</option>';
				$selected = "";
			}
		}catch(PDOException $err){
			$r=false;
		}
		$r["sql"]=$sql1;
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
				if($miembros == "Otro"){		
					$sql ="INSERT INTO vis (fecha,id_usuario,tipo,persona,fechar,reunion) VALUES (NOW(),$id,'No es Miembro','$invitado','$fecha','$reunion')";
				}else{
					$sql ="INSERT INTO vis (fecha,id_usuario,tipo,persona,fechar,reunion) VALUES (NOW(),$id,'Miembro','$miembros','$fecha','$reunion')";
				}
				
			$bd->query($sql);
			$r["continuar"]=true;
			$result3 = $bd->query("SELECT MAX(id) as id FROM vis ");
					foreach ($result3->fetchAll(PDO::FETCH_ASSOC) as $row3) {	
						$lastid = $row3['id'];
					}			
			$result = $bd->query("SELECT v.*, fist_name, last_name,u.email as emaile FROM vis v, usuarios u WHERE id_usuario = IdUsuario and v.id = $lastid");
											foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	
												$persona = $row['persona'];
												$nombre = $row['persona'];
												$envio = $row['fist_name'];
												$emaile = $row['emaile'];
												if($row['tipo'] == 'Miembro'){
												$result2 = $bd->query("SELECT fist_name, last_name, email FROM usuarios WHERE IdUsuario = $persona");
												foreach ($result2->fetchAll(PDO::FETCH_ASSOC) as $row2) {	
													$nombre = $row2['fist_name'];
													$emailr = $row2['email'];
												}	
												}	
											}
				$cadena='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
						<html xmlns="http://www.w3.org/1999/xhtml">
						   <head>
							  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
							  <meta name="format-detection" content="telephone=no">
							  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
							  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
							  <title>Page title</title>
							  <style type="text/css">#outlook a{padding:0}.ReadMsgBody{width:100%}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%}body,table,td,a{-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}table,td{mso-table-lspace:0;mso-table-rspace:0}img{-ms-interpolation-mode:bicubic}body{margin:0;padding:0}img{border:0;height:auto;line-height:100%;outline:0;text-decoration:none}table{border-collapse:collapse!important}.apple-links a{color:#999;text-decoration:none}@media screen and (max-width:600px){td[class="logo"] img{margin:0 auto!important}table[class="wrapper"]{width:100%!important}td[class="mobile-image-pad"]{padding:0 10px 0 10px!important}td[class="mobile-title-pad"]{padding:30px 10px 0 10px!important}td[class="mobile-text-pad"]{padding:10px 10px 10px 10px!important}td[class="mobile-column-right"]{padding-top:20px!important}td[class="centrado"]{text-align:center!important;padding:5px 10px 5px 10px!important}img[class="fluid-image"]{width:100%!important;height:auto!important}td[class="hide"]{display:none!important}td[class="mobile-button"]{padding:12px 60px 12px 60px!important}td[class="mobile-button"] a{font-size:24px!important}}</style>
						   </head>
						   <body style="padding:0;margin:0">
							  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
								 <tr>
									<td align="center" bgcolor="">
									   <table border="0" cellpadding="0" cellspacing="0" width="700" class="wrapper" style="">
										  <tr>
											 <td>
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
												   <tr bgcolor="#001648">
													   <td class="mobile-image-pad" height="100" style="text-align:center">							  
														 <span style="font-size:32px;line-height:36px;color:#fff">Alianza Nacional de Emprendedores</span>
														</td>
												   </tr>
												   <tr bgcolor="">
													  <td align="center" style="padding:5px 0 5px 10px;color:#fff;font-family:Arial,Verdana,sans-serif;font-weight:bold;font-size:32px;line-height:36px" class="mobile-title-pad"></td>
												   </tr>
												   
												</table>
											 </td>
										  </tr>
											 <tr>
											 <td style="">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
												   <tr>
													  <td>
														 <table border="0" cellpadding="0" cellspacing="0" width="100%" align="left" class="wrapper">
															<tr>
															   <td>
																  <table border="0" cellpadding="0" cellspacing="0" width="100%">
																	  <tr>
																		<td bgcolor="#ebeef2" align="left" style="padding: 2px 10px 2px 10px; color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px; margin-right:1%;" class="mobile-text-pad" width="39.9%">
																		   <h1 style="line-height:40px;">Notificación de Reunion Vis a Vis en ANE</h1><br><br>
																		   <b style="font-style: italic;">Fecha de Reunión</b><br>
																		   '.$fecha.'<br><br>
																		  
																		   
																		</td>
																		<td width="0.1%"></td>
																		<td align="left" style="padding: 2px 10px 2px 10px;  color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px;" class="mobile-text-pad" width="60%">
																		  <b>¡Hola '.$nombre.'! Has tenido una reunion con '.$envio.'</b><br><br>
																			La reunión fue: <b>'.$reunion.'</b>.<br><br>
																		 
																		</td>
																	 </tr>
																	
																	 
																  </table>
															   </td>
															</tr>
														 </table>
													  </td>
												   </tr>
												</table>
											 </td>
										  </tr>
										
										 <tr>
											 <td>
												<table border="0" cellpadding="0" cellspacing="0" width="100%" align="right" class="wrapper">
												   <tr>
													  <td>
														 <table border="0" cellpadding="0" cellspacing="0" width="100%">
															<tr style="background: #333;
					">	
																<td align="left" style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 22px;" class="centrado">
																  <a href="" style="color:#fff"> </a>
																</td>
																<td align="right" style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 18px;" class="centrado">
																   <a href="http://amdenegocios.com/" style="color:#ccc">ANE</a>.
															   </td>
															</tr>
														 </table>
													  </td>
												   </tr>
												</table>
											 </td>
										  </tr>
									   
										  
									  
									   </table>
									</td>
								 </tr>
							  </table>
						 
						   </body>
						</html>';
										
			$mail->Subject    = "Notificación de Reunión Vis a Vis - ANE";
			$mail->MsgHTML($cadena);
			$address = $emailr;			
			$mail->AddCC($emaile);
			$mail->AddBCC("jtepepa@dannyyesoft.mx");
			$mail->AddAddress($address, $nombre);
			if(!$mail->Send()) {
			   $sql1="no enviado";
			} else {
			   $sql1="enviado";			
			}	
		} catch (Exception $e) {
			$r["continuar"]=$sql;
		}
		$r["sql"]=$sql;
		$r["enviado"]=$sql1;
		$r["mail"]=$emailr;
		$r['redireccion']=$redireccion;
		echo json_encode($r);
	}else if($combo=='guardaInvitado'){
		try {
			
				$sql ="INSERT INTO vis (fecha,id_usuario,tipo,persona,fechar,reunion) VALUES (NOW(),$id,'Invitado','$invitado','$fecha','$reunion')";
			
			
			$bd->query($sql);
			$r["continuar"]=true;
			
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		
		$r['redireccion']=$redireccion;
		echo json_encode($r);
	}
	else if($combo=='guardaReferencia'){
		try {			
			$sql ="INSERT INTO referencias (fecha,id_usuario,referencia,tipo,nombre,empresa,email,telefono,caliente,descripcion) VALUES (NOW(),$id,'$referencia','$tipo','$nombre','$empresa','$email','$telefono','$caliente','$descripcion')";			
			$bd->query($sql);
			$r["continuar"]=true;
			$result3 = $bd->query("SELECT MAX(id)  as id FROM referencias ");
					foreach ($result3->fetchAll(PDO::FETCH_ASSOC) as $row3) {	
						$lastid = $row3['id'];
					}	
			$result = $bd->query("SELECT v.*, fist_name, last_name,u.email as emaile,DATE_FORMAT(v.fecha,'%d/%m/%Y') AS fechar FROM referencias v, usuarios u WHERE id_usuario = IdUsuario and v.id=$lastid");			
				foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	
												$fecha = $row['fechar'];
												$referencia = $row['referencia'];
												$envio = $row['fist_name'];
												$emaile = $row['emaile'];
												$nombrer = $row['referencia'];
												$result2 = $bd->query("SELECT fist_name, last_name, email FROM usuarios WHERE IdUsuario = $referencia");
												foreach ($result2->fetchAll(PDO::FETCH_ASSOC) as $row2) {	
													$nombrer = $row2['fist_name'];
													$emailr = $row2['email'];
												}
				}
			
			
			
			
			$cadena='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	   <head>
		  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		  <meta name="format-detection" content="telephone=no">
		  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
		  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
		  <title>Page title</title>
		  <style type="text/css">#outlook a{padding:0}.ReadMsgBody{width:100%}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%}body,table,td,a{-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}table,td{mso-table-lspace:0;mso-table-rspace:0}img{-ms-interpolation-mode:bicubic}body{margin:0;padding:0}img{border:0;height:auto;line-height:100%;outline:0;text-decoration:none}table{border-collapse:collapse!important}.apple-links a{color:#999;text-decoration:none}@media screen and (max-width:600px){td[class="logo"] img{margin:0 auto!important}table[class="wrapper"]{width:100%!important}td[class="mobile-image-pad"]{padding:0 10px 0 10px!important}td[class="mobile-title-pad"]{padding:30px 10px 0 10px!important}td[class="mobile-text-pad"]{padding:10px 10px 10px 10px!important}td[class="mobile-column-right"]{padding-top:20px!important}td[class="centrado"]{text-align:center!important;padding:5px 10px 5px 10px!important}img[class="fluid-image"]{width:100%!important;height:auto!important}td[class="hide"]{display:none!important}td[class="mobile-button"]{padding:12px 60px 12px 60px!important}td[class="mobile-button"] a{font-size:24px!important}}</style>
	   </head>
	   <body style="padding:0;margin:0">
		  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
			 <tr>
				<td align="center" bgcolor="">
				   <table border="0" cellpadding="0" cellspacing="0" width="700" class="wrapper" style="">
					  <tr>
						 <td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
							   <tr bgcolor="#001648">
								   <td class="mobile-image-pad" height="100" style="text-align:center">							  
									 <span style="font-size:32px;line-height:36px;color:#fff">Alianza Nacional de Emprendedores</span>
									</td>
							   </tr>
							   <tr bgcolor="">
								  <td align="center" style="padding:5px 0 5px 10px;color:#fff;font-family:Arial,Verdana,sans-serif;font-weight:bold;font-size:32px;line-height:36px" class="mobile-title-pad"></td>
							   </tr>
							   
							</table>
						 </td>
					  </tr>
						 <tr>
						 <td style="">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
							   <tr>
								  <td>
									 <table border="0" cellpadding="0" cellspacing="0" width="100%" align="left" class="wrapper">
										<tr>
										   <td>
											  <table border="0" cellpadding="0" cellspacing="0" width="100%">
												  <tr>
													<td bgcolor="#ebeef2" align="left" style="padding: 2px 10px 2px 10px; color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px; margin-right:1%;" class="mobile-text-pad" width="39.9%">
													   <h1 style="line-height:40px;">Notificación de Referencia en ANE</h1><br><br>
													   <b style="font-style: italic;">Fecha de Referencia Dada</b><br>
													   '.$fecha.'<br><br>
													   <b style="font-style: italic;">Tipo de Referencia </b><br>
													   '.$tipo.'<br><br>
													   
													</td>
													<td width="0.1%"></td>
													<td align="left" style="padding: 2px 10px 2px 10px;  color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px;" class="mobile-text-pad" width="60%">
													  <b>¡Felicitaciones '.$nombrer.'! Has recibido una nueva referencia de '.$envio.'</b><br><br>
													  Esta referencia ha sido calificada como <b>'.$caliente.'</b> en el termometro de las referencias. Asegurate de darle seguimiento, ¡inmediatamente!<br><br>
													  <span style="font-size:11px;font-style: italic;">1 es considerado templado y 5 extremadamente caliente.</span><br><br>
													  <b>Nombre de la Referencia:</b> '.$nombre.' <br>
													   <b>Empresa:</b> '.$empresa.' <br>
													    <b>Teléfono:</b> '.$telefono.' <br>
														 <b>Email:</b> '.$email.' <br><br>
														 <b>Comentarios:</b> '.$descripcion.'<br><br>
														 
														 ¡Feliz Conexión!<br><br>
													</td>
												 </tr>
												
												 
											  </table>
										   </td>
										</tr>
									 </table>
								  </td>
							   </tr>
							</table>
						 </td>
					  </tr>
					
					 <tr>
						 <td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%" align="right" class="wrapper">
							   <tr>
								  <td>
									 <table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr style="background: #333;
">	
											<td align="left" style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 22px;" class="centrado">
											  <a href="" style="color:#fff"> </a>
											</td>
											<td align="right" style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 18px;" class="centrado">
											   <a href="http://amdenegocios.com/" style="color:#ccc">ANE</a>.
										   </td>
										</tr>
									 </table>
								  </td>
							   </tr>
							</table>
						 </td>
					  </tr>
				   
					  
				  
				   </table>
				</td>
			 </tr>
		  </table>
	 
	   </body>
	</html>';	
			
			
			$mail->Subject    = "Referencia Enviada - ANE";
			$mail->MsgHTML($cadena);
			$address = $emailr;			
			$mail->AddCC($emaile);
			$mail->AddBCC("jtepepa@dannyyesoft.mx");
			$mail->AddAddress($address, $nombrer);
			if(!$mail->Send()) {
			   $sql1="no enviado";
			} else {
			   $sql1="enviado";			
			}
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		$r["enviado"]=$sql1;
		$r["mail"]=$mreferencia;
		$r['redireccion']=$redireccion;
		echo json_encode($r);
	}
	else if($combo=='guardaVisitas'){
		try {
			
			$sql ="INSERT INTO invitados (fecha,id_usuario,invitado,empresa,servicios,anios,telefono,email,no_visitas,tratamiento,profesion,especialidad,fechav) VALUES (NOW(),$id,'$invitado','$empresa','$servicios','$anios','$telefono','$email',1,'$tratamiento','$profesiones','$especialidad','$reunion')";
			$bd->query($sql);
			$r["continuar"]=true;
			$result3 = $bd->query("SELECT MAX(id)  as id FROM invitados ");
					foreach ($result3->fetchAll(PDO::FETCH_ASSOC) as $row3) {	
						$lastid = $row3['id'];
					}	
			
			$result = $bd->query("SELECT v.*, fist_name, last_name,u.email as emaile FROM invitados v, usuarios u WHERE id_usuario = IdUsuario and v.id=$lastid");
				foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	
					$profesion = $row['profesion'];
					$especialidad = $row['especialidad'];
					$envio = $row['fist_name'];
					$emaile = $row['emaile'];
					$result2 = $bd->query("SELECT * FROM giro WHERE id = $profesion");
						foreach ($result2->fetchAll(PDO::FETCH_ASSOC) as $row2) {	
							$profesion = $row2['nombre'];
						}
						$result3 = $bd->query("SELECT * FROM especialidad WHERE id = $especialidad");
						foreach ($result3->fetchAll(PDO::FETCH_ASSOC) as $row3) {	
							$especialidad = $row3['especialidad'];
						}
				}						
			$cadena='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	   <head>
		  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		  <meta name="format-detection" content="telephone=no">
		  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
		  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
		  <title>Page title</title>
		  <style type="text/css">#outlook a{padding:0}.ReadMsgBody{width:100%}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%}body,table,td,a{-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}table,td{mso-table-lspace:0;mso-table-rspace:0}img{-ms-interpolation-mode:bicubic}body{margin:0;padding:0}img{border:0;height:auto;line-height:100%;outline:0;text-decoration:none}table{border-collapse:collapse!important}.apple-links a{color:#999;text-decoration:none}@media screen and (max-width:600px){td[class="logo"] img{margin:0 auto!important}table[class="wrapper"]{width:100%!important}td[class="mobile-image-pad"]{padding:0 10px 0 10px!important}td[class="mobile-title-pad"]{padding:30px 10px 0 10px!important}td[class="mobile-text-pad"]{padding:10px 10px 10px 10px!important}td[class="mobile-column-right"]{padding-top:20px!important}td[class="centrado"]{text-align:center!important;padding:5px 10px 5px 10px!important}img[class="fluid-image"]{width:100%!important;height:auto!important}td[class="hide"]{display:none!important}td[class="mobile-button"]{padding:12px 60px 12px 60px!important}td[class="mobile-button"] a{font-size:24px!important}}</style>
	   </head>
	   <body style="padding:0;margin:0">
		  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
			 <tr>
				<td align="center" bgcolor="">
				   <table border="0" cellpadding="0" cellspacing="0" width="700" class="wrapper" style="">
					  <tr>
						 <td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
							   <tr bgcolor="#001648">
								   <td class="mobile-image-pad" height="100" style="text-align:center">							  
									 <span style="font-size:32px;line-height:36px;color:#fff">Alianza Nacional de Emprendedores</span>
									</td>
							   </tr>
							   <tr bgcolor="">
								  <td align="center" style="padding:5px 0 5px 10px;color:#fff;font-family:Arial,Verdana,sans-serif;font-weight:bold;font-size:32px;line-height:36px" class="mobile-title-pad"></td>
							   </tr>
							   
							</table>
						 </td>
					  </tr>
						 <tr>
						 <td style="">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
							   <tr>
								  <td>
									 <table border="0" cellpadding="0" cellspacing="0" width="100%" align="left" class="wrapper">
										<tr>
										   <td>
											  <table border="0" cellpadding="0" cellspacing="0" width="100%">
												  <tr>
													<td bgcolor="#ebeef2" align="left" style="padding: 2px 10px 2px 10px; color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px; margin-right:1%;" class="mobile-text-pad" width="39.9%">
													   <h1 style="line-height:40px;">Notificación de Registro de Invitado en ANE</h1><br><br>
													   <b style="font-style: italic;">Fecha de Visita</b><br>
													   '.$reunion.'<br><br>
													   
													   
													</td>
													<td width="0.1%"></td>
													<td align="left" style="padding: 2px 10px 2px 10px;  color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px;" class="mobile-text-pad" width="60%">
													  <b>¡Hola '.$invitado.'! Se registro su visita a nuestras instalaciones por '.$envio.'</b><br><br>
													  Sus datos son:<br><br>
													  
													   <b>Giro:</b> '.$profesion.' <br>
													   <b>Especialidad:</b> '.$especialidad.' <br>
													   <b>Años en el negocio:</b> '.$anios.' <br>
													   <b>Servicios que ofrece:</b> '.$servicios.' <br>
													   <b>Tratamiento:</b> '.$tratamiento.' <br>
													   <b>Nombre de la empresa:</b> '.$empresa.' <br>
													   <b>Nombre Invitado:</b> '.$invitado.' <br>
													   <b>Teléfono:</b> '.$telefono.' <br>
													   <b>Email:</b> '.$email.' <br><br>
														 
														 ¡Gracias por su visita!<br><br>
													</td>
												 </tr>
												
												 
											  </table>
										   </td>
										</tr>
									 </table>
								  </td>
							   </tr>
							</table>
						 </td>
					  </tr>
					
					 <tr>
						 <td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%" align="right" class="wrapper">
							   <tr>
								  <td>
									 <table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr style="background: #333;
">	
											<td align="left" style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 22px;" class="centrado">
											  <a href="" style="color:#fff"> </a>
											</td>
											<td align="right" style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 18px;" class="centrado">
											   <a href="http://amdenegocios.com/" style="color:#ccc">ANE</a>.
										   </td>
										</tr>
									 </table>
								  </td>
							   </tr>
							</table>
						 </td>
					  </tr>
				   
					  
				  
				   </table>
				</td>
			 </tr>
		  </table>
	 
	   </body>
	</html>';
			
			$mail->Subject    = "Registro de Visita - ANE";
			$mail->MsgHTML($cadena);
			$address = $email;			
			$mail->AddCC($emaile);
			$mail->AddBCC("jtepepa@dannyyesoft.mx");
			$mail->AddAddress($address, $invitado);
			if(!$mail->Send()) {
			   $sql1="no enviado";
			} else {
			   $sql1="enviado";			
			}
			
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		$r["enviado"]=$sql1;
		$r["mail"]=$email;
		$r['redireccion']=$redireccion;
		echo json_encode($r);
	}
	else if($combo=='guardaVisitas2'){
		try {
			
			$sql ="INSERT INTO invitados (fecha,invitado,empresa,servicios,anios,telefono,email,no_visitas,tratamiento,profesion,especialidad,fechav) VALUES (NOW(),'$invitado','$empresa','$servicios','$anios','$telefono','$email',1,'$tratamiento','$profesiones','$especialidad','$reunion')";
			$bd->query($sql);
			$r["continuar"]=true;
			$result3 = $bd->query("SELECT MAX(id)  as id FROM invitados ");
					foreach ($result3->fetchAll(PDO::FETCH_ASSOC) as $row3) {	
						$lastid = $row3['id'];
					}	
			
			$result = $bd->query("SELECT v.*, fist_name, last_name,u.email as emaile FROM invitados v, usuarios u WHERE id_usuario = IdUsuario and v.id=$lastid");
				foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	
					$profesion = $row['profesion'];
					$especialidad = $row['especialidad'];
					$envio = $row['fist_name'];
					$emaile = $row['emaile'];
					$result2 = $bd->query("SELECT * FROM giro WHERE id = $profesion");
						foreach ($result2->fetchAll(PDO::FETCH_ASSOC) as $row2) {	
							$profesion = $row2['nombre'];
						}
						$result3 = $bd->query("SELECT * FROM especialidad WHERE id = $especialidad");
						foreach ($result3->fetchAll(PDO::FETCH_ASSOC) as $row3) {	
							$especialidad = $row3['especialidad'];
						}
				}						
			$cadena='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	   <head>
		  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		  <meta name="format-detection" content="telephone=no">
		  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
		  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
		  <title>Page title</title>
		  <style type="text/css">#outlook a{padding:0}.ReadMsgBody{width:100%}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%}body,table,td,a{-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}table,td{mso-table-lspace:0;mso-table-rspace:0}img{-ms-interpolation-mode:bicubic}body{margin:0;padding:0}img{border:0;height:auto;line-height:100%;outline:0;text-decoration:none}table{border-collapse:collapse!important}.apple-links a{color:#999;text-decoration:none}@media screen and (max-width:600px){td[class="logo"] img{margin:0 auto!important}table[class="wrapper"]{width:100%!important}td[class="mobile-image-pad"]{padding:0 10px 0 10px!important}td[class="mobile-title-pad"]{padding:30px 10px 0 10px!important}td[class="mobile-text-pad"]{padding:10px 10px 10px 10px!important}td[class="mobile-column-right"]{padding-top:20px!important}td[class="centrado"]{text-align:center!important;padding:5px 10px 5px 10px!important}img[class="fluid-image"]{width:100%!important;height:auto!important}td[class="hide"]{display:none!important}td[class="mobile-button"]{padding:12px 60px 12px 60px!important}td[class="mobile-button"] a{font-size:24px!important}}</style>
	   </head>
	   <body style="padding:0;margin:0">
		  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
			 <tr>
				<td align="center" bgcolor="">
				   <table border="0" cellpadding="0" cellspacing="0" width="700" class="wrapper" style="">
					  <tr>
						 <td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
							   <tr bgcolor="#001648">
								   <td class="mobile-image-pad" height="100" style="text-align:center">							  
									 <span style="font-size:32px;line-height:36px;color:#fff">Alianza Nacional de Emprendedores</span>
									</td>
							   </tr>
							   <tr bgcolor="">
								  <td align="center" style="padding:5px 0 5px 10px;color:#fff;font-family:Arial,Verdana,sans-serif;font-weight:bold;font-size:32px;line-height:36px" class="mobile-title-pad"></td>
							   </tr>
							   
							</table>
						 </td>
					  </tr>
						 <tr>
						 <td style="">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
							   <tr>
								  <td>
									 <table border="0" cellpadding="0" cellspacing="0" width="100%" align="left" class="wrapper">
										<tr>
										   <td>
											  <table border="0" cellpadding="0" cellspacing="0" width="100%">
												  <tr>
													<td bgcolor="#ebeef2" align="left" style="padding: 2px 10px 2px 10px; color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px; margin-right:1%;" class="mobile-text-pad" width="39.9%">
													   <h1 style="line-height:40px;">Notificación de Registro de Invitado en ANE</h1><br><br>
													   <b style="font-style: italic;">Fecha de Visita</b><br>
													   '.$reunion.'<br><br>
													   
													   
													</td>
													<td width="0.1%"></td>
													<td align="left" style="padding: 2px 10px 2px 10px;  color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px;" class="mobile-text-pad" width="60%">
													  <b>¡Hola '.$invitado.'! se ha generado un registro a nuestra próxima reunión. </b><br><br>
													  Sus datos son:<br><br>
													  
													   <b>Giro:</b> '.$profesion.' <br>
													   <b>Especialidad:</b> '.$especialidad.' <br>
													   <b>Años en el negocio:</b> '.$anios.' <br>
													   <b>Servicios que ofrece:</b> '.$servicios.' <br>
													   <b>Tratamiento:</b> '.$tratamiento.' <br>
													   <b>Nombre de la empresa:</b> '.$empresa.' <br>
													   <b>Nombre Invitado:</b> '.$invitado.' <br>
													   <b>Teléfono:</b> '.$telefono.' <br>
													   <b>Email:</b> '.$email.' <br><br>
														 
														 ¡Gracias por su visita!<br><br>
													</td>
												 </tr>
												
												 
											  </table>
										   </td>
										</tr>
									 </table>
								  </td>
							   </tr>
							</table>
						 </td>
					  </tr>
					
					 <tr>
						 <td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%" align="right" class="wrapper">
							   <tr>
								  <td>
									 <table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr style="background: #333;
">	
											<td align="left" style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 22px;" class="centrado">
											  <a href="" style="color:#fff"> </a>
											</td>
											<td align="right" style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 18px;" class="centrado">
											   <a href="http://amdenegocios.com/" style="color:#ccc">ANE</a>.
										   </td>
										</tr>
									 </table>
								  </td>
							   </tr>
							</table>
						 </td>
					  </tr>
				   
					  
				  
				   </table>
				</td>
			 </tr>
		  </table>
	 
	   </body>
	</html>';
			
			$mail->Subject    = "Registro de Visita - ANE";
			$mail->MsgHTML($cadena);
			$address = $email;			
			$mail->AddCC($emaile);
			$mail->AddBCC("jtepepa@dannyyesoft.mx");
			$mail->AddAddress($address, $invitado);
			if(!$mail->Send()) {
			   $sql1="no enviado";
			} else {
			   $sql1="enviado";			
			}
			
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		$r["enviado"]=$sql1;
		$r["mail"]=$email;
		$r['redireccion']=$redireccion;
		echo json_encode($r);
	}
	else if($combo=='guardaNegocio'){
		try {
				if($miembros == "Otro"){					
					if($pagadoa == "Otro"){
						$pagadoa=$invitadop;
					}
					$sql ="INSERT INTO negocios (fecha,id_usuario,miembro,monto,porcentaje,comision,pagado,pagadoa,fechar,tipo) VALUES (NOW(),$id,'$invitado','$monto','$porcentaje','$comision','$pagado','$pagadoa','$fecha','Otro')";
					
				}else{
					if($pagadoa == "Otro"){
						$pagadoa=$invitadop;
					}					
					$sql ="INSERT INTO negocios (fecha,id_usuario,miembro,monto,porcentaje,comision,pagado,pagadoa,fechar,tipo) VALUES (NOW(),$id,$miembros,'$monto','$porcentaje','$comision','$pagado','$pagadoa','$fecha','Miembro')";
				}
			$bd->query($sql);
			$r["continuar"]=true;
			$result3 = $bd->query("SELECT MAX(id)  as id FROM negocios ");
					foreach ($result3->fetchAll(PDO::FETCH_ASSOC) as $row3) {	
						$lastid = $row3['id'];
					}
			$result = $bd->query("SELECT v.*, fist_name, last_name,u.email as emaile FROM negocios v, usuarios u WHERE id_usuario = IdUsuario AND v.id=$lastid");
				foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	
					$persona = $row['miembro'];
					$nombre = $row['miembro'];
					$envio = $row['fist_name'];
					$emaile = $row['emaile'];
					$tipo=$row['tipo'];
					if($row['tipo'] == 'Otro'){
						$tipo="No es Miembro";
					}
					if($row['tipo'] == 'Miembro'){
						$result2 = $bd->query("SELECT fist_name, last_name, email FROM usuarios WHERE IdUsuario = $persona");
					foreach ($result2->fetchAll(PDO::FETCH_ASSOC) as $row2) {	
						$nombre = $row2['fist_name'];
						$emailr = $row2['email'];
					}	
					}	
					$nombre3=$row['pagadoa'];
					if($row['pagadoa'] > 0){
					$per=$row['pagadoa'] ;
					$result3 = $bd->query("SELECT fist_name, last_name, email FROM usuarios WHERE IdUsuario = $per");
					foreach ($result3->fetchAll(PDO::FETCH_ASSOC) as $row3) {	
						$nombre3 = $row3['fist_name'];
						$emailp = $row2['email'];
					}	
					
					}	
				}
			$cadena='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					   <head>
						  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
						  <meta name="format-detection" content="telephone=no">
						  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
						  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
						  <title>Page title</title>
						  <style type="text/css">#outlook a{padding:0}.ReadMsgBody{width:100%}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%}body,table,td,a{-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}table,td{mso-table-lspace:0;mso-table-rspace:0}img{-ms-interpolation-mode:bicubic}body{margin:0;padding:0}img{border:0;height:auto;line-height:100%;outline:0;text-decoration:none}table{border-collapse:collapse!important}.apple-links a{color:#999;text-decoration:none}@media screen and (max-width:600px){td[class="logo"] img{margin:0 auto!important}table[class="wrapper"]{width:100%!important}td[class="mobile-image-pad"]{padding:0 10px 0 10px!important}td[class="mobile-title-pad"]{padding:30px 10px 0 10px!important}td[class="mobile-text-pad"]{padding:10px 10px 10px 10px!important}td[class="mobile-column-right"]{padding-top:20px!important}td[class="centrado"]{text-align:center!important;padding:5px 10px 5px 10px!important}img[class="fluid-image"]{width:100%!important;height:auto!important}td[class="hide"]{display:none!important}td[class="mobile-button"]{padding:12px 60px 12px 60px!important}td[class="mobile-button"] a{font-size:24px!important}}</style>
					   </head>
					   <body style="padding:0;margin:0">
						  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
							 <tr>
								<td align="center" bgcolor="">
								   <table border="0" cellpadding="0" cellspacing="0" width="700" class="wrapper" style="">
									  <tr>
										 <td>
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
											   <tr bgcolor="#001648">
												   <td class="mobile-image-pad" height="100" style="text-align:center">							  
													 <span style="font-size:32px;line-height:36px;color:#fff">Alianza Nacional de Emprendedores</span>
													</td>
											   </tr>
											   <tr bgcolor="">
												  <td align="center" style="padding:5px 0 5px 10px;color:#fff;font-family:Arial,Verdana,sans-serif;font-weight:bold;font-size:32px;line-height:36px" class="mobile-title-pad"></td>
											   </tr>
											   
											</table>
										 </td>
									  </tr>
										 <tr>
										 <td style="">
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
											   <tr>
												  <td>
													 <table border="0" cellpadding="0" cellspacing="0" width="100%" align="left" class="wrapper">
														<tr>
														   <td>
															  <table border="0" cellpadding="0" cellspacing="0" width="100%">
																  <tr>
																	<td bgcolor="#ebeef2" align="left" style="padding: 2px 10px 2px 10px; color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px; margin-right:1%;" class="mobile-text-pad" width="39.9%">
																	   <h1 style="line-height:40px;">Notificación de Negocio Concretado en ANE</h1><br><br>
																	   <b style="font-style: italic;">Negocio cerrado el</b><br>
																	   '.$fecha.'<br><br>
																	   
																	   
																	</td>
																	<td width="0.1%"></td>
																	<td align="left" style="padding: 2px 10px 2px 10px;  color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px;" class="mobile-text-pad" width="60%">
																	  <b>¡Hola! Se concreto un negocio entre:</b><br><br>
																	  
																	   <b>Miembro que registró el negocio:</b> '.$envio.' <br>
																	   <b>Negocio concretado con:</b> '.$nombre.' <br>
																	   <b>Monto en Pesos:</b> $'.$monto.' <br>
																	   <b>Pagar a:</b> '.$nombre3.' <br>
																	   <b>Porcentaje de comisión:</b> '.$porcentaje.'% <br>
																	   <b>Comisión por pagar:</b> $'.$comision.' <br>
																	   <b>Pagada:</b> '.$pagado.' <br>
																															 
																		 ¡Felicidades!<br><br>
																	</td>
																 </tr>
																
																 
															  </table>
														   </td>
														</tr>
													 </table>
												  </td>
											   </tr>
											</table>
										 </td>
									  </tr>
									
									 <tr>
										 <td>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" align="right" class="wrapper">
											   <tr>
												  <td>
													 <table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr style="background: #333;
				">	
															<td align="left" style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 22px;" class="centrado">
															  <a href="" style="color:#fff"> </a>
															</td>
															<td align="right" style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 18px;" class="centrado">
															   <a href="http://amdenegocios.com/" style="color:#ccc">ANE</a>.
														   </td>
														</tr>
													 </table>
												  </td>
											   </tr>
											</table>
										 </td>
									  </tr>
								   
									  
								  
								   </table>
								</td>
							 </tr>
						  </table>
					 
					   </body>
					</html>';	
					
			$mail->Subject    = "Registro de Negocio - ANE";
			$mail->MsgHTML($cadena);
			$address = $emailr;			
			$mail->AddCC($emaile);
			$mail->AddBCC("jtepepa@dannyyesoft.mx");
			$mail->AddAddress($address, $nombre);
			if(!$mail->Send()) {
			   $sql1="no enviado";
			} else {
			   $sql1="enviado";			
			}
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		$r["enviado"]=$sql1;
		$r["mail"]=$emailr;
		$r['redireccion']=$redireccion;
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
	}else if($combo=='validaEmail'){
		try{
			$result = $bd->query("SELECT count(email) as total FROM invitados WHERE email= '$email'");
			foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	}			
			$r["resultados"]=$row['total'];
			$result = $bd->query("SELECT count(email) as total FROM usuarios WHERE email= '$email'");
			foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	}			
			$r["resultadosu"]=$row['total'];
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		echo json_encode($r);
	}else if($combo=='guardarMiembro'){
		try {
			
			$sql ="INSERT INTO usuarios (fecha,Usuario,type,Estatus,Password,email,phone,fist_name,last_name,empresa,giro,especialidad,servicios,verificado) VALUES (NOW(),'$invitado',2,'Activo','$pass','$email','$telefono','$invitado','','$empresa','$profesiones','$especialidad','$servicios',1)";
			
			$bd->query($sql);
			$r["continuar"]=true;
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		$r["enviado"]=$sql1;
		$r["mail"]=$emailr;
		$r['redireccion']=$redireccion;
		echo json_encode($r);
	}
	else if($combo=='convertirMiembro'){
		try {
			
			$sql ="INSERT INTO usuarios (fecha,Usuario,type,Estatus,Password,email,phone,fist_name,last_name,empresa,giro,especialidad,servicios,verificado) VALUES (NOW(),'$invitado',2,'Activo','$pass','$email','$telefono','$invitado','','$empresa','$profesiones','$especialidad','$servicios',1)";
			
			
			$sql2="update invitados set miembro = 1 where id = $id;";
				$bd->query($sql2);
			
			$bd->query($sql);
			$r["continuar"]=true;
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		$r["enviado"]=$sql1;
		$r["mail"]=$emailr;
		$r['redireccion']=$redireccion;
		echo json_encode($r);
	}
	else if($combo=='guardarUsuario'){
		try {
			
			 $sql="update usuarios set Usuario = '$nombre', email = '$email', phone = '$telefono', fist_name = '$nombre', empresa = '$empresa', giro = $profesiones, especialidad = $especialidad, servicios = '$servicios' where IdUsuario = $id;";
			$bd->query($sql);
			$r["continuar"]=true;
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		$r["enviado"]=$sql1;
		$r["mail"]=$emailr;
		$r['redireccion']=1;
		echo json_encode($r);
	}
	else if($combo=='guardarUsuario2'){
		try {
			
			 $sql="update usuarios set Usuario = '$nombre', email = '$email', phone = '$telefono', fist_name = '$nombre', empresa = '$empresa', giro = $profesiones, especialidad = $especialidad, servicios = '$servicios', Estatus= '$estado' where IdUsuario = $id;";
			$bd->query($sql);
			$r["continuar"]=true;
		} catch (Exception $e) {
			$r["continuar"]=$e;
		}
		$r["sql"]=$sql;
		$r["enviado"]=$sql1;
		$r["mail"]=$emailr;
		$r['redireccion']=1;
		echo json_encode($r);
	}
	


	?>