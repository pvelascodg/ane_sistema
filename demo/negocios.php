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
						<?php $title ="Formulario Negocios Concretados";
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
                                                        <span class="d-none d-md-block">Negocios Concretados Miembros</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">
                                                        <span class="d-none d-md-block">Negocios Concretados Persona</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                                        <div class="card-body">

														   <!-- <h4 class="mt-0 header-title">Textual inputs</h4>-->
															<form id="savem">
															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Negocio concretado con:</label>
																<div class="col-sm-10">
																	<select class="form-control miembros" name="miembros" id="miembros">
																		<option>Selecciona un miembro</option>
																		
																	</select>
																	<input class="form-control" type="hidden" name="id" value="<?php echo $id_usuario; ?>">
																	<input class="form-control" type="hidden" name="accion" value="guardaNegocio">
																</div>
															</div>
															<div class="form-group row">
																<label for="example-text-input" class="col-sm-2 col-form-label">Comisión compartida</label>
																<div class="col-sm-10">
																	<select class="form-control porcentaje" name="porcentaje" >
																		<option>Selecciona una cantidad</option>
																		<option value="5">5%</option>
																		<option value="10">10%</option>
																		<option value="15">15%</option>
																		<option value="20">20%</option>
																		
																	</select>																	
																</div>
															</div>
															<div class="form-group row">
																<label for="example-text-input" class="col-sm-2 col-form-label">Monto en Pesos</label>
																<div class="col-sm-10">
																	<input class="form-control monto" type="text" name="monto"  placeholder="Ingrese el monto">															
																</div>
															</div>
															<div class="form-group row">
																<label for="example-text-input" class="col-sm-2 col-form-label">Comisión a Compartida</label>
																<div class="col-sm-10">
																	<input class="form-control comision" type="text" name="comision"  placeholder="" readonly>
																	
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Fecha de Reunión</label>
																<div class="col-sm-10">
																	<div class="input-group">
																		<input type="text" class="form-control" name="fecha" placeholder="aaaa-mm-dd" id="datepicker-autoclose">
																		<div class="input-group-append">
																			<span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
																		</div>
																	</div><!-- input-group -->																	
																</div>
															</div>
															<div class="form-group row">
																<label for="example-text-input" class="col-sm-2 col-form-label">Pagado</label>
																<div class="col-sm-10">
																	<select class="form-control" name="pagado" id="pagado">
																		<option value="No">No</option>
																		<option value="Si">Si</option>																																	
																		
																	</select>																	
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Pagado a:</label>
																<div class="col-sm-10">
																	<select class="form-control miembros" name="pagadoa" id="">
																		<option>Selecciona un miembro</option>
																		
																	</select>																	
																</div>
															</div>
															
															<div class="form-group m-b-0" style="float: right;">
																	<div>
																		<button type="button" class="btn btn-primary waves-effect waves-light m-r-5" onclick="savem();">
																			Guardar 
																		</button>
																		
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
																<label class="col-sm-2 col-form-label">Negocio concretado con:</label>
																<div class="col-sm-10">
																	<input class="form-control" type="text" name="invitado" placeholder="Ingrese el nombre">
																	<input class="form-control" type="hidden" name="id" value="<?php echo $id_usuario; ?>">
																	<input class="form-control" type="hidden" name="accion" value="guardaNegocioi">
																</div>
															</div>
															<div class="form-group row">
																<label for="example-text-input" class="col-sm-2 col-form-label">Comisión compartida</label>
																<div class="col-sm-10">
																	<select class="form-control porcentajei" name="porcentaje" >
																		<option>Selecciona una cantidad</option>
																		<option value="5">5%</option>
																		<option value="10">10%</option>
																		<option value="15">15%</option>
																		<option value="20">20%</option>
																		
																	</select>																	
																</div>
															</div>
															<div class="form-group row">
																<label for="example-text-input" class="col-sm-2 col-form-label">Monto en Pesos</label>
																<div class="col-sm-10">
																	<input class="form-control montoi" type="text" name="monto"  placeholder="Ingrese el monto">															
																</div>
															</div>
															<div class="form-group row">
																<label for="example-text-input" class="col-sm-2 col-form-label">Comisión a Compartida</label>
																<div class="col-sm-10">
																	<input class="form-control comisioni" type="text" name="comision"  placeholder="" readonly>
																	
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Fecha de Reunion</label>
																<div class="col-sm-10">
																	<div class="input-group">
																		<input type="text" class="form-control" name="fecha" placeholder="aaaa-mm-dd" id="datepicker-autoclose2">
																		<div class="input-group-append">
																			<span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
																		</div>
																	</div><!-- input-group -->																	
																</div>
															</div>
															<div class="form-group row">
																<label for="example-text-input" class="col-sm-2 col-form-label">Pagado</label>
																<div class="col-sm-10">
																	<select class="form-control" name="pagado" id="pagado">
																		<option value="No">No</option>
																		<option value="Si">Si</option></select>																	
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Pagado a:</label>
																<div class="col-sm-10">
																	<select class="form-control miembros" name="pagadoa" id="">
																		<option>Selecciona un miembro</option>																		
																	</select>																	
																</div>
															</div>
															<div class="form-group m-b-0" style="float: right;">
																	<div>
																		<button type="button" class="btn btn-primary waves-effect waves-light m-r-5" onclick="savei();">
																			Guardar 
																		</button>
																		
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
		$('.monto').change(function()
		{
			var monto = $(this).val();
			var porcentaje = $('.porcentaje').val();
			var total = monto * (porcentaje/100);
			$('.comision').val(total)
       
		});
		$('.porcentaje').change(function()
		{
			var porcentaje = $(this).val();
			var monto = $('.monto').val();
			var total = monto * (porcentaje/100);
			$('.comision').val(total)
       
		});
		$('.montoi').change(function()
		{
			var monto = $(this).val();
			var porcentaje = $('.porcentajei').val();
			var total = monto * (porcentaje/100);
			$('.comisioni').val(total)
       
		});
		$('.porcentajei').change(function()
		{
			var porcentaje = $(this).val();
			var monto = $('.montoi').val();
			var total = monto * (porcentaje/100);
			$('.comisioni').val(total)
       
		});
		
	});
	
	
	
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
						$(".miembros").html(option);
					}
				}
			});
		}
		
	</script>

    </body>
</html>