<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kecank Sup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Presensi Acara QR Code">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="css/mainAssets.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/icon_zmdi/css/material-design-iconic-font.min.css">
</head>
<body>
    <div class="container col-md-12">
        <header class="col-md-12">
            <div class="row col-md-12">
                <div class="col-md-6">
                    <a href="index.php" class="ml-3">
                        <img src="image/web/logo_putih.png" id="logoKecank" alt="Logo Kecank Sup">
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="dropdown">
                        <a class="float-right row"href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <p id="textUser">Wellcome<b>, admin</b></p>
                            <img src="image/icon/icon_admin.png" id="iconUser" class="ml-3" alt="Logo Kecank Sup">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><i class="zmdi zmdi-power"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Sidebar/Content -->
        <div class="row container col-md-12 pt-1" >
            <!-- Sidebar -->
            <nav class="navbar-expand-lg navbar-light col-md-2 pl-0 ml-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse col-md" id="menu">
                    <ul class="col-md-12">
                        <li class="col-md-12"><a href="<?php echo base_url(); ?>dashboard"  class="col-md-12"><i class="zmdi zmdi-home"></i> Beranda</a></li><hr class="col-md-11 ml-2" />
                        <li class="col-md-12"><a href="<?php echo base_url(); ?>user"  class="col-md-12"><i class="zmdi zmdi-account"></i> User</a></li><hr class="col-md-11 ml-2" />
                        <li class="col-md-12"><a href="<?php echo base_url(); ?>peserta"  class="col-md-12"><i class="zmdi zmdi-accounts-alt"></i> Peserta</a></li><hr class="col-md-11 ml-2" />
                        <li class="col-md-12"><a href="<?php echo base_url(); ?>pembayaran"  class="col-md-12"><i class="zmdi zmdi-money-box"></i> Pembayaran</a></li><hr class="col-md-11 ml-2" />
                        <li class="col-md-12"><a href="<?php echo base_url(); ?>presensi"  class="col-md-12"><i class="zmdi zmdi-check-all"></i> Presensi</a></li><hr class="col-md-11 ml-2" />
                        <li class="col-md-12"><a href="<?php echo base_url(); ?>scan"  class="col-md-12"><i class="zmdi zmdi-center-focus-strong"></i> Scan</a></li><hr class="col-md-11 ml-2" />
                    </ul>
                </div>
            </nav>
            <!-- /#sidebar-wrapper -->
            <!-- Content -->
            <div class="col-md-10" id="content-dashboard">
                <div class="row col-md-12 mt-3 mb-5">
                    <div class="col-md-3 ml-5 mr-5 mb-3" id="label-dashboard">
                        <div class="col-md-12">
                            <h1>Peserta</h1>
                            <h2>124</h2>
                        </div>
                    </div>
                    <div class="col-md-3 ml-5 mr-5 mb-3" id="label-dashboard">
                        <div class="col-md-12">
                            <h1>Lunas</h1>
                            <h2>90</h2>
                        </div>
                    </div>
                    <div class="col-md-3 ml-5 mr-5 mb-3" id="label-dashboard">
                        <div class="col-md-12">
                            <h1>Berangkat</h1>
                            <h2>0</h2>
                        </div>
                    </div>
                <div>
            </div>
            <div class="row col-md-12 mt-5">
                <canvas id="myChart1" class="col-md-8 mb-5"></canvas>
                <canvas id="myChart2" class="col-md-4"></canvas>
            </div>
             <!-- Footer -->
            <footer class="page-footer font-small blue pt-4 col-md-12">

                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">© <?php echo date('Y'); ?> Copyright:
                    <a href="https://kecanksup.websapp.com/education/bootstrap/"> kecank_sup</a>
                </div>
                <!-- Copyright -->

            </footer>
            <!-- /Footer -->
        </div>
        <!-- /Sidebar/Content/Footer -->
    </div>
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendor/ChartJS/Chart.js"></script>
    <script src="js/main.js"></script>
</body>