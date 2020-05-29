<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kecank Sup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Presensi Acara QR Code">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="vendor/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/icon_zmdi/css/material-design-iconic-font.min.css">
</head>
<body>
    <div class="container col-md-12">
        <header class="col-md-12">
            <div class="row col-md-12">
                <div class="col-md-6">
                    <a href="index.php" class="ml-3">
                        <img src="image/web/logo_putih.png" id="logoKecank" alt="Logo Kecank Sup">
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="dropdown">
                        <a class="float-right row"href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <p id="textUser">Wellcome<b>, admin</b></p>
                            <img src="image/icon/icon_admin.png" id="iconUser" class="ml-3" alt="Logo Kecank Sup">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><i class="zmdi zmdi-power"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Sidebar/Content -->
        <div class="row container col-md-12" >
            <!-- Sidebar -->
            <div class="col-md-2" id="menu">
                <ul class="col-md-12">
                    <li class="col-md-12"><a href="index.php"  class="col-md-12"><i class="zmdi zmdi-home"></i> Beranda</a></li><hr class="col-md-11 ml-2" />
                    <li class="col-md-12"><a href="user.php"  class="col-md-12"><i class="zmdi zmdi-account"></i> User</a></li><hr class="col-md-11 ml-2" />
                    <li class="col-md-12"><a href="peserta.php"  class="col-md-12"><i class="zmdi zmdi-accounts-alt"></i> Peserta</a></li><hr class="col-md-11 ml-2" />
                    <li class="col-md-12"><a href="pembayaran.php"  class="col-md-12"><i class="zmdi zmdi-money-box"></i> Pembayaran</a></li><hr class="col-md-11 ml-2" />
                    <li class="col-md-12"><a href="presensi.php"  class="col-md-12"><i class="zmdi zmdi-check-all"></i> Presensi</a></li><hr class="col-md-11 ml-2" />
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->
            <!-- Content -->
            <div class="col-md-10">
                <nav aria-label="breadcrumb" class="col-md-6 mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Peserta</li>
                    </ol>
                </nav>
                <div class="row col-md-12 mt-4" id="nm_page">
                    <div class="col-md-6">
                        <h1>Data Peserta</h1>
                    </div>
                    <div class="col-md-6 mt-5">
                        <a href="peserta_tambah.php" class="btn btn-success float-right"><i class="zmdi zmdi-account-add"></i> Tambah</a>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <table id="table_user" class="table table-striped table-bordered col-md-12">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Kategori Peserta</th>
                                <th>No Tiket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ihsan</td>
                                <td>1781293</td>
                                <td>Umum</td>
                                <td>0023</td>
                                <td>
                                    <a href="peserta_info.php" class="btn btn-info"><i class="zmdi zmdi-info-outline"></i> Detail</a>
                                    <a href="peserta_info.php" class="btn btn-warning"><i class="zmdi zmdi-edit"></i> Edit</a>
                                    <a href="peserta_info.php" class="btn btn-danger"><i class="zmdi zmdi-delete"></i> Hapus</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Ihsan</td>
                                <td>1781293</td>
                                <td>Mahasiswa</td>
                                <td>0012</td>
                                <td>
                                    <button type="button" class="btn btn-info"><i class="zmdi zmdi-info-outline"></i> Detail</button>
                                    <button type="button" class="btn btn-warning"><i class="zmdi zmdi-edit"></i> Edit</button>
                                    <button type="button" class="btn btn-danger"><i class="zmdi zmdi-delete"></i> Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ihsan</td>
                                <td>1781293</td>
                                <td>Umum</td>
                                <td>0001</td>
                                <td>
                                <button type="button" class="btn btn-info"><i class="zmdi zmdi-info-outline"></i> Detail</button>
                                    <button type="button" class="btn btn-warning"><i class="zmdi zmdi-edit"></i> Edit</button>
                                    <button type="button" class="btn btn-danger"><i class="zmdi zmdi-delete"></i> Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ihsan</td>
                                <td>1781293</td>
                                <td>Mahasiswa</td>
                                <td>0111</td>
                                <td>
                                <button type="button" class="btn btn-info"><i class="zmdi zmdi-info-outline"></i> Detail</button>
                                    <button type="button" class="btn btn-warning"><i class="zmdi zmdi-edit"></i> Edit</button>
                                    <button type="button" class="btn btn-danger"><i class="zmdi zmdi-delete"></i> Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ihsan</td>
                                <td>1781293</td>
                                <td>Umum</td>
                                <td>0999</td>
                                <td>
                                <button type="button" class="btn btn-info"><i class="zmdi zmdi-info-outline"></i> Detail</button>
                                    <button type="button" class="btn btn-warning"><i class="zmdi zmdi-edit"></i> Edit</button>
                                    <button type="button" class="btn btn-danger"><i class="zmdi zmdi-delete"></i> Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ihsan</td>
                                <td>1781293</td>
                                <td>Ketua Umum</td>
                                <td>Admin</td>
                                <td>
                                <button type="button" class="btn btn-info"><i class="zmdi zmdi-info-outline"></i> Detail</button>
                                    <button type="button" class="btn btn-warning"><i class="zmdi zmdi-edit"></i> Edit</button>
                                    <button type="button" class="btn btn-danger"><i class="zmdi zmdi-delete"></i> Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ihsan</td>
                                <td>1781293</td>
                                <td>Ketua Umum</td>
                                <td>Admin</td>
                                <td>
                                <button type="button" class="btn btn-info"><i class="zmdi zmdi-info-outline"></i> Detail</button>
                                    <button type="button" class="btn btn-warning"><i class="zmdi zmdi-edit"></i> Edit</button>
                                    <button type="button" class="btn btn-danger"><i class="zmdi zmdi-delete"></i> Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Footer -->
                <footer class="page-footer font-small blue pt-4">

                <!-- Copyright -->
                    <div class="footer-copyright text-center py-3">© <?php echo date('Y'); ?> Copyright:
                        <a href="https://kecanksup.websapp.com/education/bootstrap/"> kecank_sup</a>
                    </div>
                <!-- Copyright -->

                </footer>
                <!-- /Footer -->
            </div>
        </div>
        <!-- /Sidebar/Content/footer -->
    </div>
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="vendor/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="vendor/DataTables/DataTables-1.10.20/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendor/ChartJS/Chart.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>