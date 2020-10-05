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

    .btn-eliminar {
        border: none;
        background: none;
    }

    /* .dt-buttons{
        display: none;
    } */

    .dataTables_filter {
        float: left;
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
                <?php $title = "Administrar Giros";
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
                                                    <h4 class="mt-0 header-title">Agregar un nuevo giro empresarial</h4>
                                                    <div class="form-group">
                                                        <input id="giro-single" name="giro" type="text" class="form-control" placeholder="Nombre del giro">
                                                    </div>
                                                    <span class="error-message mb-3" id="error-giro">Ingresa un nombre</span>
                                                    <input type="hidden" name="accion" value="guardarGiro">

                                                    <button type="submit" id="btn1" class="btn btn-success waves-effect waves-light">Agregar</button>
                                                </form>
                                            </div>

                                            <div class="col-sm-6">
                                                <form id="form-edit">
                                                    <h4 class="mt-0 header-title">Editar giro</h4>


                                                    <div class="form-group ">
                                                        <select class="form-control" id="giro" name="giro" required>

                                                        </select>
                                                        <span class="error-message" id="error-giro2">Selecciona una opcion</span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="new-giro">Ingresa el nuevo nombre</label>
                                                        <input id="new-giro" name="new-giro" type="text" class="form-control">
                                                        <span class="error-message mb-3" id="error-giro-s">Ingresa un nombre</span>
                                                    </div>

                                                    <input type="hidden" name="accion" value="actualizarGiro">

                                                    <button type="submit" id="btn2" class="btn btn-success waves-effect waves-light">Actualizar</button>
                                                </form>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-20">
                                    <div class="card-body">

                                        <h4 class="mt-0 header-title">Giros</h4>


                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Nombre del giro</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $stm = $bd->query("SELECT * FROM giro WHERE id != 13");
                                                $giros = $stm->fetchAll();

                                                foreach ($giros as $giro) :
                                                ?>
                                                    <tr>
                                                        <td><?php echo $giro['nombre'] ?></td>
                                                        <td>
                                                            <button class="mr-3 text-muted btn-eliminar" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar" onclick="eliminar(<?php echo $giro['id']; ?>, '<?php echo $giro['nombre'] ?>')"><i class="mdi mdi-delete font-size-18"></i> Eliminar</button>
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
        var continuar = {}

        $(document).ready(function() {
            obtenerGiros();
            $('#datatable-buttons_wrapper .row div').first().css('display', 'none');
        });

        $('#btn1').on('click', function(e) {
            e.preventDefault();

            console.log($('#form-giro').serialize());

            if ($('#giro-single').val() == '') {
                $('#error-giro').addClass('active');
            } else {
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
                                location.reload();
                            }, 3000);
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error al guardar el giro'
                            });
                        }
                    }
                })
            }

        });

        $('#btn2').on('click', function(e) {
            e.preventDefault();

            if ($('#giro').val() == null || $('#giro').val() == '') {
                $('#error-giro2').addClass('active');
            }

            if ($('#new-giro').val() == '') {
                $('#error-giro-s').addClass('active');
            }

            if ($('#giro').val() !== null || $('#giro').val() !== '' && $('#new-giro').val() !== '') {
                $('#error-giro2').removeClass('active');
                $('#error-giro-s').removeClass('active');
                // console.log($('#form-edit').serialize());
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    data: $('#form-edit').serialize(),
                    url: "scripts/acciones.php",
                    success: (data) => {
                        // console.log(data);
                        if (data.continuar == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Giro Actualizado',
                                showConfirmButton: false
                            });
                            setInterval(() => {
                                location.reload();
                            }, 3000);
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error al actualizar giro'
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
                    console.log(data);
                    $('#giro').html(data.data);
                },
                error: function(request, status, error) {
                    console.log(request.responseText);
                }
            })
        }

        function eliminar(id, giro) {
            Swal.fire({
                title: 'Advertencia',
                text: "¿Seguro que quieres eliminar " + giro + " ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar'
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        dataType: "json",
                        data: {
                            accion: 'eliminarGiro',
                            giro: id
                        },
                        type: "POST",
                        url: "scripts/acciones.php",
                        success: function(data) {
                            if (data.continuar == true) {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Eliminado',
                                    text: 'Redirigiendo...',
                                    showConfirmButton: false
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
            setInterval(function() {
                location.reload();
            }, 3000)
        }
    </script>

</body>

</html>