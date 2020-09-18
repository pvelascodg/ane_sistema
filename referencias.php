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
						<?php $title ="Registro de Referencias";
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
                                                        <span class="d-none d-md-block">Dar una referencia
</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                                    </a>
                                                </li>
												<!-- <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">
                                                        <span class="d-none d-md-block">Externo</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                                    </a>
                                                </li>-->
                                               
                                                
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                                        <div class="card-body">

														   <!-- <h4 class="mt-0 header-title">Textual inputs</h4>-->
															<form id="saver">
															<div class="form-group row">
																<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Referencia</label>
																<div class="col-sm-5">
																	<select class="form-control" name="referencia" id="miembros" required>
																		<option>Selecciona un miembro</option>
																		
																	</select>
																	<input class="form-control" type="hidden" name="id" value="<?php echo $id_usuario; ?>">
																	<input class="form-control" type="hidden" name="accion" value="guardaReferencia">
																	<input class="form-control redireccion" type="hidden" name="redireccion" value="">
																</div>
															</div>
															<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Tipo de Referencia  </label>
																	<div class="col-sm-5">
																		<select class="form-control tipo" name="tipo" id="" required>
																			<option value="Interno">Interno </option>
																			<option value="Externo">Externo </option>
																			
																			
																		</select>
																	</div>
																</div>	
															<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Que tan caliente esta la referencia  </label>
																	<div class="col-sm-5">
																		 <div class="p-4 " style="font-size: 20px;">
																			1	<input type="hidden" class="rating" name="caliente" data-filled="symbol symbol-filled" data-empty="symbol symbol-empty" data-fractions="1"/> 
																		</div>
																	</div>
																</div>	
																
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Nombre  </label>
																	<div class="col-sm-5">
																		<input class="form-control" type="text" value="" name="nombre" id="nombre" placeholder="Ingrese el nombre" required>
																	</div>
																</div>	
															<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Nombre de la empresa </label>
																	<div class="col-sm-5">
																		<input class="form-control" type="text" value="" name="empresa" id="empresa" placeholder="Ingrese el nombre" required>
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
																		<input class="form-control" type="hidden" name="accion" value="guardaReferencia">
																	</div>
																</div>
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Descripción  </label>
																	<div class="col-sm-5">
																		<textarea class="form-control" type="text" value="" name="descripcion"  required  ></textarea>
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
															</form>
														</div>
                                   
                                                </div>
                                                <div class="tab-pane p-3" id="profile-1" role="tabpanel">
														<div class="card-body">

														   <!-- <h4 class="mt-0 header-title">Textual inputs</h4>-->
															<form id="savere">
															<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label">Nombre Invitado</label>
																	<div class="col-sm-10">
																		<input class="form-control" type="text" value="" name="invitado" id="invitado" placeholder="Ingrese el nombre" required>
																	</div>
																</div>
																
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label">Nombre de la empresa </label>
																	<div class="col-sm-10">
																		<input class="form-control" type="text" value="" name="empresa" id="empresa" placeholder="Ingrese el nombre" required>
																	</div>
																</div>		
															<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label">Teléfono  </label>
																	<div class="col-sm-10">
																		<input class="form-control" type="text" value="" name="telefono" id="telefono" placeholder="Ej. 5512345678" required data-parsley-minlength="10" maxlength="10" >
																	</div>
																</div>
																
																<div class="form-group row">
																	<label for="example-text-input" class="col-sm-2 col-form-label">Correo Electrónico  </label>
																	<div class="col-sm-10">
																		<input class="form-control" type="email" value="" name="email" id="email" placeholder="Ej. email@email.com" required>
																		<input class="form-control" type="hidden" name="id" value="<?php echo $id_usuario; ?>">
																		<input class="form-control" type="hidden" name="accion" value="guardaReferenciae">
																		<input class="form-control redireccion" type="hidden" name="redireccion" value="">
																	</div>
																</div>															
															
															<div class="form-group m-b-0" style="float: right;">
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
														   </form>
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
		 	$('#btn1').on('click', function() {
				$(".redireccion").val('0');
			});
			$('#btn2').on('click', function() {
				$(".redireccion").val('1');
			});
		$('#saver').on('submit',function(e) {
			  e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
			  if ( $(this).parsley().isValid() ) {
				  $.ajax({
				   dataType: "json",
					  data: $("#saver").serialize(), 
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
											$('#saver').trigger("reset");
											fillMiembros(<?php echo $id_usuario; ?>);
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
										  $('#saver').trigger("reset");
										   fillMiembros(<?php echo $id_usuario; ?>);
									}
					  },
					  error: function (request, status, error) {
							alert(request.responseText);
						}
				  });
				  
				  
			  }
		
		
		
		
		});
		$('#savere').on('submit',function(e) {
			  e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
			  if ( $(this).parsley().isValid() ) {
				  $.ajax({
				   dataType: "json",
					  data: $("#savere").serialize(), 
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
										$('#savere').trigger("reset");	
										 fillMiembros(<?php echo $id_usuario; ?>);
										
									}
									else{
										Swal.fire({
										  icon: 'error',
										  title: 'Oops...',
										  text: 'Problema al guardar'
										  })
										  $('#savere').trigger("reset");
										   fillMiembros(<?php echo $id_usuario; ?>);
									}
					  },
					  error: function (request, status, error) {
							alert(request.responseText);
						}
				  });
				  
				  
			  }
		
		
		
		
		});
			
		
		
	});
	
	
	

	function saver(){
			$.ajax({
		   dataType: "json",
              data: $("#saver").serialize(), 
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
								 fillMiembros(<?php echo $id_usuario; ?>);
								
							}
							else{
								Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: 'Problema al guardar'
								  })
								   fillMiembros(<?php echo $id_usuario; ?>);
							}
			  },
			  error: function (request, status, error) {
        alert(request.responseText);
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
				data:{'accion':'getMiembros','id':id},
				type:'POST',
				cache:false,
				success: function(option){
					console.log(option)
					var v = option;
					if(v===false){
					}else{
						$("#miembros").html(option);
					}
				}
			});
		}
		
	</script>

    </body>
</html>