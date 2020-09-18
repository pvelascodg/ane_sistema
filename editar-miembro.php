<?php include 'layouts/header.php'; ?>

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
						<?php $title ="Formulario Invitados";
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
															<span class="d-none d-md-block">Invitado</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
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
																			<option>Selecciona </option>																		
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
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Nombre de la empresa </label>
																	<div class="col-sm-5">
																		<input class="form-control" type="text" value="" name="empresa" id="empresa" placeholder="Ingrese el nombre" required>
																	</div>
																</div>
																
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Servicios </label>
																	<div class="col-sm-5">
																		<input class="form-control" type="text" value="" name="servicios" id="servicios" placeholder="Ingrese el nombre" required>
																	</div>
																</div>
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Nombre</label>
																	<div class="col-sm-5">
																		<input class="form-control" type="text" value="" name="invitado" id="invitado" placeholder="Ingrese el nombre" required>
																	</div>
																</div>		
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Teléfono  </label>
																	<div class="col-sm-5">
																		<input class="form-control" type="text" value="" name="telefono" id="telefono" placeholder="5512345678" required data-parsley-minlength="10" maxlength="10" >
																	</div>
																</div>
																
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Correo Electrónico  </label>
																	<div class="col-sm-5">
																		<input class="form-control" type="email" value="" name="email" id="email" placeholder="email@email.com" required>
																		<input class="form-control" type="hidden" name="id" value="<?php echo $id_usuario; ?>">
																		<input class="form-control" type="hidden" name="accion" value="guardarMiembro">
																		<input class="form-control redireccion" type="hidden" name="redireccion" value="">
																	</div>
																</div>
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Contraseña </label>
																	<div class="col-sm-5">
																		<input class="form-control" type="password" value="" name="pass" id="pass" placeholder="Ingrese el contraseña" required>
																		<div class="m-t-10">
																		<input type="password" class="form-control" required
																			   data-parsley-equalto="#pass"
																			   placeholder="Reescriba la contraseña"/>
																	</div>
																	</div>
																	
																</div>
																
																<div class="form-group m-b-0 offset-sm-2" >
																		<div>
																			<button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 " id="btn1" >
																			Registrar y Nuevo
																		
																		<button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 "  id="btn2"  >
																			Registrar
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
		  fillProfesiones();
		  
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
											text: 'Miembro guardado',
										})
										if(data.redireccion == 0){
											$('#save').trigger("reset");
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
		
	</script>

    </body>
</html>