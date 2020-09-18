<?php 


include 'layouts/header.php'; 
$id=$_GET['id'];
 $sql="SELECT * FROM usuarios WHERE idUsuario=$id";
		$result=$bd->query($sql);
		foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	
			 $usuario=$row['Usuario'];
			 $telefono=$row['phone'];
			 $email=$row['email'];
			  $empresa=$row['empresa'];
			   $miembro=$row['fist_name'];
			   $apellido=$row['last_name'];
			   $giro=$row['giro'];
			   $especialidad=$row['especialidad'];
			 $imagen=$row['imagen'];
			 $servicios=$row['servicios'];
			  $estado=$row['Estatus'];
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
						<?php $title ="Actualizar Miembro";
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
															<span class="d-none d-md-block">Miembro</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
														</a>
													</li>
												   
													
												</ul>

												<!-- Tab panes -->
												<div class="tab-content">
													<div class="tab-pane active p-3" id="home-1" role="tabpanel">
															<div class="card-body">

															   <!-- <h4 class="mt-0 header-title">Textual inputs</h4>-->
																<form id="save">
																
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
																			<option value=''>Selecciona </option>																		
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
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Servicios </label>
																	<div class="col-sm-5">
																		<input class="form-control" type="text" value="<?php echo $servicios; ?>" name="servicios" id="servicios" placeholder="Ingrese el nombre" required>
																	</div>
																</div>
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Nombre</label>
																	<div class="col-sm-5">
																		<input class="form-control" type="text" value="<?php echo $miembro; ?>" name="nombre" id="nombre" placeholder="Ingrese el nombre" required>
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
																		<input class="form-control" type="hidden" name="accion" value="guardarUsuario2">
																		<input class="form-control redireccion" type="hidden" name="redireccion" value="">
																	</div>
																</div>
																
																<div class="form-group row">
																	<label class="col-sm-2 col-form-label"><span class="red">*</span> Estado</label>
																	<div class="col-sm-5">
																		<select class="form-control estado" name="estado" id="" required>
																			<option value="Inactivo" <?php if($estado =='Inactivo'){ echo 'selected';} ?> >Inactivo </option>
																			<option value="Activo" <?php if($estado =='Activo'){ echo 'selected';} ?> >Activo </option>	
																																							
																		</select>																	
																	</div>
																</div>	
																
																<div class="form-group m-b-0 offset-sm-2" >
																		<div>
																		
																		<button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 "  id="btn2"  >
																			Actualizar
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
				// fillProfesiones();
				<?php if($especialidad > 0 || $giro > 0){?>
					fillEspecialidades(<?php echo $giro;?>,<?php echo $especialidad;?>);					
				<?php } ?>
				
				$('#save').on('submit',function(e) {
				  e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
				  if ( $(this).parsley().isValid() ) {
					 $.ajax({
					   dataType: "json",
						  data: $("#save").serialize(), 
						  type: "POST",
						  context: this,
						  url: "scripts/acciones.php",
						  success: function(data){ 
							   console.log(data);
										if(data.continuar ==  true){
											Swal.fire({
												icon: 'success',
												text: '¡Gracias! Registro guardado',
											})
											$('#save').trigger("reset");
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
				$('#saveu').on('submit',function(e) {
				  e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
				  if ( $(this).parsley().isValid() ) {
					 $.ajax({
					   dataType: "json",
						  data: $("#saveu").serialize(), 
						  type: "POST",
						  context: this,
						  url: "scripts/acciones.php",
						  success: function(data){ 
							   console.log(data);
										if(data.continuar ==  true){
											Swal.fire({
												icon: 'success',
												text: 'Datos actualizada',
											})
											
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