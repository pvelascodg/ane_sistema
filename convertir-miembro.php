<?php include 'layouts/header.php'; 

$id=$_GET['id'];
 $sql="SELECT * FROM invitados WHERE id=$id";
		$result=$bd->query($sql);
		foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	
			 $usuario=$row['Usuario'];
			 $telefono=$row['telefono'];
			 $email=$row['email'];
			  $empresa=$row['empresa'];
			   $nombre=$row['invitado'];
			   $apellido=$row['last_name'];
			   $giro=$row['profesion'];
			   $especialidad=$row['especialidad'];
			 $imagen=$row['imagen'];
			 $servicios=$row['servicios'];
			  $fecha=$row['fechav'];
			   $anios=$row['anios'];
			   $tratamiento=$row['tratamiento'];
		}
		?>
<?php include 'layouts/headerStyle.php'; ?>

    <body class="fixed-left">

        <?php include 'layouts/loader.php'; ?>

        <!-- Begin page -->
        <div id="wrapper">

            <?php include 'layouts/navbar.php'; ?>            

            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
					<!-- Top Bar Start -->						
						<?php $title ="convertir Visitante a Miembro";
						include 'layouts/topbar.php'; ?>
                    <!-- Top Bar End -->                    

                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">

                            <div class="row">
								     <div class="col-lg-12">
										<div class="card m-b-20">
											<div class="card-body">

												
												<!-- Nav tabs -->
												<ul class="nav nav-pills nav-justified" role="tablist">
													<li class="nav-item waves-effect waves-light">
														<a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">
															<span class="d-none d-md-block">Visitante</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
														</a>
													</li>
												   
													
												</ul>

												<!-- Tab panes -->
												<div class="tab-content">
													<div class="tab-pane active p-3" id="home-1" role="tabpanel">
															<div class="card-body">

															   <!-- <h4 class="mt-0 header-title">Textual inputs</h4>-->
																<form id="savev">
																
																<div class="form-group row">
																	<label class="col-sm-2 col-form-label"><span class="red">*</span> Giro</label>
																	<div class="col-sm-5">
																			<select class="form-control profesiones" name="profesiones" id="" required>
																			<option value="0">Selecciona </option>
																			<?php $sql="SELECT * FROM giro ";
																			$res=$bd->query($sql);
																			$r="<option value=''>Elige un Giro</option>";
																			foreach($res->fetchAll(PDO::FETCH_ASSOC) as $row){
																				if($giro == $row["id"]){$selected="selected";}
																				echo $r='<option value="'.$row["id"].'" '.$selected.'>'.$row["nombre"].'</option>';
																				$selected="";
																			}	
																			?>																			
																		</select>																			
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-sm-2 col-form-label"><span class="red">*</span> Especialidad</label>
																	<div class="col-sm-5">
																		<select class="form-control especialidades" name="especialidad" id="" required>
																			<option>Selecciona </option>																		
																		</select>																	
																	</div>
																</div>	
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Años en el negocio  </label>
																	<div class="col-sm-5">
																		<select class="form-control anios" name="anios" id="" required>
																			<option value>Selecciona </option>
																			<option value="1" <?php if($anios =='1'){ echo 'selected';} ?>>1 </option>
																			<option value="2" <?php if($anios =='2'){ echo 'selected';} ?>>2 </option>
																			<option value="3" <?php if($anios =='3'){ echo 'selected';} ?>>3 </option>
																			<option value="4" <?php if($anios =='4'){ echo 'selected';} ?>>4 </option>
																			<option value="5-10" <?php if($anios =='5-10'){ echo 'selected';} ?>>5-10 </option>
																			<option value="11-15" <?php if($anios =='11-15'){ echo 'selected';} ?>>11-15 </option>	
																			<option value="16-20" <?php if($anios =='16-20'){ echo 'selected';} ?>>16-20 </option>
																		</select>
																	</div>
																</div>	
																<div class="form-group row">
																<label class="col-sm-2 col-form-label"><span class="red">*</span>Fecha de Visita</label>
																<div class="col-sm-5">
																	<div class="input-group">
																		<input type="text" class="form-control datepicker-autoclose" name="reunion" placeholder="aaaa-mm-dd" value="<?php echo $fecha; ?>"  >
																		<div class="input-group-append">
																			<span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
																		</div>
																	</div><!-- input-group -->																	
																</div>
															</div>
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Servicios que ofrece </label>
																	<div class="col-sm-5">
																		<input class="form-control" type="text" value="<?php echo $servicios; ?>" name="servicios" id="servicios" placeholder="Ingrese servicios" required>
																	</div>
																</div>		
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Título </label>
																	<div class="col-sm-5">
																	
																		<select class="form-control tratamiento" name="tratamiento" id="" required>
																			<option value>Selecciona </option>
																			<option value="Dr." <?php if($tratamiento == 'Dr.'){ echo 'selected';} ?>>Dr. </option>
																			<option value="Prof." <?php if($tratamiento == 'Prof.'){ echo 'selected';} ?>>Prof. </option>
																			<option value="Sr." <?php if($tratamiento == 'Sr.'){ echo 'selected';} ?>>Sr. </option>
																			<option value="Sra." <?php if($tratamiento == 'Sra.'){ echo 'selected';} ?>>Sra. </option>
																			<option value="Srita." <?php if($tratamiento == 'Srita.'){ echo 'selected';} ?>>Srita. </option>
																			
																		</select>
																	</div>
																</div>	
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Nombre de la empresa </label>
																	<div class="col-sm-5">
																		<input class="form-control" type="text" value="<?php echo $empresa; ?>" name="empresa" id="empresa" placeholder="Ingrese el nombre" required>
																	</div>
																</div>
																
																
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Nombre Invitado</label>
																	<div class="col-sm-5">
																		<input class="form-control" type="text" value="<?php echo $nombre; ?>" name="invitado" id="invitado" placeholder="Ingrese el nombre" required>
																	</div>
																</div>		
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Teléfono  </label>
																	<div class="col-sm-5">
																		<input class="form-control" type="text" value="<?php echo $telefono; ?>" name="telefono" id="telefono" placeholder="5512345678" required data-parsley-minlength="10" maxlength="10" >
																	</div>
																</div>
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Correo Electrónico  </label>
																	<div class="col-sm-5">
																		<input class="form-control" type="email" value="<?php echo $email; ?>" name="email" id="email" placeholder="email@email.com" required>
																		<input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>">
																		<input class="form-control" type="hidden" name="accion" value="convertirMiembro">
																		<input class="form-control redireccion" type="hidden" name="redireccion" value="">
																		<input class="form-control" type="hidden" name="pass" value="password">
																	</div>
																</div>																
																<div class="form-group m-b-0 offset-sm-2" >
																		<div>
																			<button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 " id="btn1" >
																			Confirmar como miembro 
																		</button>
																		<a type="button" href="dashboard.php" class="btn btn-primary waves-effect waves-light m-r-5" onClick="" >
																			Cerrar
																		</a>
																			
																		</div>
																</div>
															   
															</div>
									   
													</div>
													<div class="tab-pane p-3" id="profile-1" role="tabpanel">
															<div class="card-body">

															   <!-- <h4 class="mt-0 header-title">Textual inputs</h4>-->
																

																
																
																
																<div class="form-group m-b-0" style="float: right;">
																		<div>
																			<button type="submit" class="btn btn-primary waves-effect waves-light m-r-5">
																				Guardar Invitado
																			</button>
																			<button type="reset" class="btn btn-secondary waves-effect">
																				Cancelar
																			</button>
																		</div>
																	</div>
															   
															</div>
													</div>
													
												</div>

											</div>
										</div>
									</div>
                           
                                
                            </div> <!-- end row -->

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <?php include 'layouts/footer.php'; ?>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->

        <?php include 'layouts/footerScript.php'; ?>

        <!-- App js -->
        <script src="public/assets/js/app.js"></script>
		<script>
		$(document).ready(function(e) {		
		 fillMiembros(<?php echo $id_usuario; ?>);		
		  <?php if($especialidad > 0 || $giro > 0){?>
					fillEspecialidades(<?php echo $giro;?>,<?php echo $especialidad;?>);					
				<?php } ?>
		  
			$('#btn1').on('click', function() {
				$(".redireccion").val('0');
			});
			$('#btn2').on('click', function() {
				$(".redireccion").val('1');
			});
			
			$( "#email" ).change(function() {
			  var email = $("#email").val();				
				$.ajax({
					 dataType: "json",
				     url:"scripts/acciones.php",
					 data:{'accion':'validaEmail','email':email},
					 type:'POST',
					 context: this,
					success: function(option){
						   console.log(option);
									if(option.resultados > 0){										
										  Swal.fire({
										  position: 'bottom-center',
										  icon: 'warning',
										  text: 'El correo ya fue usado por otro visitante, ingresar otro',
										  showConfirmButton: false,
										  timer: 1500
										})
										$("#email").val('');
									}
									if(option.resultadosu > 0){										
										  Swal.fire({
										  position: 'bottom-center',
										  icon: 'warning',
										  text: 'El correo ya fue usado por un miembro, ingresar otro',
										  showConfirmButton: false,
										  timer: 3000
										})
										$("#email").val('');
									}
									
									}
					  
				  });
				
			});
			
		$('#savev').on('submit',function(e) {
			  e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
			  if ( $(this).parsley().isValid() ) {
				  $.ajax({
				   dataType: "json",
					  data: $("#savev").serialize(), 
					  type: "POST",
					  context: this,
					  url: "scripts/acciones.php",
					  success: function(data){ 
						   console.log(data);
									if(data.continuar ==  true){
										Swal.fire({
											icon: 'success',
											text: 'Registro guardado',
										})
										if(data.redireccion == 0){
											document.location.href = 'lista-registro.php';
										}else{
											document.location.href = 'dashboard.php';
										}
									}
									else{
										Swal.fire({
										  icon: 'error',
										  title: 'Oops...',
										  text: 'Problema al guardar'
										  })
									}
					  },
					  error: function (request, status, error) {
							alert(request.responseText);
						}
				  });
				  
				  
			  }
		
		
		
		
		});
			$('.profesiones').change(function()
			{
			var profesion = $(this).val();
			$.ajax({
				url:"scripts/acciones.php",
				data:{'accion':'getEspecialidades',id : profesion},
				type:'POST',
				cache:false,
				success: function(option){
					var v = option;
					if(v===false){
					}else{
						$(".especialidades").html(option);
					}
				}
			});
        
       
		});
		
	});
	
	
	


		function fillProfesiones()
		{ 
			$.ajax({
				url:"scripts/acciones.php",
				data:{'accion':'getProfesiones'},
				type:'POST',
				cache:false,
				success: function(option){
					console.log()
					var v = option;
					if(v===false){
					}else{
						$(".profesiones").html(option);
					}
				}
			});
		}
	
	function clear(){
		$(".clear").val('');
	}
	function fillMiembros(id)
		{ 
			$.ajax({
				url:"scripts/acciones.php",
				data:{'accion':'getGiros','id':id},
				type:'POST',
				cache:false,
				success: function(option){
					console.log(option)
					var v = option;
					if(v===false){
					}else{
						$(".giro").html(option);
					}
				}
			});
		}
		function fillEspecialidades(ide,select)
		{ 
			$.ajax({
				url:"scripts/acciones.php",
				data:{'accion':'getEspecialidades',id : ide, select:select},
				type:'POST',
				cache:false,
				success: function(option){
					var v = option;
					if(v===false){
					}else{
						$(".especialidades").html(option);
					}
				}
			});
		}
		
	</script>

    </body>
</html>