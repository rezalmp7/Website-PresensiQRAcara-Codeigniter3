            <!-- Content -->
            <div class="col-md-10">
                <nav aria-label="breadcrumb" class="col-md-6 mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Peserta</li>
                    </ol>
                </nav>
                <div class="row col-md-12 mt-4" id="nm_page">
                    <div class="col-md-6">
                        <h1>Data Peserta</h1>
                    </div>
                    <div class="col-md-6 mt-5">
                        <a href="<?php echo base_url(); ?>peserta/tambah" class="btn btn-success float-right"><i class="zmdi zmdi-account-add"></i> Tambah</a>
                    </div>
                </div>
                <div class="col-md-12 mt-2 table-responsive">
                    <table id="table_user" class="table table-striped table-bordered col-md-12">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Kategori Peserta</th>
                                <th>No Tiket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach($dataPeserta as $peserta)
                        {
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $peserta->nama; ?></td>
                                <td><?php echo $peserta->noHp; ?></td>
                                <td><?php echo ucwords($peserta->kategori); ?></td>
                                <td><?php echo $peserta->noTiket; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>peserta/info/<?php echo $peserta->id; ?>" class="btn btn-info"><i class="zmdi zmdi-info-outline"></i> Detail</a>
                                    <a href="<?php echo base_url(); ?>peserta/edit/<?php echo $peserta->id; ?>" class="btn btn-warning"><i class="zmdi zmdi-edit"></i> Edit</a>
                                    <a href="<?php echo base_url(); ?>peserta/hapus/<?php echo $peserta->id; ?>" class="btn btn-danger"><i class="zmdi zmdi-delete"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php
                        $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>