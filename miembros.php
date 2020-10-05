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
                <?php $title = "Listado de Miembros";
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
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $res = $bd->prepare("SELECT * FROM usuarios WHERE id != :id");
                                                $res->execute(array(
                                                    ':id' => $id
                                                ));
                                                $data = $res->fetchAll();

                                                foreach ($data as $row) :
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['first_name']; ?></td>

                                                        <td><?php echo $row['empresa'] ?></td>
                                                        <td><?php echo $row['phone'] ?></td>
                                                        <td><?php echo $row['email'] ?></td>
                                                        <td><?php if ($row['type'] == 0) {
                                                                echo 'SuperUsuario';
                                                            } elseif ($row['type'] == 1) {
                                                                echo 'Administrador';
                                                            } else {
                                                                echo 'Normal';
                                                            } ?></td>
                                                        <td><?php if ($row['status'] == 'Activo') {
                                                                echo '<span style=\'color:green\'>Activo</span>';
                                                            } else {
                                                                echo '<span style=\'color:red\'>Activo</span>';
                                                            } ?>
                                                        </td>
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
        function saver() {
            $.ajax({
                dataType: "json",
                data: $("#saver").serialize(),
                type: "POST",
                context: this,
                url: "scripts/acciones.php",
                success: function(data) {
                    console.log(data);
                    if (data.continuar == true) {
                        Swal.fire({
                            icon: 'success',
                            text: 'Registro guardado',
                        })
                        $('#referencia').val('');

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Problema al guardar'
                        })
                        $('#referencia').val('');
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    </script>

</body>

</html>