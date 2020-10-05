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
                <?php $title = "Administrar Especialidades";
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
                                                <form id="form-espec">
                                                    <h4 class="mt-0 header-title">Agregar especialidad</h4>

                                                    <div class="form-group ">
                                                        <label>Giro</label>
                                                        <select class="form-control" id="giro2" name="giro" required>
                                                            <option selected disabled>Selecciona una opción</option>
                                                        </select>
                                                        <span class="error-message" id="error-giro2">Selecciona una opcion</span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="espec-single">Ingresa la especialidad nueva</label>
                                                        <input id="espec-single" name="especialidad" type="text" class="form-control">
                                                        <span class="error-message" id="error-espec">Selecciona una opcion</span>
                                                    </div>
                                                    <input type="hidden" name="accion" value="guardarEspec">

                                                    <button type="submit" id="btn1" class="btn btn-success waves-effect waves-light">Agregar</button>
                                                </form>
                                            </div>

                                            <div class="col-sm-6">
                                                <form id="form-edit">
                                                    <h4 class="mt-0 header-title">Editar especialidad</h4>

                                                    <div class="form-group ">
                                                        <label>Giro</label>
                                                        <select class="form-control" id="giro" name="giro" required>
                                                            <option selected disabled>Selecciona una opción</option>
                                                        </select>
                                                        <span class="error-message" id="error-giro">Selecciona una opcion</span>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label>Especialidad</label>
                                                        <select class="form-control" id="especialidad" name="especialidad" required>

                                                        </select>
                                                        <span class="error-message" id="error-espec2">Selecciona una opcion</span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="new-espec">Ingresa el nuevo nombre</label>
                                                        <input id="new-espec" name="new-espec" type="text" class="form-control">
                                                        <span class="error-message mb-2" id="error-espec-n">Selecciona una opcion</span>
                                                    </div>

                                                    <input type="hidden" name="accion" value="actualizarEspec">

                                                    <button type="submit" id="btn2" class="btn btn-success waves-effect waves-light">Editar</button>
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

                                        <h4 class="mt-0 header-title">Especialidades</h4>


                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Giro</th>
                                                    <th>Nombre de la especialidad</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $stm = $bd->query("SELECT * FROM especialidad WHERE id != 60");
                                                $especialidades = $stm->fetchAll();

                                                foreach ($especialidades as $especialidad) :
                                                    $idGiro = $especialidad['id_espec'];
                                                    $stm = $bd->query("SELECT nombre FROM giro WHERE id = $idGiro");
                                                    $giro = $stm->fetch();
                                                ?>
                                                    <tr>
                                                        <td><?php echo $giro['nombre'] ?></td>
                                                        <td><?php echo $especialidad['especialidad'] ?></td>
                                                        <td>
                                                            <button class="mr-3 text-muted btn-eliminar" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar" onclick="eliminar(<?php echo $especialidad['id'] ?>, '<?php echo $especialidad['especialidad'] ?>')"><i class="mdi mdi-delete font-size-18"></i> Eliminar</button>
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
        $(document).ready(function() {
            obtenerGiros();
            obtenerGiros2();
            $('#datatable-buttons_wrapper .row div').first().css('display', 'none');
        });

        $('#btn1').on('click', function(e) {
            e.preventDefault();

            if ($('#giro2').val() == '' || $('#giro2').val() == null) {
                $('#error-giro2').addClass('active');
            }

            if ($('#espec-single').val() == '') {
                $('#error-espec').addClass('active');
            }

            if ($('#giro2').val() !== null && $('#espec-single').val() !== '') {
                $('#error-giro2').removeClass('active');
                $('#error-espec').removeClass('active');

                $.ajax({
                    dataType: "json",
                    type: "POST",
                    data: $('#form-espec').serialize(),
                    url: "scripts/acciones.php",
                    success: (data) => {
                        // console.log(data);
                        if (data.continuar == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Especialidad guardada',
                                showConfirmButton: false
                            });
                            setInterval(() => {
                                location.reload();
                            }, 3000);
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error al guardar la especialidad'
                            });
                        }
                    }
                })
            }

        });

        $('#btn2').on('click', function(e) {
            e.preventDefault();

            if ($('#giro').val() == null) {
                $('#error-giro').addClass('active');
            }

            if ($('#especialidad').val() == null) {
                $('#error-espec2').addClass('active');
            }

            if ($('#new-espec').val() == '') {
                $('#error-espec-n').addClass('active');
            }

            if ($('#giro').val() !== null && $('#especialidad').val() !== null && $('#new-espec').val() !== '') {
                $('#error-giro').removeClass('active');
                $('#error-espec2').removeClass('active');
                $('#error-espec-n').removeClass('active');
                console.log('Validado');
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    data: $('#form-edit').serialize(),
                    url: "scripts/acciones.php",
                    success: (data) => {
                        console.log(data);
                        if (data.continuar == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Especlialidad Actualizada',
                                showConfirmButton: false
                            });
                            setInterval(() => {
                                location.reload();
                            }, 3000);
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error al actualizar especialidad'
                            });
                        }
                    }
                })
            }
        });

        $('#giro').change(function() {
            obtenerEspecialidades($(this).val());
        })

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

        function obtenerEspecialidades(giro) {
            $.ajax({
                dataType: "json",
                type: "POST",
                data: {
                    accion: 'getEspecialidadByGiro',
                    giro: giro
                },
                url: "scripts/acciones.php",
                success: (data) => {
                    // console.log(data);
                    $('#especialidad').html(data.data);
                },
                error: function(request, status, error) {
                    console.log(request.responseText);
                }
            })
        }

        function obtenerGiros2() {
            // console.log(giro);
            $.ajax({
                dataType: "json",
                type: "POST",
                data: {
                    accion: 'getGiroById'
                },
                url: "scripts/acciones.php",
                success: (data) => {
                    // console.log(data);
                    $('#giro2').html(data.data);
                },
                error: function(request, status, error) {
                    console.log(request.responseText);
                }
            })
        }

        function eliminar(id, espec) {
            Swal.fire({
                title: 'Advertencia',
                text: "¿Seguro que quieres eliminar " + espec + " ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar'
            }).then((result) => {
                console.log(result.value);
                if (result.value == true) {

                    $.ajax({
                        dataType: "json",
                        data: {
                            accion: 'eliminarEspec',
                            especialidad: id
                        },
                        type: "POST",
                        url: "scripts/acciones.php",
                        success: function(data) {
                            console.log(data);
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