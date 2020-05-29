<!-- Content -->
<div class="col-md-10">
                <nav aria-label="breadcrumb" class="col-md-6 mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
                <div class="row col-md-12 mt-4" id="nm_page">
                    <div class="col-md-12 mb-3 mt-3">
                        <h1>Tambah User</h1>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <form method="post" action="<?php echo base_url(); ?>user/tambahAksi">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Kepanitian</label>
                            <input type="text" class="form-control" name="posisi" required>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" name="level" required>
                                <option>-- Select Level --</option>
                                <option value="1">Admin</option>
                                <option value="2">Panitia</option>
                                <option value="3">Bendahara</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-success mb-2"><i class="zmdi zmdi-floppy"></i> Simpan</button>
                    </form>
                </div>