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
						<?php $title ="Formulario Referencias";
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
                                                        <span class="d-none d-md-block">Referencia</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                                    </a>
                                                </li>
                                               
                                                
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                                        <div class="card-body">

														   <!-- <h4 class="mt-0 header-title">Textual inputs</h4>-->
															<form id="saver">
															<div class="form-group row">
																<label for="example-text-input" class="col-sm-2 col-form-label">Referencia</label>
																<div class="col-sm-10">
																	<select class="form-control" name="referencia" id="miembros">
																		<option>Selecciona un miembro</option>
																		
																	</select>
																	<input class="form-control" type="hidden" name="id" value="<?php echo $id_usuario; ?>">
																	<input class="form-control" type="hidden" name="accion" value="guardaReferencia">
																</div>
															</div>
															<div class="form-group m-b-0" style="float: right;">
																	<div>
																		<button type="button" class="btn btn-primary waves-effect waves-light m-r-5" onclick="saver()">
																			Guardar Referencia
																		</button>
																		
																	</div>
																</div>
															</form>
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