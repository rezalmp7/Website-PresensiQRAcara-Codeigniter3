            <!-- Content -->
            <div class="col-md-10" id="content-dashboard">
                <div class="row col-md-12 mt-3 mb-5">
                    <div class="col-md-3 ml-5 mr-5 mb-3" id="label-dashboard">
                        <div class="col-md-12">
                            <h1>Peserta</h1>
                            <h2><?php echo $dataPeserta; ?></h2>
                        </div>
                    </div>
                    <div class="col-md-3 ml-5 mr-5 mb-3" id="label-dashboard">
                        <div class="col-md-12">
                            <h1 class="headerLabel">Lunas</h1>
                            <h2>
                                <?php
                                    $i = 0;
                                    $lunas = $dataNominalUmum->nominal;
                                    foreach($dataPembayaran as $peserta)
                                    {
                                        if($peserta['angsuran']  == $lunas)
                                        {
                                            $i++;
                                        }
                                    }
                                    echo $i;
                                ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-3 ml-5 mr-5 mb-3" id="label-dashboard">
                        <div class="col-md-12">
                            <h1>Berangkat</h1>
                            <h2><?php echo $dataPresensi; ?></h2>
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
        <a href="https://kecanksup.websapp.com/education/bootstrap/"> Fun Media Digital</a>
    </div>
<!-- Copyright -->

</footer>
<!-- /Footer -->
</div>
</div>
<!-- /Sidebar/Content/footer -->
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/DataTables/DataTables-1.10.20/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/ChartJS/Chart.js"></script>
<script type="text/javascript">
var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
var date = new Date();
var bulan = date.getMonth();
var tanggal = date.getDate();
var tanggal1 = <?php echo $date1; ?>;
var tanggal2 = <?php echo $date2; ?>;
var tanggal3 = <?php echo $date3; ?>;
var ctx = document.getElementById('myChart1');
var myChart = new Chart(ctx, {
type: 'line',
data: {
labels: [tanggal3, tanggal2, tanggal1, tanggal+" (now)"],
datasets: [{
    label: months[bulan],
    data: ['<?php echo json_encode($dataTgl3); ?>', '<?php echo json_encode($dataTgl2); ?>', '<?php echo json_encode($dataTgl1); ?>', '<?php echo json_encode($dataTglNow); ?>'],
    backgroundColor: [
        'rgba(174, 0, 1, 0.2)'
    ],
    borderColor: [
        'rgba(211, 166, 37, 0.2)'
    ],
    borderWidth: 2,
    pointHitRadius: 10
}]
},
options: {
scales: {
    yAxes: [{
        ticks: {
            beginAtZero: true
        }
    }]
}
}
});

var ctx = document.getElementById('myChart2');
var myChart = new Chart(ctx, {
type: 'pie',
data: {
labels: ['Mahasiswa', 'Umum'],
datasets: [{
    label: months[bulan],
    data: [<?php echo $dataKtgrMahasiswa; ?>, <?php echo $dataKtgrUmum; ?>],
    backgroundColor: [
        'rgb(238, 186, 	48)',
        'rgb(174, 0, 1)'
    ],
    hoverBorderColor: [
        'rgb(116, 0, 1)',
        'rgb(211, 166, 37)'
    ]
}]
},
options: {
}
});
</script>
</body>
</html>