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
						<?php $title ="Listado Formulario Invitados";
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

                                            <h4 class="mt-0 header-title">Formulario Invitados</h4>
                                           

                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
														<th>Nombre</th>
                                                        <th>Invitado</th>
														<th>Giro</th>
														<th>Empresa</th>
														<th>Servicios</th>
														<th>Años</th>
														<th>Telefono</th>
														<th>Email</th>
														<th>Redes</th>
														<th>No. Visitas</th>
                                                        <th>Fecha</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
													<?php											
											$result = $bd->query("SELECT v.*, fist_name, last_name FROM invitados v, usuarios u WHERE id_usuario = IdUsuario");
											foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	
												$giro = $row['giro'];
												if($giro >0){
												$result2 = $bd->query("SELECT * FROM giro WHERE id = $giro");
												foreach ($result2->fetchAll(PDO::FETCH_ASSOC) as $row2) {	
													$nombre = $row2['nombre'];
												}		
												}												
											?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
														<td><?php echo $row['fist_name'].' '.$row['last_name']; ?></td>
                                                        <td><?php echo $row['invitado'] ?></td>
														<td><?php echo $nombre; ?></td>
														<td><?php echo $row['empresa'] ?></td>
														<td><?php echo $row['servicios'] ?></td>
														<td><?php echo $row['anios'] ?></td>
														<td><?php echo $row['telefono'] ?></td>
														<td><?php echo $row['email'] ?></td>
														<td><?php echo $row['redes'] ?></td>
														 <td><?php echo $row['no_visitas'] ?></td>
                                                        <td><?php echo $row['fecha']; ?></td>
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