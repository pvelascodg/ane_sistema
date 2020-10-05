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
                <?php $title = "Listado Formulario Referencias";
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

                                        <h4 class="mt-0 header-title">Formulario Referencias</h4>


                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Miembro que referenció</th>
                                                    <th>Referencia para</th>
                                                    <th>Tipo</th>
                                                    <th>Nombre</th>
                                                    <th>Empresa</th>
                                                    <th>Teléfono</th>
                                                    <th>Email</th>
                                                    <th>Termómetro</th>
                                                    <th>Fecha</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $sql = "SELECT * FROM referencias";
                                                $stm = $bd->query($sql);
                                                $res = $stm->fetchAll();

                                                foreach ($res as $row) :
                                                    $idrow = $row['id_usuario'];
                                                    $stm2 = $bd->query("SELECT first_name, last_name FROM usuarios WHERE id = $idrow");
                                                    $dataUser = $stm2->fetch();

                                                    $idref = $row['referencia'];
                                                    $stm2 = $bd->query("SELECT first_name, last_name FROM usuarios WHERE id = $idref");
                                                    $dataRef = $stm2->fetch();
                                                ?>
                                                    <tr>
                                                        <td><?php echo $dataUser['first_name'] . ' ' . $dataUser['last_name']; ?></td>
                                                        <td><?php echo $dataRef['first_name'] . ' ' . $dataRef['last_name']; ?></td>
                                                        <td><?php echo $row['tipo']; ?></td>
                                                        <td><?php echo $row['nombre']; ?></td>
                                                        <td><?php echo $row['empresa']; ?></td>
                                                        <td><?php echo $row['telefono']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['caliente']; ?></td>
                                                        <td><?php echo $row['fecha']; ?></td>
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