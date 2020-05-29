            <!-- Content -->
            <div class="col-md-10">
                <nav aria-label="breadcrumb" class="col-md-6 mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
                    </ol>
                </nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Pembayaran Peserta</a>
                    </li><li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>pembayaran/panitia">Pembayaran Panitia</a>
                    </li>
                </ul>
                <div class="row col-md-12 mt-4" id="nm_page">
                    <div class="col-md-6">
                        <h1>Data Pembayaran Peserta</h1>
                    </div>
                    <div class="col-md-6 mt-5">
                        Harga Tiket : Rp. <?php echo number_format($dataNominalUmum->nominal,2,',','.'); ?> 
                        <button class="btn btn-warning" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Edit
                        </button>
                        <form  class="dropdown-menu" aria-labelledby="dLabel" style="padding:5px;" method="post" action="<?php echo base_url(); ?>pembayaran/aksi_edit_hargaTiket">
                            <div class="form-group">
                                <label>Harga</label>
                                Rp. <input type="text" name="nominal" class="form-control" value="<?php echo $dataNominalUmum->nominal; ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12 mt-2 table-responsive">
                    <table id="table_user" class="table table-striped table-bordered col-md-12">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Pembayaran</th>
                                <th>No Tiket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach($dataPesertaPembayaran as $peserta)
                            {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $peserta['nama']; ?></td>
                                <td><?php echo $peserta['noHp']; ?></td>
                                <td>
                                    <?php
                                    $lunas = $dataNominalUmum->nominal;

                                    if($peserta['angsuran']  == $lunas)
                                    {
                                        echo "<div class='rounded p-2 bg-success text-white'>Lunas</div>";
                                    }
                                    elseif($peserta['angsuran'] != null)
                                    {
                                        echo "<div class='rounded p-2 bg-warning text-black'>Rp. ".number_format($peserta['angsuran'],2,',','.')."</div>"; 
                                    }
                                    else
                                    {
                                        echo "<div class='rounded p-2 bg-danger text-white'>Belum Membayar</div>";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $peserta['noTiket']; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>pembayaran/info/<?php echo $peserta['id']; ?>?pos=peserta" class="btn btn-info"><i class="zmdi zmdi-info-outline"></i> Detail</a>
                                    <?php
                                    if($peserta['angsuran']  != $lunas)
                                    {
                                    ?>
                                    <div class="btn-group dropup">
                                        <button class="btn btn-success" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="zmdi zmdi-plus"></i> Tambah
                                        </button>
                                        <div class="dropdown-menu pl-3 pb-3 pr-3 pt-3" aria-labelledby="dLabel">
                                            <form method="post" action="<?php echo base_url(); ?>pembayaran/aksiTambahAngsuran">
                                                <input type="hidden" name="table" value="pembayaran">
                                                <input type="hidden" name="idUser" value="<?php echo $peserta['id']; ?>">
                                                <div class="form-group">
                                                    <label>Nominal</label>
                                                    <input type="number" name="nominal" required>
                                                </div>
                                                <input type="submit" class="btn btn-success" value="Simpan">
                                            </form>
                                        </div>
                                    </div>
                                    <?php
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