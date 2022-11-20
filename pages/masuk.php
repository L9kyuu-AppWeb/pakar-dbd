<?php
$judul = "Masuk Sistem";
$link = $link_web . "/masuk";

if (isset($_POST['masuk'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user == "admin" and $pass == "p4kardbd") {
        $_SESSION['pakardbd_user'] = $user;

        echo $db->alert("Proses Berhasil", $link_web);
    } else {
        echo $db->alert("Username dan Password tidak Sama...", $link);
    }

    // $log = $db->login("id, nama", "tb_admin", "and username ='$user' and password = '$pass'") or die($koneksi->error);
    // $log->execute();
    // $log->store_result();
    // $cek = $log->num_rows;
    // $log->bind_result($id, $nama);
    // $log->fetch();
    // if ($cek > 0) {
    //     $_SESSION['msc_unism_akun'] = $id;
    //     $_SESSION['msc_unism_nama'] = $nama;

    //     echo $db->alert("Proses Berhasil", $link_web);
    // } else {
    //     echo $db->alert("Username dan Password tidak Sama...", $link);
    // }
}
?>
<!-- Content Header (Page header) -->
<style>
    .halaman-login {
        margin: 20px auto 0;
        width: 300px;
    }

    @media (max-width: 767.98px) {
        .halaman-login {
            width: 100%;
        }
    }

    .halaman-login>.headline {
        float: left;
        font-size: 100px;
        font-weight: 300;
    }

    @media (max-width: 767.98px) {
        .halaman-login>.headline {
            float: none;
            text-align: center;
        }
    }

    .halaman-login>.error-content {
        display: block;
        margin-left: 190px;
    }

    @media (max-width: 767.98px) {
        .halaman-login>.error-content {
            margin-left: 0;
        }
    }

    .halaman-login>.error-content>h3 {
        font-size: 25px;
        font-weight: 300;
    }

    @media (max-width: 767.98px) {
        .halaman-login>.error-content>h3 {
            text-align: center;
        }
    }
</style>
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> <?php echo $judul ?></small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <!-- <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Layout</a></li>
                    <li class="breadcrumb-item active">Top Navigation</li>
                </ol> -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container">
        <div class="halaman-login">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <p class="login-box-msg">Masukan Username dan Password</p>

                    <form action="<?php echo $link ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <button type="submit" class="btn btn-block btn-primary btn-block" name="masuk"> Masuk</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<?php include 'config/foot.php' ?>
</div>

<?php include 'config/jquery.php' ?>