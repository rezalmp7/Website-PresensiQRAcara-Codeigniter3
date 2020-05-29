<!-- Content -->
<div class="col-md-10">
                <nav aria-label="breadcrumb" class="col-md-6 mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
                <div class="row col-md-12 mt-4" id="nm_page">
                    <div class="col-md-6">
                        <h1>Data User</h1>
                    </div>
                    <div class="col-md-6 mt-5">
                        <a href="<?php echo base_url();?>user/tambah" class="btn btn-success float-right"><i class="zmdi zmdi-account-add"></i> Tambah</a>
                    </div>
                </div>
                <div class="col-md-12 mt-2 table-responsive">
                    <table id="table_user" class="table table-striped table-bordered col-md-12">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Sie</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach($dataUser as $user)
                            {
                                if($user->level==1)
                                {
                                    continue;
                                }
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $user->nama; ?></td>
                                <td><?php echo $user->username; ?></td>
                                <td><?php echo $user->posisi; ?></td>
                                <td><?php if($user->level==2) { echo "Panitia"; } else { echo "Keuangan"; } ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>user/edit/<?php echo $user->id; ?>" class="btn btn-warning"><i class="zmdi zmdi-edit"></i> Edit</a>
                                    <a href="<?php echo base_url(); ?>user/hapus/<?php echo $user->id; ?>" class="btn btn-danger"><i class="zmdi zmdi-delete"></i> Hapus</a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>