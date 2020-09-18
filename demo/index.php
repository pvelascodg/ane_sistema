<?php include 'layouts/header2.php'; ?>

<?php include 'layouts/headerStyle.php'; ?>

    <body class="fixed-left">

        <?php include 'layouts/loader.php'; ?>

        <!-- Begin page -->
        <div class="accountbg" style="background: url('public/assets/images/fondo.jpg');background-size: cover;"></div>
        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.php" class="logo logo-admin"><img src="public/assets/images/logoamde.png" height="30" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="font-18 m-b-5 text-center">¡Bienvenidos!</h4>
                        <p class="text-muted text-center">Inicie Sesión</p>

                        <form class="form-horizontal m-t-30" action="login.php" method="POST">

                            <div class="form-group">
                                <label for="username">Usuario</label>
                                <input type="text" class="form-control" id="username" name="usuario" placeholder="Ingrese su email">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Contraseña</label>
                                <input type="password" class="form-control" id="userpassword" name="pass" placeholder="Ingrese contraseña">
                            </div>

                            <div class="form-group row m-t-20">
                               
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Ingresar</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <a href="pages-recoverpw-2.php" class="text-muted"><i class="mdi mdi-lock"></i> Perdi mi Password?</a>
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

    </body>
</html>