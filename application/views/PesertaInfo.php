
            <!-- Content -->
            <div class="col-md-10">
                <nav aria-label="breadcrumb" class="col-md-6 mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>peserta">Peserta</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Info</li>
                    </ol>
                </nav>
                <div class="row col-md-12 mt-4" id="nm_page">
                    <div class="col-md-12 mb-3 mt-3">
                        <h1>Info Peserta</h1>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td><?php echo $dataPeserta->pNama; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori</th>
                                <td><?php echo ucwords($dataPeserta->kategori); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">No HP</th>
                                <td><?php echo $dataPeserta->noHp; ?></td>
                            </tr>
                            <?php
                            if($dataPeserta->kategori == 'mahasiswa')
                            {
                            ?>
                            <tr>
                                <th scope="row">Institut</th>
                                <td><?php echo $dataPeserta->institut; ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <th scope="row">No Tiket</th>
                                <td><?php echo $dataPeserta->noTiket; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Panitia</th>
                                <td><?php echo $dataPeserta->uNama; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tgl Register</th>
                                <td><?php echo date('d/m/Y', strtotime($dataPeserta->tglInput)); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>