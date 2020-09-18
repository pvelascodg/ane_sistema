<?php include 'layouts/header.php'; ?>

        <!-- DataTables -->
        <link href="public/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="public/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
     
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
                    <div class="topbar">

                        <nav class="navbar-custom">
                            <!-- Search input -->
                            <div class="search-wrap" id="search-wrap">
                                <div class="search-bar">
                                    <input class="search-input" type="search" placeholder="Search" />
                                    <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                        <i class="mdi mdi-close-circle"></i>
                                    </a>
                                </div>
                            </div>

                            <ul class="list-inline float-right mb-0">
                                <!-- Search -->
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                                        <i class="mdi mdi-magnify noti-icon"></i>
                                    </a>
                                </li>
                                <!-- Fullscreen -->
                                <li class="list-inline-item dropdown notification-list hidden-xs-down">
                                    <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                        <i class="mdi mdi-fullscreen noti-icon"></i>
                                    </a>
                                </li>
                                <!-- language-->
                                <li class="list-inline-item dropdown notification-list hidden-xs-down">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect text-muted" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        English <img src="public/assets/images/flags/us_flag.jpg" class="ml-2" height="16" alt=""/>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right language-switch">
                                        <a class="dropdown-item" href="#"><img src="public/assets/images/flags/germany_flag.jpg" alt="" height="16"/><span> German </span></a>
                                        <a class="dropdown-item" href="#"><img src="public/assets/images/flags/italy_flag.jpg" alt="" height="16"/><span> Italian </span></a>
                                        <a class="dropdown-item" href="#"><img src="public/assets/images/flags/french_flag.jpg" alt="" height="16"/><span> French </span></a>
                                        <a class="dropdown-item" href="#"><img src="public/assets/images/flags/spain_flag.jpg" alt="" height="16"/><span> Spanish </span></a>
                                        <a class="dropdown-item" href="#"><img src="public/assets/images/flags/russia_flag.jpg" alt="" height="16"/><span> Russian </span></a>
                                    </div>
                                </li>
                                <!-- notification-->
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <i class="ion-ios7-bell noti-icon"></i>
                                        <span class="badge badge-danger noti-icon-badge">3</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5>Notification (3)</h5>
                                        </div>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                            <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                            <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                                            <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                                        </a>

                                        <!-- All-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            View All
                                        </a>
                                    </div>
                                </li>
                                <!-- User-->
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <img src="public/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> My Wallet</a>
                                        <a class="dropdown-item" href="#"><span class="badge badge-success pull-right m-t-5">5</span><i class="dripicons-gear text-muted"></i> Settings</a>
                                        <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> Lock screen</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="dripicons-exit text-muted"></i> Logout</a>
                                    </div>
                                </li>
                            </ul>

                            <!-- Page title -->
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">Customers</h3>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                        </nav>
                    </div>

                    <div class="page-content-wrapper">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>Address</th>
                                                        <th>Wallet Balance</th>
                                                        <th>Joining Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Herbert C. Patton</td>
                                                        <td>herbart@admiria.com</td>
                                                        <td>801-388-6508</td>
                                                        <td>2470 Grove Street
                                                            Bethpage, NY 11714</td>
                                                        <td>$5,412</td>
                                                        <td>July 20, 2017</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Fabian M. Berryhill</td>
                                                        <td>FabianMBerryhill@teleworm.us</td>
                                                        <td>518-281-2680</td>
                                                        <td>
                                                            North Greenbush, NY 12144</td>
                                                        <td>$2,510</td>
                                                        <td>June 20, 2017</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Edward E. White</td>
                                                        <td>EdwardEWhite@armyspy.com</td>
                                                        <td>850-561-1648</td>
                                                        <td>1246 Drainer Avenue
                                                            Tallahassee, FL 32301</td>
                                                        <td>$1,854</td>
                                                        <td>June 22, 2017</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Rodney V. Deshong</td>
                                                        <td>RodneyVDeshong@teleworm.us</td>
                                                        <td>678-737-9078</td>
                                                        <td>4318 Kuhl Avenue
                                                            Woodstock, GA 30188</td>
                                                        <td>$8,512</td>
                                                        <td>April 12, 2017</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Ronald R. Maher</td>
                                                        <td>RonaldRMaher@armyspy.com</td>
                                                        <td>949-718-5315</td>
                                                        <td>3894 Elk Street
                                                            Newport Beach, CA 92660</td>
                                                        <td>$7,541</td>
                                                        <td>June 11, 2017</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Chris T. Parks</td>
                                                        <td>ChrisTParks@rhyta.com</td>
                                                        <td>407-855-7376</td>
                                                        <td>1521 McDonald Avenue
                                                            Orlando, FL 32809</td>
                                                        <td>$6,541</td>
                                                        <td>March 20, 2017</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Mario M. Sloan</td>
                                                        <td>MarioMSloan@rhyta.com</td>
                                                        <td>224-585-9508</td>
                                                        <td>4733 Victoria Street
                                                            Chicago, IL 60606</td>
                                                        <td>$9,650</td>
                                                        <td>June 15, 2017</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Tosha T. Rivera</td>
                                                        <td>ToshaTRivera@teleworm.us</td>
                                                        <td>573-426-7916</td>
                                                        <td>547 Maple Court
                                                            Rolla, MO 65401</td>
                                                        <td>$2,510</td>
                                                        <td>April 02, 2017</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Alice B. Bevill</td>
                                                        <td>JamesMHenry@dayrep.com</td>
                                                        <td>732-533-0201</td>
                                                        <td>2231 Webster Street
                                                            Newark, NJ 07102</td>
                                                        <td>$4,358</td>
                                                        <td>June 16, 2017</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Stanley I. Thurman</td>
                                                        <td>StanleyIThurman@teleworm.us</td>
                                                        <td>501-320-9300</td>
                                                        <td>2306 Mulberry Avenue
                                                            Little Rock, AR 72211</td>
                                                        <td>$7,410</td>
                                                        <td>November 21, 2016</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Betty M. Housley</td>
                                                        <td>BettyMHousley@armyspy.com</td>
                                                        <td>435-261-6681</td>
                                                        <td>424 North Street
                                                            Salt Lake City, UT 84104</td>
                                                        <td>$11,751</td>
                                                        <td>Jun 20, 2016</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Essie A. Nixon</td>
                                                        <td>EssieANixon@dayrep.com</td>
                                                        <td>269-639-7228</td>
                                                        <td>2259 Goff Avenue
                                                            South Haven, MI 49090</td>
                                                        <td>$4,456</td>
                                                        <td>June 22, 2016</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>John K. Sturdivant</td>
                                                        <td>JohnKSturdivant@rhyta.com</td>
                                                        <td>713-761-6484</td>
                                                        <td>4494 Michael Street
                                                            Sugar Land, TX 77478</td>
                                                        <td>$6,547</td>
                                                        <td>April 03, 2016</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Betty M. Litwin</td>
                                                        <td>BettyMLitwin@rhyta.com</td>
                                                        <td>903-457-6202</td>
                                                        <td>2317 Florence Street
                                                            Greenville, TX 75401</td>
                                                        <td>$956</td>
                                                        <td>March 05, 2016</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>John T. Gonzalez</td>
                                                        <td>JohnTGonzalez@armyspy.com</td>
                                                        <td>610-594-6480</td>
                                                        <td>1528 Jody Road
                                                            Exton, PA 19341</td>
                                                        <td>$1,121</td>
                                                        <td>June 16, 2016</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Shirley F. Chen</td>
                                                        <td>ShirleyFChen@rhyta.com</td>
                                                        <td>401-841-7122</td>
                                                        <td>2792 Bond Street
                                                            Newport, RI 02840</td>
                                                        <td>$12,841</td>
                                                        <td>December 22, 2016</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Sheri D. Thompson</td>
                                                        <td>SheriDThompson@teleworm.us</td>
                                                        <td>928-598-1216</td>
                                                        <td>252 Skips Lane
                                                            Tucson, AZ 85701</td>
                                                        <td>$2,510</td>
                                                        <td>March 17, 2016</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Rufina J. Bordeaux</td>
                                                        <td>RufinaJBordeaux@teleworm.us</td>
                                                        <td>573-736-9383</td>
                                                        <td>1243 John Daniel Drive
                                                            Crocker, MO 65452</td>
                                                        <td>$1,123</td>
                                                        <td>November 29, 2016</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Geneva J. Silverstein</td>
                                                        <td>GenevaJSilverstein@dayrep.com</td>
                                                        <td>507-406-9467</td>
                                                        <td>3421 Pritchard Court
                                                            Owatonna, MN 55060</td>
                                                        <td>$5,943</td>
                                                        <td>October 19, 2016</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Ronnie A. Slayden</td>
                                                        <td>RonnieASlayden@teleworm.us</td>
                                                        <td>845-231-7995</td>
                                                        <td>848 Camden Place
                                                            Poughkeepsie, NY 12601</td>
                                                        <td>$2,269</td>
                                                        <td>June 02, 2016</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>James M. Henry</td>
                                                        <td>JamesMHenry@dayrep.com</td>
                                                        <td>951-314-6794</td>
                                                        <td>3049 Denver Avenue
                                                            City Of Commerce, CA 90040</td>
                                                        <td>$2,490</td>
                                                        <td>January 17, 2017</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

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

        <!-- Datatable js -->
        <script src="public/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="public/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Responsive examples -->
        <script src="public/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="public/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- App js -->
        <script src="public/assets/js/app.js"></script>

        <script>
            $(document).ready(function () {
                $('#datatable').DataTable();
            });
        </script>

    </body>
</html>