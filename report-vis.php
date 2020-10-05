<?php include 'layouts/header.php'; ?>

<?php include 'layouts/headerStyle.php'; ?>

<style>
    select.form-control {
        width: 75%;
    }

    .Propios {
        display: none;
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
                <?php $title = "Listado Formulario Vis a Vis";
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

                                        <!-- <h4 class="mt-0 header-title">Reportes Vis a Vis</h4> -->

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Miembro</th>
                                                    <th>Vis a Vis con</th>
                                                    <th>Miembro</th>
                                                    <th>Tipo de reunión</th>
                                                    <th>Fecha</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $sql = "SELECT * FROM vis";
                                                $stm = $bd->query($sql);
                                                $res = $stm->fetchAll();

                                                foreach ($res as $row) :
                                                    $idrow = $row['id_usuario'];
                                                    $stm2 = $bd->query("SELECT first_name, last_name FROM usuarios WHERE id = $idrow");
                                                    $dataUser = $stm2->fetch();

                                                    if ($row['persona'] == 0) {
                                                        $nombre = $row['nombre'];
                                                    } else {
                                                        $idpers = $row['persona'];
                                                        $stm3 = $bd->query("SELECT first_name, last_name FROM usuarios WHERE id = $idpers");
                                                        $dataPersona = $stm3->fetch();

                                                        $nombre = $dataPersona['first_name'] . ' ' . $dataPersona['last_name'];
                                                    }
                                                ?>
                                                    <tr>
                                                        <td><?php echo $dataUser['first_name'] . ' ' . $dataUser['last_name']; ?></td>
                                                        <td><?php echo $row['tipo']; ?></td>
                                                        <td><?php echo $nombre; ?></td>
                                                        <td><?php echo $row['reunion']; ?></td>
                                                        <td><?php echo $row['fechar']; ?></td>
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
        // function saver(){
        // 		$.ajax({
        // 	   dataType: "json",
        //           data: $("#saver").serialize(), 
        //           type: "POST",
        //           context: this,
        //           url: "scripts/acciones.php",
        //           success: function(data){ 
        // 			   console.log(data);
        // 						if(data.continuar ==  true){
        // 							Swal.fire({
        // 								icon: 'success',
        // 								text: 'Registro guardado',
        // 							})
        // 							$('#referencia').val('');

        // 						}
        // 						else{
        // 							Swal.fire({
        // 							  icon: 'error',
        // 							  title: 'Oops...',
        // 							  text: 'Problema al guardar'
        // 							  })
        // 							  $('#referencia').val('');
        // 						}
        // 		  },
        // 		  error: function (request, status, error) {
        //     alert(request.responseText);
        // }
        // 	  });
        // }
    </script>

</body>

</html>