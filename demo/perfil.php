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
														<form id="save1">
														<h4 class="mt-0 header-title">Informacion General </h4>
                                                        <div class="form-group">
                                                            <label for="productname">Nombre</label>
                                                            <input id="productname" name="nombre" type="text" class="form-control" value="<?php echo $nmiembro.' '.$napellido; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="manufacturername">Empresa</label>
                                                            <input id="manufacturername" name="empresa" type="text" class="form-control" value="<?php echo $empresa; ?>">
															
                                                        </div>
														<!-- <button type="button" class="btn btn-success waves-effect waves-light">Guardar</button>-->
														</form>
                                                    </div>
													
                                                    <div class="col-sm-6">
														<form id="save">
														<h4 class="mt-0 header-title">Cambiar contraseña</h4>
                                                        <div class="form-group">
                                                            <label for="productdesc">Ingresar su nueva contraseña</label>
                                                            <input id="manufacturername" name="pass" type="text" class="form-control">
															<input class="form-control" type="hidden" name="id" value="<?php echo $id_usuario; ?>">
																		<input class="form-control" type="hidden" name="accion" value="guardaPass">
                                                        </div>
														 <button type="button" class="btn btn-success waves-effect waves-light" onclick="save()">Actualizar</button>
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
			function save(){
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
		</script>

    </body>
</html>