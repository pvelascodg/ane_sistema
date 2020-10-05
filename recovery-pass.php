<?php include 'layouts/header2.php'; ?>

<?php include 'layouts/headerStyle.php'; ?>

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


                        <form class="form-horizontal m-t-30" method="POST">
                        
                            <h2 style="text-align:center;">Recuperar Contraseña</h2>

                            <div class="form-group m-t-20">
                                <label for="username">Usuario</label>
                                <input type="text" class="form-control" id="username" name="usuario" placeholder="Ingrese su email">
                            </div>

                            <div class="form-group row m-t-20">
                               
                                <div class="col-sm-12 text-center">
                                    <button class="btn btn-primary w-md waves-effect waves-light" id="form-btn" type="submit">Enviar nueva contraseña</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20 text-center">
                                  <a href="index.php" class="" style="color:#001a5a; font-weight: 600;font-size: 19px;"><i class="mdi mdi-star"></i>Iniciar Sesión</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
               <!-- <p class="">Don't have an account ? <a href="pages-register-2.php" class="font-500 font-14 font-secondary"> Signup Now </a> </p>-->
                <p class="">© <?php echo date("Y",strtotime("-1 year")); ?> - <?php echo date("Y"); ?>  AMDE. Desarrollado por <a href="https://dannyyesoft.mx/"><strong>DannyyeSoft</strong></a></p>
            </div>

        </div>

        <?php include 'layouts/footerScript.php'; ?>

        <!-- App js -->
        <script src="public/assets/js/app.js"></script>
        <script>
            $('#form-btn').on('click', function(e){
                e.preventDefault();
                $.ajax({
                    dataType: "json",
                    data: { accion: "recoveryPass", email: $('#username').val() },
                    type: "POST",
                    url: "scripts/acciones.php",
                    success: function(data){
                        if (data.continuar == true) {
                            if (data.enviado==true) {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Tu nueva contraseña ha sido enviada'
                                })
                            }else{
                                Swal.fire({
                                    type: 'error',
                                    title: 'Correo No Enviado'
                                })
                            }
                        }else{
                            Swal.fire({
                                type: 'error',
                                title: data.message
                            })
                        }
                    },
                    error: function (request, status, error) {
                        console.log(request.responseText);
                    }
                })
            });
        </script>

    </body>
</html>