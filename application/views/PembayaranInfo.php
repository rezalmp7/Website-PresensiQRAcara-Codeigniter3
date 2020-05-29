<!-- Content -->
<div class="col-md-10">
                <nav aria-label="breadcrumb" class="col-md-6 mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>pembayaran">Pembayaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Info</li>
                    </ol>
                </nav>
                <div class="row col-md-12 mt-4" id="nm_page">
                    <div class="col-md-12 mb-3 mt-3">
                        <h1>Info Pembayaran</h1>
                    </div>
                </div>
                <div class="row col-md-row mt-2">
                    <div class="col-md-6 mt-2">
                        <h3>Info Peserta</h3>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama</th>
                                    <td><?php echo $dataUser->nama; ?></td>
                                </tr>
                                <?php
                                if($_GET['pos'] == 'peserta')
                                {
                                ?>
                                <tr>
                                    <th scope="row">Kategori</th>
                                    <td><?php echo $dataUser->kategori; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">No HP</th>
                                    <td><?php echo $dataUser->noHp; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Institut</th>
                                    <td><?php echo $dataUser->institut; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">No Tiket</th>
                                    <td><?php echo $dataUser->noTiket; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Register</th>
                                    <td><?php echo $dataUser->namaPanitia; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tgl Register</th>
                                    <td><?php echo date('d/m/Y', strtotime($dataUser->tglInput)); ?></td>
                                </tr>
                                <?php
                                }
                                else
                                {
                                ?>
                                <tr>
                                    <th scope="row">Username</th>
                                    <td><?php echo $dataUser->username; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Posisi</th>
                                    <td><?php echo $dataUser->posisi; ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 mt-2">
                        <h3>Info pembayaran</h3>
                        <table class="table">
                            <thead>
                                <th>Angsuran ke-</th>
                                <th>Nominal</th>
                                <th>Tanggal</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    $totalPembayaran = 0;
                                    foreach($dataInfoPembayaran as $pembayaran)
                                    {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <?php echo $pembayaran->angsuran; ?>
                                    </td>
                                    <td><?php echo date('d/m/Y', strtotime($pembayaran->tgl)); ?></td>
                                <?php
                                    $i++;
                                    $totalPembayaran = $totalPembayaran + $pembayaran->angsuran; 
                                    }
                                ?>
                                <tr>
                                    <th scope="row">Total</th>
                                    <td colspan="2">
                                        <?php
                                            
                                            if($totalPembayaran == null)
                                            {
                                                echo "-";
                                            }
                                            else
                                            {
                                                echo "Rp. ".number_format($totalPembayaran,2,',','.'); 
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                if($_GET['pos'] == 'peserta')
                                {
                                ?>
                                <tr>
                                    <th scope="row">Keterangan</th>
                                    <td colspan="2">
                                        <?php
                                            if($totalPembayaran == null)
                                            {
                                                echo "Belum Membayar";
                                            }
                                            elseif($totalPembayaran != $dataHargaTiket->nominal)
                                            {
                                                $belumLunas = abs($dataHargaTiket->nominal - $totalPembayaran);
                                                echo "<div style='color:#ff0000;'>- Rp. ".number_format($belumLunas,2,',','.')."</div>";
                                            }
                                            else
                                            {
                                                echo "Lunas";
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>