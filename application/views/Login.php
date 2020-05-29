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

    <link href="<?php echo base_url();?>assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/icon_zmdi/css/material-design-iconic-font.min.css">
</head>
<body>
    <div class="container col-md-12 pt-5 pl-2 pr-2">
        <div class="col-md-6 mr-auto ml-auto mt-5 rounded-lg" id="login">
            <div class="col-md-12 pt-2 rounded-lg" id="login-header">
                <h1 class="col-md-12"><div class="headerFun">FUN Digital Media</div></h1>
            </div>
            <?php if(isset($_GET['ps']))
            { ?>
            <div class="alert alert-warning alert-dismissible fade show mt-3 ml-3 mr-3" role="alert">
                <?php echo $pesan; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
            <div class="col-md-12 pt-2 pb-2"> 
                <form method="post" action="<?php echo base_url(); ?>login/aksiLogin">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="number" class="form-control" name="username">
                        <small id="emailHelp" class="form-text text-muted">Username untuk login.</small>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-success col-md-12 mt-1"><i class="zmdi zmdi-sign-in"></i> Sign-In</button>
                </form>            
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/ChartJS/Chart.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
</body>