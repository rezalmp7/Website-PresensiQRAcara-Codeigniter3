            <!-- Content -->
            <div class="col-md-10 m-0 p-0">
                <nav aria-label="breadcrumb" class="col-md-6 mt-3 m-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Presensi</li>
                    </ol>
                </nav>
                <div class="row col-md-12 mt-4 m-0 p-0" id="nm_page">
                    <div class="col-md-12 mb-2 m-0 p-0">
                        <h1>Data Presensi</h1>
                    </div>
                </div>
                <div class="row justify-content-end pr-5 pl-5 m-0">
                    <a class="btn btn-primary" href="<?php echo base_url() ;?>presensi/cetak"><i class="zmdi zmdi-print"></i> Cetak</a>
                </div>
                <div class="col-md-12 mt-5 m-0 table-responsive">
                    <table id="table_user" class="table table-striped table-bordered col-md-12">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>No Tiket</th>
                                <th>Kehadiran</th>
                                <th>Waktu</th>
                                <th>Panitia</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        ?>
                        <?php
                        $i = 1;
                        foreach($dataPresensi as $presensi)
                        {
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $presensi->namaPeserta; ?></td>
                                <td><?php echo $presensi->noTiket; ?></td>
                                <td>
                                    <?php
                                        if($presensi->waktu != null)
                                        {
                                            echo "<div class='rounded p-2 bg-success text-white'>Hadir</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='rounded p-2 bg-danger text-white'>Tidak Hadir</div>";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($presensi->waktu != null)
                                        {
                                            echo $presensi->waktu;
                                        }
                                        else
                                        {
                                            echo "-";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($presensi->namaPanitia != null)
                                        {
                                            echo $presensi->namaPanitia;
                                        }
                                        else
                                        {
                                            echo "-";
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>