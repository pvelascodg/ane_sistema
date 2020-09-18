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
						<?php $title ="Vis a Vis";
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
                                                        <span class="d-none d-md-block">Vis a Vis</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                                    </a>
                                                </li>
                                               <!-- <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">
                                                        <span class="d-none d-md-block">Invitado</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                                    </a>
                                                </li>-->
                                                
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                                        <div class="card-body">

														   <!-- <h4 class="mt-0 header-title">Textual inputs</h4>-->
															<form id="savem">
															<div class="form-group row">
																<label class="col-sm-2 col-form-label"><span class="red">*</span>Reunión con:</label>
																<div class="col-sm-5">
																	<select class="form-control miembros" name="miembros" id="miembros" required>
																		<option>Selecciona un miembro</option>
																		
																	</select>
																	<input class="form-control" type="hidden" name="id" value="<?php echo $id_usuario; ?>">
																	<input class="form-control" type="hidden" name="accion" value="guardaMiembro">
																	<input class="form-control redireccion" type="hidden" name="redireccion" value="">
																</div>
																<div class="col-sm-5">
																	<input class="form-control invitado" type="text" name="invitado" placeholder="Ingrese el nombre" style="display:none" >
																</div>
																
															</div>
															<div class="form-group row">
																<label class="col-sm-2 col-form-label"><span class="red">*</span>Como fue la reunión:</label>
																<div class="col-sm-5">
																	<select class="form-control" name="reunion" id="reunion" required>
																		<option value="">Selecciona </option>
																		<option value="WebMeeting">WebMeeting </option>
																		<option value="Presencial">Presencial</option>
																		
																	</select>
																	
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-2 col-form-label"><span class="red">*</span>Fecha de Reunion</label>
																<div class="col-sm-5">
																	<div class="input-group">
																		<input type="text" class="form-control datepicker-autoclose2" name="fecha" placeholder="aaaa-mm-dd" id="" required data-date-end-date="0d">
																		<div class="input-group-append">
																			<span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
																		</div>
																	</div><!-- input-group -->																	
																</div>
															</div>
															
															<div class="form-group m-b-0 offset-sm-2" >
																	<div>
																		<button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 btn1" id="btn1" >
																			Registrar y Nuevo
																		
																		<button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 btn2"  id="btn2" onClick="savem()"; >
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
															
															<form id="savei">
															<div class="form-group row">
																<label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span>Invitado</label>
																<div class="col-sm-10">
																	<input class="form-control" type="text" name="invitado" placeholder="Ingrese el nombre" required>
																	<input class="form-control" type="hidden" name="id" value="<?php echo $id_usuario; ?>">
																	<input class="form-control" type="hidden" name="accion" value="guardaInvitado">
																	<input class="form-control redireccion" type="hidden" name="redireccion" value="">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-2 col-form-label"><span class="red">*</span>Como fue la reunión:</label>
																<div class="col-sm-10">
																	<select class="form-control" name="reunion" id="reunion" required>
																		<option value="">Selecciona </option>
																		<option value="WebMeeting">WebMeeting </option>
																		<option value="Presencial">Presencial</option>
																		
																	</select>
																	
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-2 col-form-label"><span class="red">*</span>Fecha de Reunión</label>
																<div class="col-sm-10">
																	<div class="input-group">
																		<input type="text" class="form-control datepicker-autoclose2" name="fecha" placeholder="aaaa-mm-dd" required data-date-end-date="0d" >
																		<div class="input-group-append">
																			<span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
																		</div>
																	</div><!-- input-group -->																	
																</div>
															</div>
															
															<div class="form-group m-b-0 offset-sm-2" >
																	<div>
																		<div>
																		<button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 btn1" id="btn1" >
																			Registrar y Nuevo
																		
																		<button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 btn2"  id="btn2" onClick="savem()"; >
																			Registrar
																		</button>
																		<a type="button" href="dashboard.php" class="btn btn-primary waves-effect waves-light m-r-5" onClick="" >
																			Cerrar
																		</a>
																	</div>
																		
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
		 fillMiembrosO(<?php echo $id_usuario; ?>);	
		 $('.btn1').on('click', function() {
				$(".redireccion").val('0');
			});
			$('.btn2').on('click', function() {
				$(".redireccion").val('1');
			});
		$('.miembros').change(function()
		{
			var valor = $(this).val();
			if(valor=="Otro"){
				 $('.invitado').show();
			}else{
				 $('.invitado').hide();
			}
       
		});	
		$('#savem').on('submit',function(e) {
			console.log($(this.btn).attr('id'))
			 
			  e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
				  if ( $(this).parsley().isValid() ) {
				  $.ajax({
				   dataType: "json",
					  data: $("#savem").serialize(), 
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
											$('#savem').trigger("reset");
											fillMiembrosO(<?php echo $id_usuario; ?>);
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
	
		$('#savei').on('submit',function(e) {
			  e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
			  if ( $(this).parsley().isValid() ) {
				  $.ajax({
				   dataType: "json",
					  data: $("#savei").serialize(), 
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
											$('#savei').trigger("reset");
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
									}
					  },
					  error: function (request, status, error) {
							alert(request.responseText);
						}
				  });
				  
				  
			  }
		
		
		
		
		});
		}); 
	
	
	/*
	function savem(){
			$.ajax({
		   dataType: "json",
              data: $("#savem").serialize(), 
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
							}
			  },
			  error: function (request, status, error) {
        alert(request.responseText);
    }
		  });
	}
	function savei(){
			$.ajax({
		   dataType: "json",
              data: $("#savei").serialize(), 
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
	}*/
	
	function fillMiembrosO(id)
		{ 
			$.ajax({
				url:"scripts/acciones.php",
				data:{'accion':'getMiembrosO','id':id},
				type:'POST',
				cache:false,
				success: function(option){
					console.log(option)
					var v = option;
					if(v===false){
					}else{
						$(".miembros").html(option);
					}
				}
			});
		}
	function clear(){
		$('#savem').trigger("reset");
		$('#savei').trigger("reset");
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