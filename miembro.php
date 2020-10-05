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
                <?php $title = "Registro de Nuevo Miembro";
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
                                                            <label class="col-sm-2 col-form-label"><span class="red">*</span> Giro</label>
                                                            <div class="col-sm-5">
                                                                <select class="form-control profesiones" name="profesiones" id="giro" required>
                                                                    <option>Selecciona </option>
                                                                </select>
                                                                <span class="error-message" id="error-giro">Selecciona una opcion</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label"><span class="red">*</span> Especialidad</label>
                                                            <div class="col-sm-5">
                                                                <select class="form-control especialidades" name="especialidad" id="especialidad" required>
                                                                    <option selected disabled>Selecciona una opción</option>
                                                                </select>
                                                                <span class="error-message" id="error-espec">Selecciona una opcion</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Nombre de la empresa </label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="text" value="" name="empresa" id="empresa" placeholder="Ingrese el nombre" required>
                                                                <span class="error-message" id="error-empresa">Ingresa una empresa</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Nombre</label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="text" value="" name="nombre" id="nombre" placeholder="Ingrese el nombre" required>
                                                                <span class="error-message" id="error-nombre">Ingresa un nombre</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Apellido</label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="text" value="" name="apellido" id="apellido" placeholder="Ingrese el nombre" required>
                                                                <span class="error-message" id="error-apellido">Ingresa un apellido</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Teléfono </label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="text" value="" name="telefono" id="telefono" placeholder="5512345678" required>
                                                                <span class="error-message" id="error-telefono">Ingresa un teléfono</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Servicios </label>
                                                            <div class="col-sm-5">
                                                                <textarea class="form-control" type="text" name="servicios" id="servicios" placeholder="Ingrese el nombre" required></textarea>
                                                                <span class="error-message" id="error-servicios">Ingresa los servicios</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Correo Electrónico </label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="text" value="" name="email" id="email" placeholder="email@email.com" required>
                                                                <span class="error-message" id="error-email"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Contraseña </label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="password" value="" name="pass" id="pass" placeholder="Ingrese el contraseña" required>
                                                                <span class="error-message" id="error-pass">Ingresa una contraseña</span>
                                                            </div>

                                                        </div>

                                                        <input class="form-control" type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                                                        <input class="form-control" type="hidden" name="accion" value="guardarMiembro">

                                                        <div class="form-group m-b-0 offset-sm-2">
                                                            <div>
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 " id="btn1">
                                                                    Registrar y Nuevo

                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 " id="btn2">
                                                                        Registrar
                                                                    </button>
                                                                    <a type="button" href="dashboard.php" class="btn btn-primary waves-effect waves-light m-r-5" onClick="">
                                                                        Cerrar
                                                                    </a>

                                                            </div>
                                                        </div>

                                                </div>

                                            </div>
                                            <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                                                <div class="card-body">

                                                    <!-- <h4 class="mt-0 header-title">Textual inputs</h4>-->





                                                    <div class="form-group m-b-0" style="float: right;">
                                                        <div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light m-r-5">
                                                                Guardar Invitado
                                                            </button>
                                                            <button type="reset" class="btn btn-secondary waves-effect">
                                                                Cancelar
                                                            </button>
                                                        </div>
                                                    </div>

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
            giro: false,
            especialidad: false,
            empresa: false,
            nombre: false,
            apellido: false,
            telefono: false,
            servicios: false,
            email: false,
            pass: false
        }

        $(document).ready(function() {
            obtenerGiros();
        });

        $('#btn1').on('click', function(e) {
            e.preventDefault();

            validar();

            if (continuar.giro == true && continuar.especialidad == true && continuar.empresa == true && continuar.nombre == true && continuar.apellido == true && continuar.telefono == true && continuar.servicios == true && continuar.email == true && continuar.pass == true) {
                console.log('Validado');
            save();

            $('#save')[0].reset();
            }
        });

        $('#btn2').on('click', function(e) {
            e.preventDefault();

            validar();

            if (continuar.giro == true && continuar.especialidad == true && continuar.empresa == true && continuar.nombre == true && continuar.apellido == true && continuar.telefono == true && continuar.servicios == true && continuar.email == true && continuar.pass == true) {
                console.log('Validado');
            save();

            setInterval(() => {
                document.location.href = 'dashboard.php';
            }, 3000);
            }

        });

        function save() {
            // console.log($('#save').serialize());
            $.ajax({
                dataType: "json",
                type: "POST",
                data: $('#save').serialize(),
                url: "scripts/acciones.php",
                success: (data) => {
                    // console.log(data);
                    if (data.continuar == true) {
                        Swal.fire({
                            type: 'success',
                            title: 'Miembro guargado'
                        })
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: data.message
                        })
                    }
                }
            })
        }

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

        function validar() {
            const exprCorreo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;

            if ($('#giro').val() == '' || $('#giro').val() == null) {
                $('#error-giro').addClass('active');
                continuar.giro = false;
            } else {
                $('#error-giro').removeClass('active');
                continuar.giro = true;
            }

            if ($('#especialidad').val() == '' || $('#especialidad').val() == null) {
                $('#error-espec').addClass('active');
                continuar.especialidad = false;
            } else {
                $('#error-espec').removeClass('active');
                continuar.especialidad = true;
            }

            if ($('#empresa').val() == '' || $('#empresa').val() == null) {
                $('#error-empresa').addClass('active');
                continuar.empresa = false;
            } else {
                $('#error-empresa').removeClass('active');
                continuar.empresa = true;
            }

            if ($('#nombre').val() == '' || $('#nombre').val() == null) {
                $('#error-nombre').addClass('active');
                continuar.nombre = false;
            } else {
                $('#error-nombre').removeClass('active');
                continuar.nombre = true;
            }

            if ($('#apellido').val() == '' || $('#apellido').val() == null) {
                $('#error-apellido').addClass('active');
                continuar.apellido = false;
            } else {
                $('#error-apellido').removeClass('active');
                continuar.apellido = true;
            }

            if ($('#telefono').val() == '' || $('#telefono').val() == null) {
                $('#error-telefono').addClass('active');
                continuar.telefono = false;
            } else {
                $('#error-telefono').removeClass('active');
                continuar.telefono = true;
            }

            if ($('#servicios').val() == '' || $('#servicios').val() == null) {
                $('#error-servicios').addClass('active');
                continuar.servicios = false;
            } else {
                $('#error-servicios').removeClass('active');
                continuar.servicios = true;
            }

            if ($('#email').val() == "") {
                $('#error-email').addClass('active');
                $('#error-email').text('Ingresa un correo');

                continuar.email = false;
            } else if (exprCorreo.test($('#email').val())) {
                $('#error-email').removeClass('active');

                continuar.email = true;
            } else {
                $('#error-email').addClass('active');
                $('#error-email').text('Ingresa un correo valido');

                continuar.email = false;
            }

            if ($('#pass').val() == '' || $('#pass').val() == null) {
                $('#error-pass').addClass('active');
                continuar.pass = false;
            } else {
                $('#error-pass').removeClass('active');
                continuar.pass = true;
            }
        }
    </script>

</body>

</html>