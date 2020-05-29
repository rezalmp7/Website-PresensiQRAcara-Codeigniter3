<!-- Content -->
<div class="col-md-10">
                <nav aria-label="breadcrumb" class="col-md-6 mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="row col-md-12 mt-4" id="nm_page">
                    <div class="col-md-12 mb-3 mt-3">
                        <h1>Edit User</h1>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <form method="post" action="<?php echo base_url(); ?>user/editAksi">
                        <input type="hidden" name="id" value="<?php echo $dataEditUser->id; ?>">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $dataEditUser->nama; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required value="<?php echo $dataEditUser->username; ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="hidden" name="passwordLama" value="<?php echo $dataEditUser->password; ?>">
                            <input type="password" class="form-control" name="passwordBaru">
                        </div>
                        <div class="form-group">
                            <label>Kepanitian</label>
                            <input type="text" class="form-control" name="posisi" required value="<?php echo $dataEditUser->posisi; ?>">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" name="level" required>
                                <option value="">-- Select Level --</option>
                                <option value="1" <?php if($dataEditUser->level==1) { echo "selected"; } ?>>Admin</option>
                                <option value="2" <?php if($dataEditUser->level==2) { echo "selected"; } ?>>User</option>
                                <option value="3" <?php if($dataEditUser->level==3) { echo "selected"; } ?>>Keuangan</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-success mb-2"><i class="zmdi zmdi-floppy"></i> Simpan</button>
                    </form>
                </div>