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
                <?php $title = "Escritorio";
                include 'layouts/topbar.php'; ?>
                <!-- Top Bar End -->

                <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                <div class="page-content-wrapper">

                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-4 ml-md-auto ">
                                <a href="vis.php">
                                    <div class="card m-b-20">
                                        <img class="card-img-top img-fluid" src="public/assets/images/img1.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title font-20 mt-0 text-center">Registrar un Vis a Vis</h4>

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4  mr-md-auto">
                                <a href="referencias.php">
                                    <div class="card m-b-20">
                                        <img class="card-img-top img-fluid" src="public/assets/images/img2.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title font-20 mt-0 text-center">Dar una referencia</h4>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 ml-md-auto ">
                                <a href="negocios.php">
                                    <div class="card m-b-20">
                                        <img class="card-img-top img-fluid" src="public/assets/images/img3.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title font-20 mt-0 text-center">Dar gracias por negocio cerrado</h4>

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4  mr-md-auto">
                                <a href="invitados.php">
                                    <div class="card m-b-20">
                                        <img class="card-img-top img-fluid" src="public/assets/images/img4.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title font-20 mt-0 text-center">Registrar un posible visitante</h4>

                                        </div>
                                    </div>
                                </a>
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