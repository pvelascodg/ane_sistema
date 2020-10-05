<?php include 'layouts/header.php'; ?>

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
                <?php $title = "Dar una Referencia";
                include 'layouts/topbar.php'; ?>
                <!-- Top Bar End -->


                <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                <div class="page-content-wrapper">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-20">
                                    <div class="card-body">

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                                <div class="card-body">

                                                    <!-- <h4 class="mt-0 header-title">Textual inputs</h4>-->
                                                    <form id="save">
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Referencia para: </label>
                                                            <div class="col-sm-5">
                                                                <select class="form-control" name="referencia" id="miembros" required>

                                                                </select>
                                                                <span class="error-message" id="error-miembros">Selecciona una opcion</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Tipo de referencia:</label>
                                                            <div class="col-sm-5">
                                                                <select class="form-control tipo" name="tipo" id="tipo" required>
                                                                    <option selected disabled>Selecciona una opción</option>
                                                                    <option value="Interno">Interna</option>
                                                                    <option value="Externo">Externa</option>
                                                                </select>
                                                                <span class="error-message" id="error-tipo">Selecciona una opcion</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Que tan caliente esta la referencia:</label>
                                                            <div class="col-sm-5">
                                                                <div class="p-4 " style="font-size: 20px;">
                                                                    1&nbsp;<input type="hidden" class="rating" name="caliente" id="caliente" data-filled="symbol symbol-filled" data-empty="symbol symbol-empty" data-fractions="1" />&nbsp;5
                                                                </div>
                                                                <span class="error-message" id="error-caliente">Selecciona un rating</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label">Nombre de la referencia:</label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="text" value="" name="nombre" id="nombre" placeholder="Ingrese el nombre" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label">Empresa:</label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="text" value="" name="empresa" id="empresa" placeholder="Ingrese el nombre" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label">Teléfono:</label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="text" value="" name="telefono" id="telefono" placeholder="5512345678" required data-parsley-minlength="10" maxlength="10">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label">Correo Electrónico:</label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="email" value="" name="email" id="email" placeholder="email@email.com" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label">De qué se trata esta referencia:</label>
                                                            <div class="col-sm-5">
                                                                <textarea class="form-control" type="text" value="" name="descripcion" required></textarea>
                                                            </div>
                                                        </div>

                                                        <input class="form-control" type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                                                        <input class="form-control" type="hidden" name="accion" value="guardaReferencia">


                                                        <div class="form-group m-b-0 offset-sm-2">
                                                            <div>
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 " id="btn1">
                                                                    Registrar y Nuevo

                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 " id="btn2">
                                                                        Registrar
                                                                    </button>
                                                                    <a type="button" href="dashboard.php" class="btn btn-primary waves-effect waves-light m-r-5">
                                                                        Cerrar
                                                                    </a>

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


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
        var continuar = {
            miembros: false,
            tipo: false,
            caliente: false
        }

        $(document).ready(function(e) {
            obtenerMiembros(<?php echo $usuario['id']; ?>);
        });

        $('#btn1').on('click', function(e) {
            e.preventDefault();

            validar();

            if (continuar.miembros == true && continuar.tipo == true && continuar.caliente == true) {
                console.log('Validado');
                save();
                continuar.miembros = false;
                continuar.tipo = false;
                continuar.caliente = false;

                $('#save')[0].reset();
            }
        });

        $('#btn2').on('click', function(e) {
            e.preventDefault();

            validar();

            if (continuar.miembros == true && continuar.tipo == true && continuar.caliente == true) {
                console.log('Validado');
                save();
                continuar.miembros = false;
                continuar.tipo = false;
                continuar.caliente = false;

                setInterval(() => {
                    document.location.href = 'dashboard.php';
                }, 3000);
            }

        });

        // $('#miembros').change(function() {
        //     if ($(this).val() == '0') {
        //         $('.invitado-group').css('display', 'block');
        //         continuar.nameInvitado = false;
        //     } else {
        //         $('.invitado-group').css('display', 'none');
        //         continuar.nameInvitado = true;
        //     }
        // });

        function save() {
            $.ajax({
                dataType: "json",
                data: $('#save').serialize(),
                type: "POST",
                url: "scripts/acciones.php",
                success: function(data) {
                    if (data.continuar == true) {
                        Swal.fire({
                            type: 'success',
                            title: 'Referencia guardada',
                        })

                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Error al guardar'
                        })
                    }
                },
                error: function(request, status, error) {
                    console.log(request.responseText);
                }
            });
        }

        function obtenerMiembros(id) {
            $.ajax({
                url: "scripts/acciones.php",
                data: {
                    accion: 'getMiembros',
                    id: id,
                    invitadoShow: false
                },
                type: 'POST',
                cache: false,
                success: function(option) {
                    var v = option;
                    if (v === false) {} else {
                        $("#miembros").html(option);
                    }
                }
            });
        }

        function validar() {
            if ($('#miembros').val().trim() == '' || $('#miembros').val().trim() == null) {
                $('#error-miembros').addClass('active');
                continuar.miembros = false;
            } else {
                $('#error-miembros').removeClass('active');
                continuar.miembros = true;
            }
            
            if ($('#tipo').val() == '' || $('#tipo').val() == null) {
                $('#error-tipo').addClass('active');
                continuar.tipo = false;
            } else {
                $('#error-tipo').removeClass('active');
                continuar.tipo = true;
            }
            
            if ($('#caliente').val() == '' || $('#tipo').val() == null) {
                $('#error-caliente').addClass('active');
                continuar.caliente = false;
            } else {
                $('#error-caliente').removeClass('active');
                continuar.caliente = true;
            }
        }
    </script>

</body>

</html>