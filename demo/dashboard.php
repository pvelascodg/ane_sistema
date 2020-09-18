<?php include 'layouts/header.php'; ?>

<!--Morris Chart CSS -->
<link rel="stylesheet" href="public/plugins/morris/morris.css">

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
						<?php $title ="Escritorio";
						include 'layouts/topbar.php'; ?>
                    <!-- Top Bar End -->

                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">
							<?php if($type==2){ ?>
                            <div class="row">
								<div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body text-center">
                                            <h1 class="text-danger"><span class="mdi mdi mdi-account-multiple"></span></h1>
                                            <h5 class="font-light">Formulario Vis a Vis</h5>
                                            <div class="text-center">
												
                                                <a href="form-elements.php" class="btn btn-sm btn-primary">Ingresar</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
								<div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body text-center">
                                            <h1 class="text-danger"><span class="mdi mdi mdi-account"></span></h1>
                                            <h5 class="font-light">Formulario Referencias</h5>
                                            <div class="text-center">
												
                                                <a href="referencias.php" class="btn btn-sm btn-primary">Ingresar</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
								<div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body text-center">
                                            <h1 class="text-danger"><span class="mdi mdi mdi-account-card-details"></span></h1>
                                            <h5 class="font-light">Formulario Invitados</h5>
                                            <div class="text-center">
												
                                                <a href="invitados.php" class="btn btn-sm btn-primary">Ingresar</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
								<div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body text-center">
                                            <h1 class="text-danger"><span class="mdi mdi  mdi mdi-coin"></span></h1>
                                            <h5 class="font-light">Formulario Negocios Concretados</h5>
                                            <div class="text-center">
												
                                                <a href="negocios.php" class="btn btn-sm btn-primary">Ingresar</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                             </div>
							<?php }else{ ?>
							<div class="row">
								<div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body text-center">
                                            <h1 class="text-danger"><span class="mdi mdi mdi-account-multiple"></span></h1>
                                            <h5 class="font-light">Listado de Formulario Vis a Vis</h5>
                                            <div class="text-center">
												
                                                <a href="form-elements.php" class="btn btn-sm btn-primary">Ingresar</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
								<div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body text-center">
                                            <h1 class="text-danger"><span class="mdi mdi mdi-account"></span></h1>
                                            <h5 class="font-light">Listado de Formulario Referencias</h5>
                                            <div class="text-center">
												
                                                <a href="referencias.php" class="btn btn-sm btn-primary">Ingresar</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
								<div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body text-center">
                                            <h1 class="text-danger"><span class="mdi mdi mdi-account-card-details"></span></h1>
                                            <h5 class="font-light">Listado Formulario de Invitados</h5>
                                            <div class="text-center">
												
                                                <a href="invitados.php" class="btn btn-sm btn-primary">Ingresar</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
								<div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body text-center">
                                            <h1 class="text-danger"><span class="mdi mdi  mdi mdi-coin"></span></h1>
                                            <h5 class="font-light">Listado de Negocios Concretados</h5>
                                            <div class="text-center">
												
                                                <a href="negocios.php" class="btn btn-sm btn-primary">Ingresar</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                             </div>
							<?php } ?>

                          

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <?php include 'layouts/footer.php'; ?>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->

        <?php include 'layouts/footerScript.php'; ?>

        <!-- Peity chart JS -->
        <script src="public/plugins/peity-chart/jquery.peity.min.js"></script>

        <!--Morris Chart-->
        <script src="public/plugins/morris/morris.min.js"></script>
        <script src="public/plugins/raphael/raphael-min.js"></script>

        <!-- Page specific js -->
        <script src="public/assets/pages/dashborad-2.js"></script>

        <!-- App js -->
        <script src="public/assets/js/app.js"></script>

    </body>
</html>