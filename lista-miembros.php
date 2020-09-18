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
						<?php $title ="Listado de Miembros";
						include 'layouts/topbar.php'; ?>
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

                                            <h4 class="mt-0 header-title">Miembros</h4>
                                           

                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
														<th>Miembro</th>														
														<th>Empresa</th>
														<th>Telefono</th>														
														<th>Email</th>
														<th>Tipo</th>	
														<th>Estado</th>
														<th>Acción</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
													<?php											
											$result = $bd->query("SELECT * FROM  usuarios  WHERE type = 2 OR type = 1 OR type = 0");
											foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	
												$tipo = $row['type'];
												$estado = $row['Estatus'];
												if($tipo == 1 || $tipo == 0){
													$tipo="Administrador";
												}else{
													$tipo="Normal";
												}
												if($estado == 'Activo'){
													$estado="<span style='color:green'>Activo</span>";
												}else{
													$estado="<span style='color:red'>Inactivo</span>";
												}
												/*$profesion = $row['profesion'];
												$especialidad = $row['especialidad'];
												
												$result2 = $bd->query("SELECT * FROM profesion WHERE id = $profesion");
												foreach ($result2->fetchAll(PDO::FETCH_ASSOC) as $row2) {	
													$profesion = $row2['profesion'];
												}
												$result3 = $bd->query("SELECT * FROM especialidad WHERE id = $especialidad");
												foreach ($result3->fetchAll(PDO::FETCH_ASSOC) as $row3) {	
													$especialidad = $row3['especialidad'];
												}	*/											
																								
											?>
                                                    <tr>
														<td><?php echo $row['fist_name']; ?></td>
														
														<td><?php echo $row['empresa'] ?></td>
														<td><?php echo $row['phone'] ?></td>
														<td><?php echo $row['email'] ?></td>
														<td><?php echo $tipo ?></td>
														<td><?php echo $estado ?></td>
														<td><a href="actualizar-miembro.php?id=<?php echo $row['IdUsuario']; ?>" class="mr-3 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"><i class="mdi mdi-pencil font-size-18"></i> Editar</a></td>
                                                    </tr>
											<?php 
											$nombre = "";
											}?>     
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
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
								$('#referencia').val('');
								
							}
							else{
								Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: 'Problema al guardar'
								  })
								  $('#referencia').val('');
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