<?php


include 'layouts/header.php';
$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id =$id";
$result = $bd->query($sql);
$row = $result->fetch();
// $usuario = $row['Usuario'];
$telefono = $row['phone'];
$email = $row['email'];
$empresa = $row['empresa'];
$nombre = $row['first_name'];
$apellido = $row['last_name'];
$giro = $row['giro'];
$especialidad = $row['especialidad'];
$imagen = $row['imagen'];
$servicios = $row['servicios'];
$estado = $row['status'];
$rol = $row['type'];
?>
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
                <?php $title = "Actualizar Miembro";
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

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label"><span class="red">*</span> Especialidad</label>
                                                            <div class="col-sm-5">
                                                                <select class="form-control especialidades" name="especialidad" id="especialidad">
                                                                    <option selected disabled>Selecciona una opción</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Nombre de la empresa </label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="text" value="<?php echo $empresa; ?>" name="empresa" id="empresa" placeholder="Ingrese el nombre" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Servicios </label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="text" value="<?php echo $servicios; ?>" name="servicios" id="servicios" placeholder="Ingrese el nombre" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Nombre</label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="text" value="<?php echo $nombre; ?>" name="nombre" id="nombre" placeholder="Ingrese el nombre" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Apellido</label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="text" value="<?php echo $apellido; ?>" name="apellido" id="apellido" placeholder="Ingrese el apellido" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Teléfono </label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="text" value="<?php echo $telefono; ?>" name="telefono" id="telefono" placeholder="5512345678" required data-parsley-minlength="10" maxlength="10">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Correo Electrónico </label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control" type="email" value="<?php echo $email; ?>" name="email" id="email" placeholder="email@email.com" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label"><span class="red">*</span> Estado</label>
                                                            <div class="col-sm-5">
                                                                <select class="form-control estado" name="estado" id="" required>
                                                                    <option value="Inactivo" <?php if ($estado == 'Inactivo') {
                                                                                                    echo 'selected';
                                                                                                } ?>>Inactivo </option>
                                                                    <option value="Activo" <?php if ($estado == 'Activo') {
                                                                                                echo 'selected';
                                                                                            } ?>>Activo </option>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label"><span class="red">*</span> Rol</label>
                                                            <div class="col-sm-5">
                                                                <select class="form-control estado" name="tipo" id="" required>
                                                                    <option value="0" <?php if ($rol == 0) {
                                                                                            echo 'selected';
                                                                                        } ?>>SuperUsuario </option>
                                                                    <option value="1" <?php if ($rol == 1) {
                                                                                            echo 'selected';
                                                                                        } ?>>Administrador </option>
                                                                    <option value="2" <?php if ($rol == 2) {
                                                                                            echo 'selected';
                                                                                        } ?>>Normal </option>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>">
                                                        <input class="form-control" type="hidden" name="accion" value="guardarUsuario">

                                                        <div class="form-group m-b-0 offset-sm-2">
                                                            <div>

                                                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 " id="btn">
                                                                    Actualizar
                                                                </button>
                                                                <a type="button" href="dashboard.php" class="btn btn-primary waves-effect waves-light m-r-5" onClick="">
                                                                    Cerrar
                                                                </a>

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
        $(document).ready(function() {
            obtenerGiros(<?php echo $giro; ?>);
            obtenerEspecialidades(<?php echo $especialidad; ?>);
        });

        $('#btn').on('click', function(e) {
            e.preventDefault();

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
                            text: 'Información Actualizada'
                        })
                        setInterval(() => {
                            document.location.href = 'dashboard.php';
                        }, 3000);
                    } else {
                        Swal.fire({
                            type: 'error',
                            text: 'Error al actualizar'
                        })
                    }
                }
            })
        });

        $('#giro').change(function() {
            obtenerEspecialidadesByGiro($(this).val());
        })

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
                    $('#giro').html(data.data);
                },
                error: function(request, status, error) {
                    console.log(request.responseText);
                }
            })
        }

        function obtenerEspecialidades(espec, giro) {
            if (espec == undefined || espec == null || espec == '') {
                var combo = 'getEspecialidadByGiro';
                console.log(combo);
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    data: {
                        accion: combo,
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
            } else {
                var combo = 'getEspecialidadById';
                console.log(combo);
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    data: {
                        accion: combo,
                        especialidad: especialidad
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
        }

        function obtenerEspecialidadesByGiro(giro) {
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
    </script>
</body>

</html>