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
                <?php $title = "Dar gracias por negocio cerrado";
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
                                                            <label class="col-sm-2 col-form-label"><span class="red">*</span> Gracias por Negocio cerrado a:</label>
                                                            <div class="col-sm-5">
                                                                <select class="form-control miembros" name="miembros" id="miembros" required>
                                                                    <option>Selecciona un miembro</option>

                                                                </select>
                                                                <span class="error-message" id="error-miembros">Selecciona una opcion</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label"><span class="red">*</span> Negocio cerrado el:</label>
                                                            <div class="col-sm-5">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control datepicker-autoclose2" name="fecha" placeholder="aaaa-mm-dd" id="fecha" required required data-date-end-date="0d">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                                    </div>
                                                                </div><!-- input-group -->
                                                                <span class="error-message" id="error-fecha">Selecciona una fecha</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Monto en pesos:</label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control monto" type="text" name="monto" id="monto" placeholder="Ingrese el monto" required>
                                                                <span class="error-message" id="error-monto">Ingresa un monto</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-7">
                                                                <hr>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> Porcentaje de comisión:</label>
                                                            <div class="col-sm-5">
                                                                <select class="form-control porcentaje" name="porcentaje" id="porcentaje" required>
                                                                    <option value>Selecciona una cantidad</option>
                                                                    <option value="5">5%</option>
                                                                    <option value="10">10%</option>
                                                                    <option value="15">15%</option>
                                                                    <option value="20">20%</option>
                                                                    <option value="25">25%</option>
                                                                    <option value="30">30%</option>

                                                                </select>
                                                                <span class="error-message" id="error-porcentaje">Selecciona una comisión</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red"></span> Comisión por pagar:</label>
                                                            <div class="col-sm-5">
                                                                <input class="form-control comision" type="text" name="comision" placeholder="" readonly>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"><span class="red">*</span> ¿Esta pagada?:</label>
                                                            <div class="col-sm-5">
                                                                <select class="form-control" name="pagado" id="pagado" required>
                                                                    <option selected disabled>Selecciona una opción</option>
                                                                    <option value="No">No</option>
                                                                    <option value="Si">Si</option>
                                                                </select>
                                                                <span class="error-message" id="error-pagado">Selecciona una opcion</span>
                                                            </div>
                                                        </div>

                                                        <input class="form-control" type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                                                        <input class="form-control" type="hidden" name="accion" value="guardaNegocio">


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
            fecha: false,
            monto: false,
            porcentaje: false,
            pagado: false
        }

        $(document).ready(function(e) {
            obtenerMiembros(<?php echo $usuario['id']; ?>);
        });

        $('#btn1').on('click', function(e) {
            e.preventDefault();

            validar();

            if (continuar.miembros == true && continuar.fecha == true && continuar.monto == true && continuar.porcentaje == true && continuar.pagado == true) {
                console.log('Validado');
                save();
                continuar.miembros = false;
                continuar.fecha = false;
                continuar.monto = false;
                continuar.porcentaje = false;
                continuar.pagado = false;

                $('#save')[0].reset();
            }
        });

        $('#btn2').on('click', function(e) {
            e.preventDefault();

            validar();

            if (continuar.miembros == true && continuar.fecha == true && continuar.monto == true && continuar.porcentaje == true && continuar.pagado == true) {
                console.log('Validado');
                save();
                continuar.miembros = false;
                continuar.fecha = false;
                continuar.monto = false;
                continuar.porcentaje = false;
                continuar.pagado = false;

                setInterval(() => {
                    document.location.href = 'dashboard.php';
                }, 3000);
            }

        });

        $('.monto').change(function() {
            var monto = $(this).val();
            var porcentaje = $('.porcentaje').val();
            var total = monto * (porcentaje / 100);
            $('.comision').val(total)

        });
        $('.porcentaje').change(function() {
            var porcentaje = $(this).val();
            var monto = $('.monto').val();
            var total = monto * (porcentaje / 100);
            $('.comision').val(total)

        });
        $('.montoi').change(function() {
            var monto = $(this).val();
            var porcentaje = $('.porcentajei').val();
            var total = monto * (porcentaje / 100);
            $('.comisioni').val(total)

        });
        $('.porcentajei').change(function() {
            var porcentaje = $(this).val();
            var monto = $('.montoi').val();
            var total = monto * (porcentaje / 100);
            $('.comisioni').val(total)

        });

        function save() {
            $.ajax({
                dataType: "json",
                data: $('#save').serialize(),
                type: "POST",
                url: "scripts/acciones.php",
                success: function(data) {
                    console.log(data);
                    if (data.continuar == true) {
                        Swal.fire({
                            type: 'success',
                            text: 'Negocio concretado guardado',
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
                    // console.log(option);
                    var v = option;
                    if (v === false) {} else {
                        $("#miembros").html(option);
                    }
                }
            });
        }

        function validar() {
            if ($('#miembros').val() == '' || $('#miembros').val() == null) {
                $('#error-miembros').addClass('active');
                continuar.miembros = false;
            }else{
                $('#error-miembros').removeClass('active');
                continuar.miembros = true;
            }
            
            if ($('#fecha').val() == '' || $('#fecha').val() == null) {
                $('#error-fecha').addClass('active');
                continuar.fecha = false;
            }else{
                $('#error-fecha').removeClass('active');
                continuar.fecha = true;
            }
            
            if ($('#monto').val() == '' || $('#monto').val() == null) {
                $('#error-monto').addClass('active');
                continuar.monto = false;
            }else{
                $('#error-monto').removeClass('active');
                continuar.monto = true;
            }
            
            if ($('#porcentaje').val() == '' || $('#porcentaje').val() == null) {
                $('#error-porcentaje').addClass('active');
                continuar.porcentaje = false;
            }else{
                $('#error-porcentaje').removeClass('active');
                continuar.porcentaje = true;
            }
            
            if ($('#pagado').val() == '' || $('#pagado').val() == null) {
                $('#error-pagado').addClass('active');
                continuar.pagado = false;
            }else{
                $('#error-pagado').removeClass('active');
                continuar.pagado = true;
            }
        }
    </script>

</body>

</html>