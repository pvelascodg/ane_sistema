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
// $mail->IsSMTP();// telling the class to use SMTP
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




$combo = $_POST['accion'];
$idR = $_POST['idR'];
$id = addslashes($_POST['id']);
$invitado = addslashes($_POST['invitado']);
$visitas = addslashes($_POST['visitas']);
$miembros = addslashes($_POST['miembros']);
$referencia = addslashes($_POST['referencia']);
$monto = $_POST['monto'];
$porcentaje = $_POST['porcentaje'];
$comision = $_POST['comision'];
$pagado = $_POST['pagado'];
$fecha = $_POST['fecha'];
$pagadoa = $_POST['pagadoa'];
$giro = $_POST['giro'];
$empresa = $_POST['empresa'];
$servicios = $_POST['servicios'];
$anios = $_POST['anios'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$face = $_POST['face'];
$insta = $_POST['insta'];
$link = $_POST['link'];
$pass = md5($_POST['pass']);
$reunion = $_POST['reunion'];
$tratamiento = $_POST['tratamiento'];
$profesiones = $_POST['profesiones'];
$especialidad = $_POST['especialidad'];
$redireccion = $_POST['redireccion'];
$invitadop = $_POST['invitadop'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$caliente = $_POST['caliente'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$select = $_POST['select'];
$estado = $_POST['estado'];
$empr = $_POST['empresa'];

if ($combo == "get") {
	try {
		$result = $bd->query("select * from usuarios where IdUsuario != $id and type = 2");
		foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
		}
		$r = $row;
	} catch (Exception $e) {
		$r["continuar"] = $e;
	}
	echo json_encode($r);
} elseif ($combo == 'getGiroById') {
	$r['giro'] = $giro;
	try {
		$stm = $bd->query("SELECT * FROM giro ORDER BY nombre ASC");
		if ($stm->rowCount() > 0) {
			$result = $stm->fetchAll();
			$r['data'] = '<option disabled selected>Selecciona una opción</option>';
			foreach ($result as $row) {
				if ($giro == $row['id']) {
					$r['data'] .= '<option selected value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
				} elseif ($row['id'] !== 13) {
					$r['data'] .= '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
				}
			}
			$r['data'].= '<option value="13">No esta en la lista</option>';

			$r['continuar'] = true;
		} else {
			$r['continuar'] = false;
			$r['message'] = 'No hay giros para mostrar';
		}
	} catch (Exception $e) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}

	echo json_encode($r);
} elseif ($combo == 'getGiroByEspecialidad') {
	try {
		$stm = $bd->query("SELECT * FROM especialidad WHERE id = $especialidad ORDER BY especialidad ASC");
		if ($stm->rowCount() > 0) {
			$result = $stm->fetch();
			$r['id_espec'] = $result['id_espec'];
		} else {
			$r['continuar'] = false;
		}
	} catch (\Throwable $th) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}

	echo json_encode($r);
} elseif ($combo == 'getEspecialidadById') {
	try {
		$stm = $bd->query("SELECT * FROM especialidad ORDER BY especialidad ASC");
		if ($stm->rowCount() > 0) {
			$result = $stm->fetchAll();
			$r['data'] = '<option disabled selected>Selecciona una opción</option>';
			foreach ($result as $row) {
				if ($especialidad == $row['id']) {
					$r['data'] .= '<option selected value="' . $row['id'] . '">' . $row['especialidad'] . '</option>';
				} elseif ($row['id'] !== 60) {
					$r['data'] .= '<option value="' . $row['id'] . '">' . $row['especialidad'] . '</option>';
				}
			}

			$r['continuar'] = true;
		} else {
			$r['continuar'] = false;
			$r['message'] = 'No hay especialidad para mostrar';
		}
	} catch (Exception $e) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}

	echo json_encode($r);
} elseif ($combo == 'getEspecialidadByGiro') {
	try {
		$stm = $bd->query("SELECT * FROM especialidad WHERE id_espec = $giro");
		if ($stm->rowCount() > 0) {
			$result = $stm->fetchAll();
			$r['data'] = '<option disabled selected>Selecciona una opción</option>';
			foreach ($result as $row) {
				if ($row['id'] == $especialidad) {
					$r['data'] .= '<option selected value="' . $row['id'] . '">' . $row['especialidad'] . '</option>';
				} else {
					$r['data'] .= '<option value="' . $row['id'] . '">' . $row['especialidad'] . '</option>';
				}
			}
			if($giro !== '13'){

				$r['data'].= '<option value="60">No esta en la lista</option>';
			}

			$r['continuar'] = true;
		} else {
			$r['continuar'] = false;
			$r['message'] = 'No hay especialidad para mostrar';
		}
	} catch (Exception $e) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}

	echo json_encode($r);
} elseif ($combo == 'getMiembros') {
	try {
		$res = $bd->prepare("SELECT * FROM usuarios WHERE id != :id AND status = 'Activo' ORDER BY empresa ASC");
		$res->execute(array(
			':id' => $id
		));
		$r = "<option value=''>Elige un Miembro</option>";
		if ($_POST['invitadoShow'] == false) {

			$r .= "<option value='0'>Visitante</option>"; //<option value='Otro'>NO ES MIEMBRO</option>
		}
		foreach ($res->fetchAll(PDO::FETCH_ASSOC) as $row) {
			$r .= '<option value="' . $row["id"] . '">' . $row["empresa"] . '</option>';
		}
	} catch (Exception $e) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}
	echo json_encode($r);
} elseif ($combo == 'getMiembrosFull') {
	try {
		$res = $bd->prepare("SELECT * FROM usuarios WHERE id != :id");
		$res->execute(array(
			':id' => $id
		));
		$data = $res->fetchAll();

		$r['data'] = $data;

		// foreach ($data as $row) {
		// 	if($row['type']==0){
		// 		$tipo == 'SuperUsuario';
		// 	}elseif($row['type']==1){
		// 		$tipo == 'Administrador';
		// 	}else{
		// 		$tipo == 'Normal';
		// 	}

		// 	$status = ($row['status'] == 'Activo') ? '<span style=\'color:green\'>Activo</span>' : '<span style=\'color:red\'>Inactivo</span>';

		// 	$r['data'].=;
		// }

		$r['continuar'] = true;
	} catch (Exception $e) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}
	echo json_encode($r);
} elseif ($combo == 'guardarInfo') {
	try {
		$stm = $bd->prepare("UPDATE usuarios SET first_name = :first_name, last_name = :last_name, empresa = :empresa, giro = :giro, especialidad = :especialidad, servicios = :servicios, phone = :phone, email = :email WHERE id = :id");

		$stm->execute(array(
			':first_name' => $nombre,
			':last_name' => $apellido,
			':empresa' => $empresa,
			':giro' => $giro,
			':especialidad' => $especialidad,
			':servicios' => $servicios,
			':phone' => $telefono,
			':email' => $email,
			':id' => $id
		));

		if ($stm->rowCount() > 0) {
			$r['continuar'] = true;
			$r['message'] = 'Datos actualizados correctamente';
		} else {
			$r['continuar'] = false;
			$r['message'] = 'No has cambiado ningún dato';
			// $r['error']=print_r($stm->errorInfo());
		}
	} catch (Exception $e) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}


	echo json_encode($r);
} elseif ($combo == 'guardarPass') {
	try {
		$stm = $bd->prepare("UPDATE usuarios SET pass = :pass WHERE id = :id");

		$stm->execute(array(
			':pass' => $pass,
			':id' => $id
		));

		if ($stm->rowCount() > 0) {
			$r['continuar'] = true;
			$r['message'] = 'Contraseña actualizada correctamente';
		} else {
			$r['continuar'] = false;
			$r['message'] = 'No has cambiado ningún dato';
			// $r['error']=print_r($stm->errorInfo());
		}
	} catch (Exception $e) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}

	echo json_encode($r);
} else if ($combo == 'guardaVis') {
	try {

		if ($miembros == '0') {
			$tipo = 'No es Miembro';
			if ($_POST['name-invitado'] == '') {
				$nombreInvitado = 'No registrado';
			} else {
				$nombreInvitado = $_POST['name-invitado'];
			}
		} else {
			$tipo = 'Miembro';
			$nombreInvitado = '';
		}

		$stm = $bd->prepare("INSERT INTO vis (fecha,id_usuario,tipo,persona,fechar,reunion) VALUES (NOW(),:id,:tipo,:miembro,:fecha,:reunion)");

		$stm->execute(array(
			':id' => $id,
			':miembro' => $miembros,
			':tipo' => $tipo,
			':fecha' => $fecha,
			':reunion' => $reunion
		));

		if ($miembros == '0') {
			$tipo = 'No es Miembro';

			$stm2 = $bd->query("SELECT first_name, last_name, email FROM usuarios WHERE id = $id");
			$anfitrion = $stm2->fetch();
			$nameAnfitrion = $anfitrion['first_name'] . ' ' . $anfitrion['last_name'];
			$emailAnfitrion = $anfitrion['email'];

			if ($_POST['name-invitado'] == '') {
				$mensaje = '<b>¡Hola ' . $nameAnfitrion . '! Has tenido una reunion con un invitado</b>';
			} else {
				$mensaje = '<b>¡Hola ' . $nameAnfitrion . '! Has tenido una reunion con un ' . $_POST['name-invitado'] . '</b>';
			}
		} else {
			$tipo = 'Miembro';

			$stm2 = $bd->query("SELECT first_name, last_name, email FROM usuarios WHERE id = $id");
			$anfitrion = $stm2->fetch();
			$nameAnfitrion = $anfitrion['first_name'] . ' ' . $anfitrion['last_name'];
			$emailAnfitrion = $anfitrion['email'];

			$stm3 = $bd->query("SELECT first_name, last_name, email FROM usuarios WHERE id = $miembros");
			$invitado = $stm3->fetch();
			$nameInvitado = $invitado['first_name'] . ' ' . $invitado['last_name'];
			$emailInvitado = $invitado['email'];

			$mensaje = '<b>¡Hola ' . $nameInvitado . '! Has tenido una reunion con ' . $nameAnfitrion . '</b>';
		}

		$cadena = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
																			   ' . $fecha . '<br><br>
	
	
																			</td>
																			<td width="0.1%"></td>
																			<td align="left" style="padding: 2px 10px 2px 10px;  color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px;" class="mobile-text-pad" width="60%">
																			  ' . $mensaje . '<br><br>
																				La reunión fue: <b>' . $reunion . '</b>.<br><br>
	
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
																<tr style="background: #333;">	
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
		if ($miembros == '0') {
			$mail->AddAddress($emailAnfitrion, $nameAnfitrion);
		} else {
			$mail->AddCC($emailAnfitrion);
			$mail->AddAddress($emailInvitado, $nameInvitado);
		}


		if (!$mail->Send()) {
			$r['enviado'] = false;
		} else {
			$r['enviado'] = true;
		}

		$r['continuar'] = true;
	} catch (Exception $e) {
		$r["continuar"] = false;
		$r['message'] = $e;
	}
	echo json_encode($r);
} else if ($combo == 'guardaReferencia') {
	try {
		$stm = $bd->prepare("INSERT INTO referencias (fecha,id_usuario,referencia,tipo,nombre,empresa,email,telefono,caliente,descripcion) VALUES (NOW(),:id_usuario,:referencia,:tipo,:nombre,:empresa,:email,:telefono,:caliente,:descripcion)");

		$stm->execute(array(
			':id_usuario' => $id,
			':referencia' => $referencia,
			':tipo' => $tipo,
			':nombre' => $nombre,
			':empresa' => $empresa,
			':email' => $email,
			':telefono' => $telefono,
			':caliente' => $caliente,
			':descripcion' => $descripcion
		));

		$stm2 = $bd->query("SELECT first_name, last_name, email FROM usuarios WHERE id = $id");
		$anfitrion = $stm2->fetch();
		$nameAnfitrion = $anfitrion['first_name'] . ' ' . $anfitrion['last_name'];
		$emailAnfitrion = $anfitrion['email'];

		$stm3 = $bd->query("SELECT first_name, last_name, email FROM usuarios WHERE id = $referencia");
		$ref = $stm3->fetch();
		$nameReferencia = $ref['first_name'] . ' ' . $ref['last_name'];
		$emailReferencia = $ref['email'];

		$cadena = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
					' . date('Y-m-d') . '<br><br>
					<b style="font-style: italic;">Tipo de Referencia </b><br>
					' . $tipo . '<br><br>
					
					</td>
					<td width="0.1%"></td>
					<td align="left" style="padding: 2px 10px 2px 10px;  color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px;" class="mobile-text-pad" width="60%">
					<b>¡Felicitaciones ' . $nameReferencia . '! Has recibido una nueva referencia de ' . $nameAnfitrion . ', por favor ponte en contacto a la brevedad para obtener mas información.</b><br><br>
					Esta referencia ha sido calificada como <b>' . $caliente . '</b> en el termometro de las referencias. Asegurate de darle seguimiento, ¡inmediatamente!<br><br>
					<span style="font-size:11px;font-style: italic;">1 es considerado templado y 5 extremadamente caliente.</span><br><br>
					<b>Nombre de la Referencia:</b> ' . $nombre . ' <br>
					<b>Empresa:</b> ' . $empresa . ' <br>
					<b>Teléfono:</b> ' . $telefono . ' <br>
					<b>Email:</b> ' . $email . ' <br><br>
					<b>Comentarios:</b> ' . $descripcion . '<br><br>
					
					¡Éxito con tu referencia!<br><br>
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

		$r["continuar"] = true;

		$mail->Subject    = "Referencia Enviada - ANE";
		$mail->MsgHTML($cadena);
		$mail->AddCC($emailAnfitrion);
		$mail->AddAddress($emailReferencia, $nameReferencia);

		if (!$mail->Send()) {
			$r['enviado'] = false;
		} else {
			$r['enviado'] = true;
		}
	} catch (Exception $e) {
		$r["continuar"] = false;
		$r['message'] = $e;
	}
	echo json_encode($r);
} else if ($combo == 'guardaVisitas') {
	try {

		$stm = $bd->prepare("INSERT INTO invitados (fecha,id_usuario,first_name,last_name,empresa,servicios,anios,telefono,email,no_visitas,tratamiento,profesion,especialidad,fechav) VALUES (NOW(),:id_usuario,:first_name,:last_name,:empresa,:servicios,:anios,:telefono,:email,1,:tratamiento,:profesion,:especialidad,:fechav)");
		$stm->execute(array(
			':id_usuario' => $id,
			':first_name' => $nombre,
			':last_name' => $apellido,
			':empresa' => $empresa,
			':servicios' => $servicios,
			':anios' => $anios,
			':telefono' => $telefono,
			':email' => $email,
			':tratamiento' => $tratamiento,
			':profesion' => $profesiones,
			':especialidad' => $especialidad,
			':fechav' => $reunion
		));

		$stm2 = $bd->query("SELECT first_name, last_name, email FROM usuarios WHERE id = $id");
		$anfitrion = $stm2->fetch();
		$nameAnfitrion = $anfitrion['first_name'] . ' ' . $anfitrion['last_name'];
		$emailAnfitrion = $anfitrion['email'];

		$stm3 = $bd->query("SELECT nombre FROM giro WHERE id = $profesiones");
		$giroG = $stm3->fetch();
		$nameGiro = $giroG['nombre'];

		$stm4 = $bd->query("SELECT especialidad FROM especialidad WHERE id = $especialidad");
		$especG = $stm4->fetch();
		$nameEspec = $especG['especialidad'];

		$cadena = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
													   ' . $reunion . '<br><br>


													</td>
													<td width="0.1%"></td>
													<td align="left" style="padding: 2px 10px 2px 10px;  color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px;" class="mobile-text-pad" width="60%">
													  <b>¡Hola ' . $nombre . '! Se registro su visita a nuestras instalaciones por ' . $nameAnfitrion . '</b><br><br>
													  Sus datos son:<br><br>

													   <b>Giro:</b> ' . $nameGiro . ' <br>
													   <b>Especialidad:</b> ' . $nameEspec . ' <br>
													   <b>Años en el negocio:</b> ' . $anios . ' <br>
													   <b>Servicios que ofrece:</b> ' . $servicios . ' <br>
													   <b>Tratamiento:</b> ' . $tratamiento . ' <br>
													   <b>Nombre de la empresa:</b> ' . $empresa . ' <br>
													   <b>Nombre Invitado:</b> ' . $invitado . ' <br>
													   <b>Teléfono:</b> ' . $telefono . ' <br>
													   <b>Email:</b> ' . $email . ' <br><br>

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
										<tr style="background: #333;">
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

		$r["continuar"] = true;

		$mail->Subject    = "Registro de Visita - ANE";
		$mail->MsgHTML($cadena);
		$mail->AddCC($emailAnfitrion);
		$mail->AddAddress($email, $invitado);
		if (!$mail->Send()) {
			$r['enviado'] = false;
		} else {
			$r['enviado'] = true;
		}
	} catch (Exception $e) {
		$r["continuar"] = false;
		$r['message'] = $e;
	}
	echo json_encode($r);
} elseif ($combo == 'invitadoANE') {
	try {

		$stm = $bd->prepare("INSERT INTO invitados (fecha,id_usuario,first_name,last_name,empresa,servicios,anios,telefono,email,no_visitas,tratamiento,profesion,especialidad,fechav) VALUES (NOW(),:id_usuario,:first_name,:last_name,:empresa,:servicios,:anios,:telefono,:email,1,:tratamiento,:profesion,:especialidad,:fechav)");
		$stm->execute(array(
			':id_usuario' => $id,
			':first_name' => $nombre,
			':last_name' => $apellido,
			':empresa' => $empresa,
			':servicios' => $servicios,
			':anios' => $anios,
			':telefono' => $telefono,
			':email' => $email,
			':tratamiento' => $tratamiento,
			':profesion' => $profesiones,
			':especialidad' => $especialidad,
			':fechav' => $reunion
		));

	// 	$cadena = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	// <html xmlns="http://www.w3.org/1999/xhtml">
	//    <head>
	// 	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	// 	  <meta name="format-detection" content="telephone=no">
	// 	  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
	// 	  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	// 	  <title>Page title</title>
	// 	  <style type="text/css">#outlook a{padding:0}.ReadMsgBody{width:100%}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%}body,table,td,a{-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}table,td{mso-table-lspace:0;mso-table-rspace:0}img{-ms-interpolation-mode:bicubic}body{margin:0;padding:0}img{border:0;height:auto;line-height:100%;outline:0;text-decoration:none}table{border-collapse:collapse!important}.apple-links a{color:#999;text-decoration:none}@media screen and (max-width:600px){td[class="logo"] img{margin:0 auto!important}table[class="wrapper"]{width:100%!important}td[class="mobile-image-pad"]{padding:0 10px 0 10px!important}td[class="mobile-title-pad"]{padding:30px 10px 0 10px!important}td[class="mobile-text-pad"]{padding:10px 10px 10px 10px!important}td[class="mobile-column-right"]{padding-top:20px!important}td[class="centrado"]{text-align:center!important;padding:5px 10px 5px 10px!important}img[class="fluid-image"]{width:100%!important;height:auto!important}td[class="hide"]{display:none!important}td[class="mobile-button"]{padding:12px 60px 12px 60px!important}td[class="mobile-button"] a{font-size:24px!important}}</style>
	//    </head>
	//    <body style="padding:0;margin:0">
	// 	  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
	// 		 <tr>
	// 			<td align="center" bgcolor="">
	// 			   <table border="0" cellpadding="0" cellspacing="0" width="700" class="wrapper" style="">
	// 				  <tr>
	// 					 <td>
	// 						<table border="0" cellpadding="0" cellspacing="0" width="100%">
	// 						   <tr bgcolor="#001648">
	// 							   <td class="mobile-image-pad" height="100" style="text-align:center">							  
	// 								 <span style="font-size:32px;line-height:36px;color:#fff">Alianza Nacional de Emprendedores</span>
	// 								</td>
	// 						   </tr>
	// 						   <tr bgcolor="">
	// 							  <td align="center" style="padding:5px 0 5px 10px;color:#fff;font-family:Arial,Verdana,sans-serif;font-weight:bold;font-size:32px;line-height:36px" class="mobile-title-pad"></td>
	// 						   </tr>

	// 						</table>
	// 					 </td>
	// 				  </tr>
	// 					 <tr>
	// 					 <td style="">
	// 						<table border="0" cellpadding="0" cellspacing="0" width="100%">
	// 						   <tr>
	// 							  <td>
	// 								 <table border="0" cellpadding="0" cellspacing="0" width="100%" align="left" class="wrapper">
	// 									<tr>
	// 									   <td>
	// 										  <table border="0" cellpadding="0" cellspacing="0" width="100%">
	// 											  <tr>
	// 												<td bgcolor="#ebeef2" align="left" style="padding: 2px 10px 2px 10px; color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px; margin-right:1%;" class="mobile-text-pad" width="39.9%">
	// 												   <h1 style="line-height:40px;">Notificación de Registro de Invitado en ANE</h1><br><br>
	// 												   <b style="font-style: italic;">Fecha de Visita</b><br>
	// 												   ' . $reunion . '<br><br>


	// 												</td>
	// 												<td width="0.1%"></td>
	// 												<td align="left" style="padding: 2px 10px 2px 10px;  color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px;" class="mobile-text-pad" width="60%">
	// 												  <b>¡Hola ' . $invitado . '! Se registro su visita a nuestras instalaciones por ' . $nameAnfitrion . '</b><br><br>
	// 												  Sus datos son:<br><br>

	// 												   <b>Giro:</b> ' . $profesiones . ' <br>
	// 												   <b>Especialidad:</b> ' . $especialidad . ' <br>
	// 												   <b>Años en el negocio:</b> ' . $anios . ' <br>
	// 												   <b>Servicios que ofrece:</b> ' . $servicios . ' <br>
	// 												   <b>Tratamiento:</b> ' . $tratamiento . ' <br>
	// 												   <b>Nombre de la empresa:</b> ' . $empresa . ' <br>
	// 												   <b>Nombre Invitado:</b> ' . $invitado . ' <br>
	// 												   <b>Teléfono:</b> ' . $telefono . ' <br>
	// 												   <b>Email:</b> ' . $email . ' <br><br>

	// 													 ¡Gracias por su visita!<br><br>
	// 												</td>
	// 											 </tr>


	// 										  </table>
	// 									   </td>
	// 									</tr>
	// 								 </table>
	// 							  </td>
	// 						   </tr>
	// 						</table>
	// 					 </td>
	// 				  </tr>

	// 				 <tr>
	// 					 <td>
	// 						<table border="0" cellpadding="0" cellspacing="0" width="100%" align="right" class="wrapper">
	// 						   <tr>
	// 							  <td>
	// 								 <table border="0" cellpadding="0" cellspacing="0" width="100%">
	// 									<tr style="background: #333;">
	// 										<td align="left" style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 22px;" class="centrado">
	// 										  <a href="" style="color:#fff"> </a>
	// 										</td>
	// 										<td align="right" style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 18px;" class="centrado">
	// 										   <a href="http://amdenegocios.com/" style="color:#ccc">ANE</a>.
	// 									   </td>
	// 									</tr>
	// 								 </table>
	// 							  </td>
	// 						   </tr>
	// 						</table>
	// 					 </td>
	// 				  </tr>



	// 			   </table>
	// 			</td>
	// 		 </tr>
	// 	  </table>

	//    </body>
	// </html>';

		$r["continuar"] = true;

	// 	$mail->Subject    = "Registro de Visita - ANE";
	// 	$mail->MsgHTML($cadena);
	// 	$mail->AddCC($emailAnfitrion);
	// 	$mail->AddAddress($email, $invitado);
	// 	if (!$mail->Send()) {
	// 		$r['enviado'] = false;
	// 	} else {
	// 		$r['enviado'] = true;
	// 	}
	} catch (Exception $e) {
		$r["continuar"] = false;
		$r['message'] = $e;
	}
	echo json_encode($r);
} else if ($combo == 'guardaNegocio') {
	try {
		$stm = $bd->prepare("INSERT INTO negocios (fecha,id_usuario,miembro,monto,porcentaje,comision,pagado,fechar) VALUES (NOW(),:id_usuario,:miembro,:monto,:porcentaje,:comision,:pagado,:fechar)");
		$stm->execute(array(
			':id_usuario' => $id,
			':miembro' => $miembros,
			':monto' => $monto,
			':porcentaje' => $porcentaje,
			':comision' => $comision,
			':pagado' => $pagado,
			':fechar' => $fecha
		));

		$stm2 = $bd->query("SELECT first_name, last_name, email FROM usuarios WHERE id = $id");
		$anfitrion = $stm2->fetch();
		$nameAnfitrion = $anfitrion['first_name'] . ' ' . $anfitrion['last_name'];
		$emailAnfitrion = $anfitrion['email'];

		$stm3 = $bd->query("SELECT first_name, last_name, email FROM usuarios WHERE id = $miembros");
		$negocio = $stm3->fetch();
		$nameNegocio = $negocio['first_name'] . ' ' . $negocio['last_name'];
		$emailNegocio = $negocio['email'];

		$cadena = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
																	   ' . $fecha . '<br><br>


																	</td>
																	<td width="0.1%"></td>
																	<td align="left" style="padding: 2px 10px 2px 10px;  color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px;" class="mobile-text-pad" width="60%">
																	  <b>¡Hola! Se concreto un negocio entre:</b><br><br>

																	   <b>Miembro que registró el negocio:</b> ' . $nameAnfitrion . ' <br>
																	   <b>Negocio concretado con:</b> ' . $nameInvitado . ' <br>
																	   <b>Monto en Pesos:</b> $' . $monto . ' <br>
																	   <b>Porcentaje de comisión:</b> ' . $porcentaje . '% <br>
																	   <b>Comisión por pagar:</b> $' . $comision . ' <br>
																	   <b>Pagada:</b> ' . $pagado . ' <br>

																	   ¡Excelente trabajo!<br><br>
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
														<tr style="background: #333;">	
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

		$r["continuar"] = true;

		$mail->Subject    = "Registro de Negocio - ANE";
		$mail->MsgHTML($cadena);
		$mail->AddCC($emailAnfitrion);
		$mail->AddAddress($emailNegocio, $nameNegocio);
		if (!$mail->Send()) {
			$r['enviado'] = false;
		} else {
			$r['enviado'] = true;
		}
	} catch (Exception $e) {
		$r["continuar"] = false;
		$r['message'] = $e;
	}
	// $r["sql"] = $sql;
	// $r["enviado"] = $sql1;
	// $r["mail"] = $emailr;
	// $r['redireccion'] = $redireccion;
	echo json_encode($r);
}
// else if($combo=='guardaPass'){
// 		try {

// 				 $sql="update usuarios set Password = '$pass' where IdUsuario = $id;";
// 				$bd->query($sql);
// 			$r["continuar"]=true;
// 		} catch (Exception $e) {
// 			$r["continuar"]=$e;
// 		}
// 		$r["sql"]=$sql;
// 		echo json_encode($r);
// 	}else if($combo=='validaEmail'){
// 		try{
// 			$result = $bd->query("SELECT count(email) as total FROM invitados WHERE email= '$email'");
// 			foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	}			
// 			$r["resultados"]=$row['total'];
// 			$result = $bd->query("SELECT count(email) as total FROM usuarios WHERE email= '$email'");
// 			foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	}			
// 			$r["resultadosu"]=$row['total'];
// 		} catch (Exception $e) {
// 			$r["continuar"]=$e;
// 		}
// 		echo json_encode($r);
// 	}
else if ($combo == 'guardarMiembro') {
	try {
		$stm = $bd->prepare("INSERT INTO usuarios (fecha,type,status,pass,email,phone,first_name,last_name,empresa,giro,especialidad,servicios,verificado) VALUES (NOW(),2,'Activo',:pass,:email,:phone,:first_name,:last_name,:empresa,:giro,:especialidad,:servicios,1)");
		$stm->execute(array(
			':pass' => $pass,
			':email' => $email,
			':phone' => $telefono,
			':first_name' => $nombre,
			':last_name' => $apellido,
			':empresa' => $empresa,
			':giro' => $profesiones,
			':especialidad' => $especialidad,
			':servicios' => $servicios
		));

		if ($stm->rowCount() > 0) {
			$r["continuar"] = true;
		} else {
			$r["continuar"] = false;
			$r['message'] = 'Error al guardar el registro';
		}
	} catch (Exception $e) {
		$r["continuar"] = false;
		$r['message'] = $e;
	}
	echo json_encode($r);
} else if ($combo == 'guardarUsuario') {
	$r['first_name'] = $nombre;
	$r['last_name'] = $apellido;
	$r['email'] = $email;
	$r['phone'] = $telefono;
	$r['empresa'] = $empresa;
	$r['giro'] = $profesiones;
	$r['especialidad'] = $especialidad;
	$r['servicios'] = $servicios;
	$r['status'] = $estado;
	$r['type'] = $tipo;
	$r['id'] = $id;
	try {
		$stm = $bd->prepare("UPDATE usuarios SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, empresa = :empresa, giro = :giro, especialidad = :especialidad, servicios = :servicios, status = :status, type = :type WHERE id = :id");

		$stm->execute(array(
			':first_name' => $nombre,
			':last_name' => $apellido,
			':email' => $email,
			':phone' => $telefono,
			':empresa' => $empresa,
			':giro' => $profesiones,
			':especialidad' => $especialidad,
			':servicios' => $servicios,
			':status' => $estado,
			':type' => $tipo,
			':id' => $id
		));

		$r["continuar"] = true;
	} catch (Exception $e) {
		$r["continuar"] = false;
		$r['message'] = $e;
	}
	$r["sql"] = $sql;
	$r["enviado"] = $sql1;
	$r["mail"] = $emailr;
	$r['redireccion'] = 1;
	echo json_encode($r);
} elseif ($combo == 'recoveryPass') {
	if ($email != "") {
		try {
			$bd->query('SET SQL_SAFE_UPDATES=0;');
			$sql = "SELECT * FROM usuarios WHERE  email='$email' AND  verificado = 1 ";
			$res = $bd->query($sql);
			if ($res->rowCount() > 0) {
				$res = $res->fetchAll(PDO::FETCH_ASSOC);
				$d = $res[0];

				$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
				$password = "";
				//Reconstruimos la contraseña segun la longitud que se quiera
				for ($i = 0; $i < 8; $i++) {
					//obtenemos un caracter aleatorio escogido de la cadena de caracteres
					$password .= substr($str, rand(0, 62), 1);
				}

				$md5pass = md5($password);

				$sql = "UPDATE usuarios SET pass='$md5pass' WHERE email='$email'";
				$res = $bd->query($sql);

				$nombre = $d["fist_name"];
				$email['email'] = $d["email"];

				$cadena = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
															  <table border="0" cellpadding="0" cellspacing="0" width="100%" align="left"
																  class="wrapper">
																  <tr>
																	  <td>
																		  <table border="0" cellpadding="0" cellspacing="0" width="100%">
																			  <tr>
																				  <td bgcolor="#ebeef2" align="left"
																					  style="padding: 2px 10px 2px 10px; color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px; margin-right:1%;"
																					  class="mobile-text-pad" width="39.9%"><br>
																					  <h1 style="line-height:40px;">Notificación de Cambio de Contraseña</h1><br><br>      
					  
																				  </td>
																				  <td width="0.1%"></td>
																				  <td align="left"
																					  style="padding: 2px 10px 2px 10px;  color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px;"
																					  class="mobile-text-pad" width="60%">
																					  <b>¡Hola ' . $nombre . '! Has solicitado el cambio de tu contraseña.</b><br><br>
																					  Tu nueva contraseña es: <b>' . $password . '</b><br><br>
																					  
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

				$mail->Subject    = "Recuperación de Contraseña - ANE";
				$mail->MsgHTML($cadena);
				$address = $email;
				$mail->AddAddress($address, $nombre);
				if (!$mail->Send()) {
					$sql1 = false;
				} else {
					$sql1 = true;
				}

				$r['continuar'] = true;
				$r['enviado'] = $sql1;
			} else {
				$r['continuar'] = false;
				$r['message'] = "La cuenta de correo no esta registrada";
			}
		} catch (Exception $e) {
			$r['continuar'] = false;
			$r['message'] = $e;
		}
	} else {
		$r['continuar'] = false;
		$r['message'] = "No has introducido ningún correo";
	}
	echo json_encode($r);
} elseif ($combo == 'login') {
	try {
		$sql = "SELECT * FROM usuarios WHERE email='$email' AND pass='$pass' AND  verificado = 1 ";
		$res = $bd->query($sql);
		if ($res->rowCount() > 0) {
			$res = $res->fetchAll(PDO::FETCH_ASSOC);
			$d = $res[0];
			unset($d["pass"]);
			$_SESSION['id'] = $d["id"];
			// $_SESSION['email']=$d["email"];
			// $_SESSION['country']=$d["country"];
			// $_SESSION['phone']=$d["phone"];
			// $_SESSION['usuario']=$d["Usuario"];
			// $_SESSION['verificado']=$d["verificado"];
			// $_SESSION['estatus']=$d["Estatus"];
			// $_SESSION['type']=$d["type"];
			// $_SESSION['empresa']=$d["empresa"];

			$r['continuar'] = true;
		} else {
			$r['continuar'] = false;
			$r['message'] = "Usuario y/o contraseña incorrecta";
		}
	} catch (Exception $e) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}

	echo json_encode($r);
} elseif ($combo == 'eliminarMiembro') {
	try {
		$sql = "DELETE FROM usuarios WHERE id='$id'";
		$res = $bd->query($sql);
		if ($res->rowCount() > 0) {
			$r['continuar'] = true;
		} else {
			$r['continuar'] = false;
			$r['message'] = "Error al borrar al miembro";
		}
	} catch (Exception $e) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}

	echo json_encode($r);
} elseif ($combo == 'convertirMiembro') {
	try {
		$stm = $bd->query("SELECT * FROM invitados WHERE id = $id");
		$res = $stm->fetch();

		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$password = "";
		//Reconstruimos la contraseña segun la longitud que se quiera
		for ($i = 0; $i < 8; $i++) {
			//obtenemos un caracter aleatorio escogido de la cadena de caracteres
			$password .= substr($str, rand(0, 62), 1);
		}

		$md5pass = md5($password);

		$stm2 = $bd->prepare("INSERT INTO usuarios (fecha,type,status,pass,email,phone,first_name,last_name,empresa,giro,especialidad,servicios,verificado) VALUES (NOW(),2,'Activo',:pass,:email,:phone,:first_name,:last_name,:empresa,:giro,:especialidad,:servicios,1)");
		$stm2->execute(array(
			':pass' => $md5pass,
			':email' => $res['email'],
			':phone' => $res['telefono'],
			':first_name' => $res['first_name'],
			':last_name' => $res['last_name'],
			':empresa' => $res['empresa'],
			':giro' => $res['profesion'],
			':especialidad' => $res['especialidad'],
			':servicios' => $res['servicios']
		));

		$bd->query("DELETE FROM invitados WHERE id = $id");

		$cadena = '<!DOCTYPE html
		PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
		<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
		<title>Page title</title>
		<style type="text/css">
			#outlook a {
				padding: 0
			}
	
			.ReadMsgBody {
				width: 100%
			}
	
			.ExternalClass {
				width: 100%
			}
	
			.ExternalClass,
			.ExternalClass p,
			.ExternalClass span,
			.ExternalClass font,
			.ExternalClass td,
			.ExternalClass div {
				line-height: 100%
			}
	
			body,
			table,
			td,
			a {
				-webkit-text-size-adjust: 100%;
				-ms-text-size-adjust: 100%
			}
	
			table,
			td {
				mso-table-lspace: 0;
				mso-table-rspace: 0
			}
	
			img {
				-ms-interpolation-mode: bicubic
			}
	
			body {
				margin: 0;
				padding: 0
			}
	
			img {
				border: 0;
				height: auto;
				line-height: 100%;
				outline: 0;
				text-decoration: none
			}
	
			table {
				border-collapse: collapse !important
			}
	
			.apple-links a {
				color: #999;
				text-decoration: none
			}
	
			@media screen and (max-width:600px) {
				td[class="logo"] img {
					margin: 0 auto !important
				}
	
				table[class="wrapper"] {
					width: 100% !important
				}
	
				td[class="mobile-image-pad"] {
					padding: 0 10px 0 10px !important
				}
	
				td[class="mobile-title-pad"] {
					padding: 30px 10px 0 10px !important
				}
	
				td[class="mobile-text-pad"] {
					padding: 10px 10px 10px 10px !important
				}
	
				td[class="mobile-column-right"] {
					padding-top: 20px !important
				}
	
				td[class="centrado"] {
					text-align: center !important;
					padding: 5px 10px 5px 10px !important
				}
	
				img[class="fluid-image"] {
					width: 100% !important;
					height: auto !important
				}
	
				td[class="hide"] {
					display: none !important
				}
	
				td[class="mobile-button"] {
					padding: 12px 60px 12px 60px !important
				}
	
				td[class="mobile-button"] a {
					font-size: 24px !important
				}
			}
		</style>
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
											<span style="font-size:32px;line-height:36px;color:#fff">Alianza Nacional de
												Emprendedores</span>
										</td>
									</tr>
									<tr bgcolor="">
										<td align="center"
											style="padding:5px 0 5px 10px;color:#fff;font-family:Arial,Verdana,sans-serif;font-weight:bold;font-size:32px;line-height:36px"
											class="mobile-title-pad"></td>
									</tr>
	
								</table>
							</td>
						</tr>
						<tr>
							<td style="">
								<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" align="left"
												class="wrapper">
												<tr>
													<td>
														<table border="0" cellpadding="0" cellspacing="0" width="100%">
															<tr>
																<td bgcolor="#ebeef2" align="left"
																	style="padding: 2px 10px 2px 10px; color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px; margin-right:1%;"
																	class="mobile-text-pad" width="39.9%">
																	<h1 style="line-height:40px;"><br>Notificación de Invitación</h1>
																	<br><br>
	
	
																</td>
																<td width="0.1%"></td>
																<td align="left"
																	style="padding: 2px 10px 2px 10px;  color: #666666; font-family:Arial,Verdana,sans-serif; font-weight: normal; font-size: 15px; line-height: 22px;"
																	class="mobile-text-pad" width="60%">
																	<b>¡Hola ' . $res['first_name'] . ' ' . $res['last_name'] . '! Has sido invitado a formar parte de ANE.</b><br><br>
																	Tu correo para ingresar es: <b>' . $res['email'] . '</b>.<br>
																	Tu contraseña para ingresar es: <b>' . $password . '</b>.<br><br>
																	
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
								<table border="0" cellpadding="0" cellspacing="0" width="100%" align="right"
									class="wrapper">
									<tr>
										<td>
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr style="background: #333;
						">
													<td align="left"
														style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 22px;"
														class="centrado">
														<a href="" style="color:#fff"> </a>
													</td>
													<td align="right"
														style="padding: 5px 10px 5px 10px; color: #fff; font-family:Arial,Verdana,sans-serif;  font-size: 15px; line-height: 18px;"
														class="centrado">
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

		$mail->Subject    = "Invitación - ANE";
		$mail->MsgHTML($cadena);
		$mail->AddAddress($res['email'], $res['first_name']);
		if (!$mail->Send()) {
			$r['enviado'] = false;
		} else {
			$r['enviado'] = true;
		}
		$r['continuar'] = true;
	} catch (\Throwable $th) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}


	echo json_encode($r);
} elseif ($combo == 'guardarGiro') {
	// $r['giro']=$giro;
	try {
		$stm = $bd->prepare("INSERT INTO giro (nombre) VALUES (:nombre)");
		$stm->execute(array(
			':nombre' => $giro
		));

		if ($stm->rowCount() > 0) {
			$r['continuar'] = true;
		} else {
			$r['continuar'] = false;
		}
	} catch (Exception $e) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}

	echo json_encode($r);
} elseif ($combo == 'guardarEspec') {
	// $r['giro']=$giro;
	// $r['especialidad']=$especialidad;
	try {
		$stm = $bd->prepare("INSERT INTO especialidad (especialidad, id_espec) VALUES (:especialidad, :id_espec)");
		$stm->execute(array(
			':especialidad' => $especialidad,
			':id_espec' => $giro
		));

		if ($stm->rowCount() > 0) {
			$r['continuar'] = true;
		} else {
			$r['continuar'] = false;
		}
	} catch (Exception $e) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}

	echo json_encode($r);
} elseif ($combo == 'actualizarGiro') {
	$r['giro'] = $giro;
	$nombre = $_POST['new-giro'];

	try {
		$stm = $bd->prepare("UPDATE giro SET nombre = '$nombre' WHERE id = $giro");
		$stm->execute();
		if ($stm->rowCount() > 0) {
			$r['continuar'] = true;
		} else {
			$r['continuar'] = false;
		}
	} catch (Exception $e) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}

	echo json_encode($r);
} elseif ($combo == 'actualizarEspec') {
	// $r['giro'] = $giro;
	// $r['especialidad'] = $especialidad;
	$nombre = $_POST['new-espec'];

	try {
		if ($nombre !== '' || $nombre !== null) {
			$stm = $bd->prepare("UPDATE especialidad SET especialidad = '$nombre', id_espec = $giro WHERE id = $especialidad");
		} else {
			$stm = $bd->prepare("UPDATE especialidad SET id_espec = $giro WHERE id = $especialidad");
		}

		$stm->execute();
		if ($stm->rowCount() > 0) {
			$r['continuar'] = true;
		} else {
			$r['continuar'] = false;
		}
	} catch (Exception $e) {
		$r['continuar'] = false;
		$r['message'] = $e;
	}

	echo json_encode($r);
} elseif ($combo == 'eliminarGiro') {
	try {
		$stm = $bd->prepare("DELETE FROM especialidad WHERE id_espec = $giro");
		$stm->execute();

		$stm1 = $bd->prepare("DELETE FROM giro WHERE id = $giro");
		$stm1->execute();

		$r['continuar'] = true;
	} catch (Exception $e) {
		$r['continuar'] = true;
		$r['message'] = $e;
	}
} elseif ($combo == 'eliminarEspec') {
	try {
		$stm = $bd->prepare("DELETE FROM especialidad WHERE id = $especialidad");
		$stm->execute();

		$r['continuar'] = true;
	} catch (Exception $e) {
		$r['continuar'] = true;
		$r['message'] = $e;
	}
}
