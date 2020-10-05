<?php include 'layouts/header2.php'; ?>

<?php include 'layouts/headerStyle.php'; ?>

<style>
    /* ----Estilos de Formulario */

    .form-group span {
        margin-top: 5px;
        display: none;
        font-size: 14px;
        color: red;
    }

    .form-group span.active {
        display: block;
    }
</style>

<body class="fixed-left">

    <?php include 'layouts/loader.php'; ?>

    <!-- Begin page -->
    <div class="accountbg" style="background: url('public/assets/images/index.jpg');background-size: cover;"></div>
    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-body">

                <h3 class="text-center m-0">
                    <a href="index.php" class="logo logo-admin"><img src="ANE_LOGO_AZUL.png" height="100" alt="logo"></a>
                </h3>

                <div class="p-3">
                    <h4 class="font-18 m-b-5 text-center">¡ANE - Alianza Nacional de Emprendedores!</h4>
                    <p class="text-muted text-center">Construyendo Relaciones Significativas</p>

                    <form class="form-horizontal m-t-30" id="login" method="POST">

                        <div class="form-group">
                            <label for="username">Usuario</label>
                            <input type="text" class="form-control" id="username" name="usuario" placeholder="Ingrese su email">
                            <span class="message-error message-username"></span>
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Contraseña</label>
                            <input type="password" class="form-control" data-parsley-type="email" id="userpassword" name="pass" placeholder="Ingrese contraseña">
                            <span class="message-error message-userpassword"></span>
                        </div>

                        <div class="form-group row m-t-20">

                            <div class="col-sm-12 text-center">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit" id="btn-submit">Ingresar</button>
                            </div>
                        </div>

                        <div class="form-group row m-t-20">

                            <div class="col-sm-12 text-center">
                                <button class="btn btn-secondary" id="recovery-pass">Recuperar Contraseña</button>
                            </div>
                        </div>

                        <div class="form-group m-t-20 row">
                            <div class="col-12 text-center">
                                <a href="registro.php" class="btn btn-info">Quiero conocer ANE</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <!-- <p class="">Don't have an account ? <a href="pages-register-2.php" class="font-500 font-14 font-secondary"> Signup Now </a> </p>-->
            <p class="">© <?php echo date("Y", strtotime("-1 year")); ?> - <?php echo date("Y"); ?> AMDE. Desarrollado por <a href="https://dannyyesoft.mx/"><strong>DannyyeSoft</strong></a></p>
        </div>

    </div>

    <?php include 'layouts/footerScript.php'; ?>

    <!-- App js -->
    <script src="public/assets/js/app.js"></script>
    <script>
        var continuar = {
            email: false,
            pass: false
        };

        $('#recovery-pass').on('click', function(e) {
            e.preventDefault();
            document.location.href = 'recovery-pass.php';
        });

        $('#btn-submit').on('click', function(e) {
            e.preventDefault();

            console.log('Enviado');

            validarCorreo();
            validarPass();

            if (continuar.email == true && continuar.pass == true) {
                $.ajax({
                    dataType: "json",
                    data: {
                        accion: "login",
                        email: $('#username').val(),
                        pass: $('#userpassword').val()
                    },
                    type: "POST",
                    url: "scripts/acciones.php",
                    success: function(data) {
                        console.log(data);
                        if (data.continuar == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Iniciando Sesión',
                                text: 'En un momento serás redirigido',
                                showConfirmButton: false
                            })
                            setInterval(() => {
                                document.location.href = 'dashboard.php';
                            }, 3000);
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: data.message
                            })
                        }
                    },
                    error: function(request, status, error) {
                        console.log(request.responseText);
                    }
                })
            }

        });

        function validarCorreo() {
            const exprCorreo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;

            if ($('#username').val() == "") {
                $('.message-username').addClass('active');
                $('.message-username').text('Por favor, ingresa un correo');

                continuar.email = false;
            } else if (exprCorreo.test($('#username').val())) {
                $('.message-username').removeClass('active');

                continuar.email = true;
            } else {
                $('.message-username').addClass('active');
                $('.message-username').text('Por favor, ingresa un correo valido');

                continuar.email = false;
            }
        }

        function validarPass() {
            if ($('#userpassword').val() == "") {
                $('.message-userpassword').addClass('active');
                $('.message-userpassword').text('Por favor, ingresa una contraseña');

                continuar.pass = false;
            } else {
                $('.message-userpassword').removeClass('active');

                continuar.pass = true;
            }
        }
    </script>

</body>

</html>