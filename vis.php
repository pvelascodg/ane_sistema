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

    .invitado-group {
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
                <?php $title = "Registrar un Vis a Vis";
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
                                                            <label class="col-sm-2 col-form-label"><span class="red">*</span>Vis a Vis con:</label>
                                                            <div class="col-sm-5">
                                                                <select class="form-control miembros" name="miembros" id="miembros" required>

                                                                </select>
                                                                <span class="error-message" id="error-miembros">Selecciona una opcion</span>
                                                                <input class="form-control" type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                                                                <input class="form-control" type="hidden" name="accion" value="guardaVis">
                                                            </div>
                                                        </div>

                                                        <div class="invitado-group">

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Nombre del Invitado:</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">
                                                                        <input class="form-control invitado" type="text" name="name-invitado" id="name-invitado" placeholder="Ingrese el nombre">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label"><span class="red">*</span>Como fue el Vis a Vis:</label>
                                                            <div class="col-sm-5">
                                                                <select class="form-control" name="reunion" id="reunion" required>
                                                                    <option value="">Selecciona </option>
                                                                    <option value="WebMeeting">WebMeeting </option>
                                                                    <option value="Presencial">Presencial</option>

                                                                </select>
                                                                <span class="error-message" id="error-reunion">Selecciona una opcion</span>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label"><span class="red">*</span>Fecha del Vis a Vis:</label>
                                                            <div class="col-sm-5">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control datepicker-autoclose2" name="fecha" placeholder="aaaa-mm-dd" id="fecha" required data-date-end-date="0d">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                                    </div>
                                                                </div><!-- input-group -->
                                                                <span class="error-message" id="error-fecha">Selecciona una fecha</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group m-b-0 offset-sm-2">
                                                            <div>
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 btn1" id="btn1">
                                                                    Registrar y Nuevo

                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 btn2" id="btn2">
                                                                        Registrar
                                                                    </button>
                                                                    <a type="button" id="exit" href="dashboard.php" class="btn btn-primary waves-effect waves-light m-r-5">
                                                                        Cerrar
                                                                    </a>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <!-- niudvbkzi -->

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
            reunion: false,
            fecha: false,
            nameInvitado: true
        }

        $(document).ready(function(e) {
            obtenerMiembros(<?php echo $usuario['id']; ?>);
        });

        $('#btn1').on('click', function(e) {
            e.preventDefault();

            validar();

            // console.log(continuar);

            if (continuar.miembros == true && continuar.reunion == true && continuar.fecha == true) {
                console.log('Validado');
                save();

                continuar.miembros = false;
                continuar.reunion = false;
                continuar.fecha = false;

                $('.invitado-group').css('display', 'none');
                $('#save')[0].reset();
            }
        });

        $('#btn2').on('click', function(e) {
            e.preventDefault();

            validar();

            if (continuar.miembros == true && continuar.reunion == true && continuar.fecha == true) {
                console.log('Validado');
                save();

                continuar.miembros = false;
                continuar.reunion = false;
                continuar.fecha = false;

                setInterval(() => {
                    document.location.href = 'dashboard.php';
                }, 3000);
            }

        });

        $('#exit').on('click', function(e) {
            e.preventDefault();

            document.location.href = 'dashboard.php';
        });

        $('#miembros').change(function() {
            if ($(this).val() == '0') {
                $('.invitado-group').css('display', 'block');
                continuar.nameInvitado = false;
            } else {
                $('.invitado-group').css('display', 'none');
                continuar.nameInvitado = true;
            }
        });

        function save() {
            $.ajax({
                dataType: "json",
                type: "POST",
                data: $('#save').serialize(),
                url: "scripts/acciones.php",
                success: (data) => {
                    console.log(data);
                    if (data.continuar == true) {
                        Swal.fire({
                            type: 'success',
                            title: 'Vis a Vis guardado'
                        })
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Error al guardar'
                        })
                    }
                }
            })
        }

        function obtenerMiembros(id) {
            $.ajax({
                url: "scripts/acciones.php",
                data: {
                    accion: 'getMiembros',
                    id: id
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
            if ($('#miembros').val().trim() == '') {
                $('#error-miembros').addClass('active');
                continuar.miembros = false;
            } else {
                $('#error-miembros').removeClass('active');
                continuar.miembros = true;
            }

            if ($('#reunion').val().trim() == '') {
                $('#error-reunion').addClass('active');
                continuar.reunion = false;
            } else {
                $('#error-reunion').removeClass('active');
                continuar.reunion = true;
            }

            if ($('#fecha').val().trim() == '') {
                $('#error-fecha').addClass('active');
                continuar.fecha = false;
            } else {
                $('#error-fecha').removeClass('active');
                continuar.fecha = true;
            }
        }
    </script>

</body>

</html>