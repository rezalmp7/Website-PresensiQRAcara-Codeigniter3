<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Kecank Sup</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="Presensi Acara QR Code">
        <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/web/logo_kecank.png" type="image/png" sizes="16x16">
        <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="container col-md-12">
            <?php
                if($_GET)
                {
                    if($_GET['note'] == 2)
                    {
            ?>
                        <div class="alert alert-success" role="alert">
                            <b>Scan Success!!</b> peserta no: <?php echo $_GET['no']; ?> telah ditambah
                        </div>
            <?php
                    }
                    elseif($_GET['note'] == 1)
                    {
            ?>
                        <div class="alert alert-warning" role="alert">
                            <b>Scan Failled!!</b> peserta no: <?php echo $_GET['no']; ?> sudah ada
                        </div>
            <?php
                    }
                    elseif($_GET['note'] == 3)
                    {
            ?>
                        <div class="alert alert-danger" role="alert">
                            <b>Scan Failled!!</b> peserta no: <?php echo $_GET['no']; ?> belum terdaftar
                        </div>
            <?php
                    }
                }
            ?>
            <h3 class="col-md-12">Scan QR Ke Kamera</h3>
            <hr>
            <canvas class="col-md-6"></canvas>
            <hr>
            <select></select>
            <form action='<?php echo base_url(); ?>scan/tambahPresensi' id='myform' name="myform" method='post'>
                <input type='hidden' id='qrcode' name="qrcode" />
            </form>          
            <ul></ul>
            <a href="<?php echo base_url(); ?>dashboard" class="btn btn-primary"> Beranda</a>
            <a href="<?php echo base_url(); ?>presensi" class="btn btn-success"> Kehadiran</a>
        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/webcodecamjs/js/qrcodelib.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/webcodecamjs/js/webcodecamjs.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/webcodecamjs/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript">
        	var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
            var arg = {
                resultFunction: function(result) {
                	var aChild = document.createElement('li');
                	aChild[txt] = result.format + ': ' + result.code;
                    document.querySelector('body').appendChild(aChild);
                    window.onload=document.getElementById("qrcode");
                    var element_jam = document.getElementById("qrcode");
                    element_jam.value = result.code;
                    document.myform.submit();
                }
            };
            var decoder = new WebCodeCamJS("canvas").buildSelectMenu('select', 'environment|back').init(arg).play();
            /*  Without visible select menu
                var decoder = new WebCodeCamJS("canvas").buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
            */
            document.querySelector('select').addEventListener('change', function(){
            	decoder.stop().play();
            });
        </script>
    </body>
</html>