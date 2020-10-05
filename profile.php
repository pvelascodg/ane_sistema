<?php include 'layouts/header.php'; ?>

<!-- Select 2 -->
<link href="public/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

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
                                                <form id="form-info">
                                                    <h4 class="mt-0 header-title">Informacion General </h4>
                                                    <div class="form-group">
                                                        <label for="first_name">Nombre</label>
                                                        <input id="first_name" name="nombre" type="text" class="form-control" value="<?php echo $usuario['first_name']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="last_tname">Apellidos</label>
                                                        <input id="last_name" name="apellido" type="text" class="form-control" value="<?php echo $usuario['last_name']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="manufacturername">Empresa</label>
                                                        <input id="manufacturername" name="empresa" type="text" class="form-control" value="<?php echo $usuario['empresa']; ?>">

                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="col-form-label"><span class="red">*</span> Giro</label>

                                                        <select class="form-control giros" name="giro" id="giro" required>

                                                        </select>

                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="col-form-label"><span class="red">*</span> Especialidad</label>

                                                        <select class="form-control especialidades" name="especialidad" id="especialidad" required>

                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="manufacturername">Servicios</label>
                                                        <input id="manufacturername" name="servicios" type="text" class="form-control" value="<?php echo $usuario['servicios']; ?>">

                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="example-text-input" class="col-form-label"><span class="red">*</span> Teléfono </label>

                                                        <input class="form-control" type="text" value="<?php echo $usuario['phone']; ?>" name="telefono" id="telefono" placeholder="5512345678" required>

                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="example-text-input" class="col-form-label"><span class="red">*</span> Correo Electrónico </label>

                                                        <input class="form-control" type="email" value="<?php echo $usuario['email']; ?>" name="email" id="email" placeholder="email@email.com" required>
                                                    </div>

                                                    <!-- Input de Informacion -->
                                                    <input class="form-control" type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                                                    <input type="hidden" name="accion" value="guardarInfo">

                                                    <button type="submit" id="btn-info" class="btn btn-success waves-effect waves-light">Actualizar</button>
                                                </form>
                                            </div>

                                            <div class="col-sm-6">
                                                <form id="form-pass">
                                                    <h4 class="mt-0 header-title">Cambiar contraseña</h4>
                                                    <div class="form-group">
                                                        <label for="productdesc">Ingresar su nueva contraseña</label>
                                                        <input id="pass" name="pass" type="password" class="form-control" placeholder="Escriba la contraseña" required>

                                                        <div class="m-t-10">
                                                            <input type="password" id="pass2" class="form-control" placeholder="Reescriba la contraseña" />
                                                        </div>

                                                        <!-- Input de Informacion -->
                                                        <input class="form-control" type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                                                        <input type="hidden" name="accion" value="guardarPass">
                                                    </div>

                                                    <button type="submit" id="btn-pass" class="btn btn-success waves-effect waves-light">Actualizar</button>
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
            obtenerGiros(<?php echo $usuario['giro']; ?>);
            obtenerEspecialidades(<?php echo $usuario['especialidad'] ?>, <?php echo $usuario['giro']; ?>);
        });

        $('#btn-info').on('click', function(e) {
            e.preventDefault();

            // console.log($('#form-info').serialize());

            $.ajax({
                dataType: "json",
                type: "POST",
                data: $('#form-info').serialize(),
                url: "scripts/acciones.php",
                success: (data) => {
                    if (data.continuar == true) {
                        Swal.fire({
                            type: 'success',
                            text: data.message
                        });

                    } else {
                        Swal.fire({
                            type: 'error',
                            text: data.message
                        });
                    }
                }
            })
        });

        $('#btn-pass').on('click', function(e){
            e.preventDefault();

            $.ajax({
                dataType: "json",
                type: "POST",
                data: $('#form-pass').serialize(),
                url: "scripts/acciones.php",
                success: (data) => {
                    console.log(data);
                    if (data.continuar == true) {
                        Swal.fire({
                            type: 'success',
                            text: data.message
                        });

                    } else {
                        Swal.fire({
                            type: 'error',
                            text: data.message
                        });
                    }
                    $('#form-pass')[0].reset();
                }
            })
        });

        function obtenerGiros(giro) {
            $.ajax({
                dataType: "json",
                type: "POST",
                data: {
                    accion: 'getGiroById',
                    giro: giro
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

        function obtenerEspecialidades(espec, giro) {
            $.ajax({
                dataType: "json",
                type: "POST",
                data: {
                    accion: 'getEspecialidadByGiro',
                    especialidad: espec,
                    giro: giro
                },
                url: "scripts/acciones.php",
                success: (data) => {
                    console.log(data);
                    $('#especialidad').html(data.data);
                },
                error: function(request, status, error) {
                    console.log(request.responseText);
                }
            })
        }
    </script>

</body>

</html>