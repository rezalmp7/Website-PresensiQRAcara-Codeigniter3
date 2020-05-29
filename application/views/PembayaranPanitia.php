<!-- Content -->
<div class="col-md-10">
                <nav aria-label="breadcrumb" class="col-md-6 mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>pembayaran">Pembayaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Panitia</li>
                    </ol>
                </nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>pembayaran">Pembayaran Peserta</a>
                    </li><li class="nav-item">
                        <a class="nav-link active" href="#">Pembayaran Panitia</a>
                    </li>
                </ul>
                <div class="row col-md-12 mt-4" id="nm_page">
                    <div class="col-md-6">
                        <h1>Data Pembayaran Panitia</h1>
                    </div>
                    <div class="col-md-6 mt-5">
                        
                    </div>
                </div>
                <div class="col-md-12 mt-2 table-responsive">
                    <table id="table_user" class="table table-striped table-bordered col-md-12">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach($dataUserPembayaran as $dataUser)
                            {
                                if($dataUser['level'] == '1')
                                {
                                    continue;
                                }
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $dataUser['nama']; ?></td>
                                <td><?php echo $dataUser['username']; ?></td>
                                <td>
                                    <?php
                                    if($dataUser['angsuran'] == null)
                                    {
                                        echo "<div class='btn btn-danger'>Belum Membayar</div>";
                                    }
                                    else
                                    {
                                        echo "<div class='btn btn-warning'>".$dataUser['angsuran']."</div>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>pembayaran/info/<?php echo $dataUser['id']; ?>?pos=panitia" class="btn btn-info"><i class="zmdi zmdi-info-outline"></i> Detail</a>
                                    <div class="btn-group dropup">
                                        <button class="btn btn-success" id="dLabel1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="zmdi zmdi-plus"></i> Tambah
                                        </button>
                                        <div class="dropdown-menu pl-3 pb-3 pr-3 pt-3" aria-labelledby="dLabel1">
                                            <form method="post" action="<?php echo base_url(); ?>pembayaran/aksiTambahAngsuran">
                                                <input type="hidden" name="table" value="pembayaranPanitia">
                                                <input type="hidden" name="idUser" value="<?php echo $dataUser['id']; ?>">
                                                <div class="form-group">
                                                    <label>Nominal</label>
                                                    <input type="number" name="nominal" required>
                                                </div>
                                                <input type="submit" class="btn btn-success" value="Simpan">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>