<?php include 'layouts/header.php'; ?>

<?php include 'layouts/headerStyle.php'; ?>

<style>
	.boton{
		border: none !important;
		background: none !important;
	}
</style>

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
				<?php $title = "Convertir Miembro-Visitante";
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

										<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>Nombre del Visitante</th>
													<th>Giro</th>
													<th>Especialidad</th>
													<th>Acciones</th>
													<th>Empresa</th>
													<th>Telefono</th>
													<th>Email</th>
												</tr>
											</thead>


											<tbody>
												<?php $statement = $bd->query("SELECT * FROM invitados");
												$result = $statement->fetchAll();
													foreach($result as $row): ?>
												<tr>
													<?php 
													$idProf = $row['profesion'];
													$idEspec = $row['especialidad'];
													$stm=$bd->query("SELECT * FROM giro WHERE id = $idProf");
													$profesion = $stm->fetch();
													
													$stm=$bd->query("SELECT * FROM especialidad WHERE id = $idEspec");
													$especialidad = $stm->fetch();
													?>

													<td><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></td>
													<td><?php echo $profesion['nombre']; ?></td>
													<td><?php echo $especialidad['especialidad']; ?></td>
													<td><button onclick="convert(<?php echo $row['id']; ?>, '<?php echo $row['empresa']; ?>')" class="mr-3 text-muted boton" data-toggle="tooltip" data-placement="top" title="" data-original-title="Convertir"><i class="mdi mdi-pencil font-size-18"></i> Convertir</button></td>
													<td><?php echo $row['empresa'] ?></td>
													<td><?php echo $row['telefono'] ?></td>
													<td><?php echo $row['email'] ?></td>
												</tr>
													<?php endforeach; ?>
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
		function convert(id, empresa){
			console.log(id);
			Swal.fire({
                title: 'Advertencia',
                text: "¿Seguro de convertir a " + empresa + " en miembro?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, convertir'
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        dataType: "json",
                        data: {
                            accion: 'convertirMiembro',
                            id: id
                        },
                        type: "POST",
                        url: "scripts/acciones.php",
                        success: function(data) {
							console.log(data);
                            if (data.continuar == true) {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Convertido en miembro',
                                    text: 'Redirigiendo...',
                					showConfirmButton: false,
                                })
                                setInterval(function() {
                                    location.reload();
                                }, 3000)
                            } else {
                                Swal.fire({
                                    type: 'error',
                                    title: data.message,
                                    text: 'Reintentalo más tarde'
                                })
                            }
                        }
                    })
                }
            })
		}
		// function saver() {
		// 	$.ajax({
		// 		dataType: "json",
		// 		data: $("#saver").serialize(),
		// 		type: "POST",
		// 		context: this,
		// 		url: "scripts/acciones.php",
		// 		success: function(data) {
		// 			console.log(data);
		// 			if (data.continuar == true) {
		// 				Swal.fire({
		// 					icon: 'success',
		// 					text: 'Registro guardado',
		// 				})
		// 				$('#referencia').val('');

		// 			} else {
		// 				Swal.fire({
		// 					icon: 'error',
		// 					title: 'Oops...',
		// 					text: 'Problema al guardar'
		// 				})
		// 				$('#referencia').val('');
		// 			}
		// 		},
		// 		error: function(request, status, error) {
		// 			alert(request.responseText);
		// 		}
		// 	});
		// }
	</script>

</body>

</html>