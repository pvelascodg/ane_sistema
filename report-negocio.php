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
                <?php $title = "Reporte Gracias por Negocio Concretado";
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
                                                    <th>Miembro que agradece</th>
                                                    <th>Negocio concretado con</th>
                                                    <th>Monto</th>
                                                    <th>Porcentaje</th>
                                                    <th>Comision</th>
                                                    <th>Pagado</th>
                                                    <th>Fecha</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $stm = $bd->query("SELECT * FROM negocios");
                                                $res = $stm->fetchAll();

                                                foreach ($res as $row) :
                                                    $idrow = $row['id_usuario'];
                                                    $stm2 = $bd->query("SELECT first_name, last_name FROM usuarios WHERE id = $idrow");
                                                    $dataUser = $stm2->fetch();

                                                    $idNeg = $row['miembro'];
                                                    $stm3 = $bd->query("SELECT first_name, last_name FROM usuarios WHERE id = $idNeg");
                                                    $dataNegocio = $stm3->fetch();
                                                    // foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {	
                                                    // 	$persona = $row['miembro'];
                                                    // 	$nombre = $row['miembro'];
                                                    // 	$tipo=$row['tipo'];
                                                    // 	if($row['tipo'] == 'Otro'){
                                                    // 		$tipo="No es Miembro";
                                                    // 	}
                                                    // 	if($row['tipo'] == 'Miembro'){
                                                    // 	$result2 = $bd->query("SELECT fist_name, last_name FROM usuarios WHERE IdUsuario = $persona");
                                                    // 	foreach ($result2->fetchAll(PDO::FETCH_ASSOC) as $row2) {	
                                                    // 		$nombre = $row2['fist_name'];
                                                    // 	}	
                                                    // 	}	
                                                    // 	$nombre3=$row['pagadoa'];
                                                    // 	if($row['pagadoa'] > 0){
                                                    // 	$per=$row['pagadoa'] ;
                                                    // 	$result3 = $bd->query("SELECT fist_name, last_name FROM usuarios WHERE IdUsuario = $per");
                                                    // 	foreach ($result3->fetchAll(PDO::FETCH_ASSOC) as $row3) {	
                                                    // 		$nombre3 = $row3['fist_name'];
                                                    // 	}	
                                                    // 	}	

                                                ?>
                                                    <tr>
                                                        <td><?php echo $dataUser['first_name'] . ' ' . $dataUser['last_name']; ?></td>
                                                        <td><?php echo $dataNegocio['first_name'] . ' ' . $dataNegocio['last_name']; ?></td>
                                                        <td><?php echo '$ ' . $row['monto']; ?></td>
                                                        <td><?php echo $row['porcentaje'] . ' %'; ?></td>
                                                        <td><?php echo '$ ' . $row['comision']; ?></td>
                                                        <td><?php echo $row['pagado']; ?></td>
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

</body>

</html>