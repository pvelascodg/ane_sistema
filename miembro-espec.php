<?php include 'layouts/header.php'; ?>

<!-- Select 2 -->
<link href="public/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<?php include 'layouts/headerStyle.php'; ?>

<style>
    .error-message {
        margin-top: 5px;
        display: none;
        font-size: 14px;
        color: red;
    }

    .error-message.active {
        display: block;
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
                <?php $title = "Perfil de Usuario";
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


                                        <div class="row">

                                            <div class="col-sm-6">
                                                <form id="form-giro">
                                                    <h4 class="mt-0 header-title">Agregar giros </h4>
                                                    <div class="form-group">
                                                        <label for="giro-single">Ingresa el giro nuevo</label>
                                                        <input id="giro-single" name="giro" type="text" class="form-control">
                                                    </div>
                                                    <input type="hidden" name="accion" value="guardarGiro">

                                                    <button type="submit" id="btn1" class="btn btn-success waves-effect waves-light">Ingresar giro</button>
                                                </form>
                                            </div>

                                            <div class="col-sm-6">
                                                <form id="form-espec">
                                                    <h4 class="mt-0 header-title">Agregar especialidad</h4>


                                                    <div class="form-group ">
                                                        <label>Giro</label>
                                                        <select class="form-control" id="giro" name="giro" required>

                                                        </select>
                                                        <span class="error-message" id="error-giro">Selecciona una opcion</span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label id="especialidad">Ingresa la especialidad nueva</label>
                                                        <input id="especialidad" name="especialidad" type="text" class="form-control">
                                                    </div>

                                                    <!-- Input de Informacion -->
                                                    <input type="hidden" name="accion" value="guardarEspec">

                                                    <button type="submit" id="btn2" class="btn btn-success waves-effect waves-light">Ingresar Especialidad</button>
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
        $(document).ready(function() {
            obtenerGiros();
        });

        $('#btn1').on('click', function(e) {
            e.preventDefault();

            console.log($('#form-giro').serialize());

            $.ajax({
                dataType: "json",
                type: "POST",
                data: $('#form-giro').serialize(),
                url: "scripts/acciones.php",
                success: (data) => {
                    // console.log(data);
                    if (data.continuar == true) {
                        Swal.fire({
                            type: 'success',
                            title: 'Giro guardado',
                            showConfirmButton: false
                        });
                        setInterval(() => {
                            document.location.href = 'dashboard.php';
                        }, 3000);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Error al guardar el giro'
                        });
                    }
                }
            })
        });

        $('#btn2').on('click', function(e) {
            e.preventDefault();

            if ($('#giro').val() == null) {
                $('#error-giro').addClass('active');
            }else{
                $('#error-giro').removeClass('active');
                $.ajax({
                dataType: "json",
                type: "POST",
                data: $('#form-espec').serialize(),
                url: "scripts/acciones.php",
                success: (data) => {
                    console.log(data);
                    if (data.continuar == true) {
                        Swal.fire({
                            type: 'success',
                            title: 'Especialidad guardada',
                            showConfirmButton: false
                        });
                        setInterval(() => {
                            document.location.href = 'dashboard.php';
                        }, 3000);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Error al guardar especialidad'
                        });
                    }
                }
            })
            }
        });

        function obtenerGiros() {
            $.ajax({
                dataType: "json",
                type: "POST",
                data: {
                    accion: 'getGiroById'
                },
                url: "scripts/acciones.php",
                success: (data) => {
                    // console.log(data);
                    $('#giro').html(data.data);
                },
                error: function(request, status, error) {
                    console.log(request.responseText);
                }
            })
        }
    </script>

</body>

</html>