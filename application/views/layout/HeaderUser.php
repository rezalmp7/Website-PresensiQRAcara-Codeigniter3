<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Digital Media</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Presensi Acara QR Code">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/web/fullLogoFun.png" type="image/png" sizes="16x16">
    
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/icon_zmdi/css/material-design-iconic-font.min.css">
</head>
<body>
    <div class="container col-md-12">
        <header class="col-md-12">
            <div class="row col-md-12">
                <div class="col-md-6">
                    <a href="<?php echo base_url(); ?>" class="ml-3">
                        <img src="<?php echo base_url(); ?>assets/image/web/logo_putih.png" id="logoKecank" alt="Logo Kecank Sup">
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="dropdown">
                        <a class="float-right row"href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <p id="textUser">Wellcome<b>, <?php echo $this->session->userdata['nama']; ?></b></p>
                            <?php if($this->session->userdata['level']==1)
                            { ?>
                            <img src="<?php echo base_url(); ?>assets/image/icon/UserAdmin.png" id="iconUser" class="ml-3" alt="Profil Userp">
                            <?php }
                            elseif($this->session->userdata['level']==3)
                            { ?>
                            <img src="<?php echo base_url(); ?>assets/image/icon/UserKeuangan.png" id="iconUser" class="ml-3" alt="Profil User">
                            <?php }
                            else
                            { ?>
                            <img src="<?php echo base_url(); ?>assets/image/icon/User.png" id="iconUser" class="ml-3" alt="Profil User">
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>login/logout"><i class="zmdi zmdi-power"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Sidebar/Content -->
        <div class="row container col-md-12" >
            <!-- Sidebar -->
            <nav class="navbar-expand-lg navbar-light col-md-2 pl-0 ml-0 pr-0" id="batas">
                <button class="navbar-toggler ml-1 mt-1" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse col-md-12" id="menu">
                    <ul class="col-md-12">
                        <li class="col-md-12"><a href="<?php echo base_url(); ?>dashboard"  class="col-md-12"><i class="zmdi zmdi-home"></i> Beranda</a></li>
                        <li class="col-md-12"><a href="<?php echo base_url(); ?>presensi"  class="col-md-12"><i class="zmdi zmdi-check-all"></i> Presensi</a></li>
                        <li class="col-md-12"><a href="<?php echo base_url(); ?>scan"  class="col-md-12"><i class="zmdi zmdi-center-focus-strong"></i> Scan</a></li>
                    </ul>
                </div>
            </nav>
            <!-- /#sidebar-wrapper -->