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
                <?php $title = "Listado Formulario Invitados";
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
                                                    <th>Posible Visitante</th>
                                                    <th>Invitado por</th>
                                                    <th>Giro</th>
                                                    <th>Especialidad</th>
                                                    <th>Fecha de Visita</th>
                                                    <th>Empresa</th>
                                                    <th>Años</th>
                                                    <th>Tratamiento</th>
                                                    <th>Servicios</th>
                                                    <th>Telefono</th>
                                                    <th>Email</th>
                                                    <th>No. Visitas</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $stm = $bd->query("SELECT * FROM invitados");
                                                $res = $stm->fetchAll();

                                                foreach ($res as $row) :
                                                    $idrow = $row['id_usuario'];
                                                    $stm2 = $bd->query("SELECT first_name, last_name FROM usuarios WHERE id = $idrow");
                                                    $dataUser = $stm2->fetch();

                                                    $tmpGiro = $row['profesion'];
                                                    $stm3 = $bd->query("SELECT nombre FROM giro WHERE id = $tmpGiro");
                                                    $giro = $stm3->fetch();

                                                    $tmpEspec = $row['especialidad'];
                                                    $stm4 = $bd->query("SELECT especialidad FROM especialidad WHERE id = $tmpEspec");
                                                    $especialidad = $stm4->fetch();

                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                                        <td><?php echo $dataUser['first_name'] . ' ' . $dataUser['last_name']; ?></td>
                                                        <td><?php echo $giro['nombre']; ?></td>
                                                        <td><?php echo $especialidad['especialidad']; ?></td>
                                                        <td><?php echo $row['fechav']; ?></td>
                                                        <td><?php echo $row['empresa'] ?></td>
                                                        <td><?php echo $row['anios'] ?></td>
                                                        <td><?php echo $row['tratamiento'] ?></td>
                                                        <td><?php echo $row['servicios'] ?></td>
                                                        <td><?php echo $row['telefono'] ?></td>
                                                        <td><?php echo $row['email'] ?></td>
                                                        <td><?php echo $row['no_visitas'] ?></td>
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