<?php include 'layouts/header.php'; ?>

    <!-- Select 2 -->
    <link href="public/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

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
                     <?php include 'layouts/topbar.php'; ?>
                    <!-- Top Bar End -->

                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Perfil de Usuario</h4>
                                            <p class="text-muted m-b-30 font-14"></p>

                                           
                                                <div class="row">
													 
                                                    <div class="col-sm-6">
														<form id="saveu">
														<h4 class="mt-0 header-title">Informacion General </h4>
                                                        <div class="form-group">
                                                            <label for="productname">Nombre</label>
                                                            <input id="productname" name="nombre" type="text" class="form-control" value="<?php echo $nmiembro; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="manufacturername">Empresa</label>
                                                            <input id="manufacturername" name="empresa" type="text" class="form-control" value="<?php echo $uempresa; ?>">
															
                                                        </div>
														<div class="form-group ">
																	<label class="col-form-label"><span class="red">*</span> Giro</label>
																	
																		<select class="form-control profesiones" name="profesiones" id="" required>
																			<option value="0">Selecciona </option>
																			<?php $sql="SELECT * FROM giro ";
																			$res=$bd->query($sql);
																			$r="<option value=''>Elige un Giro</option>";
																			foreach($res->fetchAll(PDO::FETCH_ASSOC) as $row){
																				if($ugiro == $row["id"]){$selected="selected";}
																				echo $r='<option value="'.$row["id"].'" '.$selected.'>'.$row["nombre"].'</option>';
																				$selected="";
																			}	
																			?>																			
																		</select>																	
																	
																</div>
																<div class="form-group ">
																	<label class="col-form-label"><span class="red">*</span> Especialidad</label>
																	
																		<select class="form-control especialidades" name="especialidad" id="" required>
																			<option value="0">Selecciona </option>																		
																		</select>																	
																
																</div>	
																 <div class="form-group">
																	<label for="manufacturername">Servicios</label>
																	<input id="manufacturername" name="servicios" type="text" class="form-control" value="<?php echo $uservicios; ?>">
																	
																</div>
																<div class="form-group ">
																	<label for="example-text-input" class="col-form-label"><span class="red">*</span> Teléfono  </label>
																
																		<input class="form-control" type="text" value="<?php echo $utelefono; ?>" name="telefono" id="telefono" placeholder="5512345678" required data-parsley-minlength="10" maxlength="10" >
																
																</div>
																<div class="form-group ">
																	<label for="example-text-input" class="col-form-label"><span class="red">*</span> Correo Electrónico  </label>
																
																		<input class="form-control" type="email" value="<?php echo $uemail; ?>" name="email" id="email" placeholder="email@email.com" required>
																		<input class="form-control" type="hidden" name="id" value="<?php echo $id_usuario; ?>">
																		<input class="form-control" type="hidden" name="accion" value="guardarUsuario">
																	
																
																</div>
														 <button type="submit" class="btn btn-success waves-effect waves-light">Actualizar</button>
														</form>
                                                    </div>
													
                                                    <div class="col-sm-6">
														<form id="save">
														<h4 class="mt-0 header-title">Cambiar contraseña</h4>
                                                        <div class="form-group">
                                                            <label for="productdesc">Ingresar su nueva contraseña</label>
                                                            <input id="pass" name="pass" type="password" class="form-control" placeholder="Escriba la contraseña" required>
															<div class="m-t-10">
																		<input type="password" class="form-control" required
																			   data-parsley-equalto="#pass"
																			   placeholder="Reescriba la contraseña"/>
																	</div>
															<input class="form-control" type="hidden" name="id" value="<?php echo $id_usuario; ?>">
																		<input class="form-control" type="hidden" name="accion" value="guardaPass">
                                                        </div>
														
														 <button type="submit" class="btn btn-success waves-effect waves-light" >Actualizar</button>
														</form>
                                                    </div>
                                                </div>
												

                                        </div>
                                    </div>

                                </div>
                            </div>

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
				<?php if($uespecialidad > 0 || $ugiro > 0){?>
					fillEspecialidades(<?php echo $ugiro;?>,<?php echo $uespecialidad;?>);					
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
												text: 'Contraseña actualizada',
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