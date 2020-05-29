            <!-- Content -->
            <div class="col-md-10">
                <nav aria-label="breadcrumb" class="col-md-6 mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>peserta">Peserta</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
                <div class="row col-md-12 mt-4" id="nm_page">
                    <div class="col-md-12 mb-3 mt-3">
                        <h1>Tambah Peserta</h1>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <form method="post" action="<?php echo base_url(); ?>peserta/tambahAksi">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" class="form-control" name="noHp" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori" id="kategoriPesertaTambah" required>
                                <option>-- Select Level --</option>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="umum">Umum</option>
                            </select>
                        </div>
                        <div class="form-group" id="intitutPesertaTambah" hidden>
                            <label>Institut</label>
                            <input type="text" class="form-control" name="institut">
                        </div>
                        <div class="form-group">
                            <label>No Tiket</label>
                            <input type="text" class="form-control" name="noTiket" required>
                        </div>
                        
                        <button type="submit" class="btn btn-success mb-2"><i class="zmdi zmdi-floppy"></i> Simpan</button>
                    </form>
                </div>