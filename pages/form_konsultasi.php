<?php
$judul = "Form Bantuan Sistem";
$link = $link_web . "/formKonsultasi";

if (isset($_POST['kirim'])) {
    $notiket = $_POST['notiket'];
    $nim = $_POST['nim'];
    $nama = $db->amankan($_POST['nama']);
    $telepon = $_POST['telepon'];
    $status = $_POST['status'];
    $sistem_informasi = $_POST['sistem_informasi'];
    $masalah = $_POST['masalah'];
    $deskripsi_masalah = $_POST['deskripsi_masalah'];
    $simpan = $db->insertdata("tb_masalah_sistem", "notiket,nim,nama,telepon,status,sistem_informasi,masalah,deskripsi_masalah", "'$notiket','$nim','$nama','$telepon','$status','$sistem_informasi','$masalah','$deskripsi_masalah'");
    if ($simpan) {
        echo $db->alert("Proses Berhasil", $link . "/berhasil");
    }
}
?>
<!-- Content Header (Page header) -->
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
<?php
if ($req3 == "") { ?>
    <div class="content">
        <div class="container">
            <div class="card card-primary">
                <!-- form start -->
                <form action="<?php echo $link ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiket Antri</label>
                            <?php $no_tiket = "tiket-" . time(); ?>
                            <input type="text" class="form-control" id="no-tiket" name="notiket" value="<?php echo $no_tiket ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIM/NIK</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nim" placeholder="Enter NIM/NIK" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="nama" placeholder="Nama yang terdaftar di SIAKAD" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telpon (WA) <span style="font-weight: bold; color: brown;">Catatan : Akan dihubungi lewat Whatsapp</span></label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="telepon" placeholder="Enter No Whatsapp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status :</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" value="Mahasiswa" id="status1" type="radio" name="status">
                                    <label class="form-check-label" for="status1">Mahasiswa</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Dosen" id="status2" type="radio" name="status" checked>
                                    <label class="form-check-label" for="status2">Dosen</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Tendik" id="status3" type="radio" name="status">
                                    <label class="form-check-label" for="status3">Tendik</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sistem Informasi</label>
                            <select class="form-control" name="sistem_informasi">
                                <option>SIAKAD</option>
                                <option>SMRUANG</option>
                                <option>LMS (E-learning)</option>
                                <option>CBT Online</option>
                                <option>Evados</option>
                                <option>Email UNISM</option>
                                <option>SIMPEG</option>
                                <option>SIKAP</option>
                                <option>SIMKEU</option>
                                <option>SIMIV</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Masalah/Gangguan</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="masalah" placeholder="Contoh: Email tidak aktif, SKS kurang di KHS" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ceritakan Masalah/Ganggun disini</label>
                            <textarea name="deskripsi_masalah" id="" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <!-- <span style="font-weight: bold; color: brown;">Catatan : Jika tidak ada bukti, Biarkan kosong</span>
                    <div class="form-group">
                        <label for="exampleInputFile">Bukti 1</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="bukti1" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Bukti 2</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="bukti2" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Bukti 3</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="bukti3" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Bukti 4</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="bukti4" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="persetujuan" onclick="setuju()">
                        <label class="form-check-label" for="persetujuan">Saya Setuju Menunggu sesuai antrian, 
                            <span style="font-weight: bold; color: brown;">Klik Setuju untuk menampilkan tombol kirim</span>
                        </label>
                    </div> 
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="tombol-kirim" name="kirim" style="display: none;"> Kirim</button>
                        <div class="text-right">
                            <a href="<?php echo $link_web ?>" class="btn btn-danger"> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } elseif ($req3 == "berhasil") { ?>
    <div class="content">
        <div class="container">
            <div class="error-page">
                <h2 class="headline text-warning"> SUKSES</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Permintaan Bantuan Sukses dikirim.</h3>

                    <p>
                        Smartcampus akan menghubungi, sesuai antrian. Lihat Antrian <a href="<?php echo $link_web . "/tabelUrutan" ?>">Disini</a>. Atau Kembali ke home <a href="<?php echo $link_web ?>">Disini</a>.
                    </p>
                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </div>
    </div>
<?php } ?>
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
<script>
    function setuju() {
        var x = document.getElementById("tombol-kirim");
        if (x.style.display == "none") {
            x.style.display = "";
        } else {
            x.style.display = "none";
        }
    }
</script>