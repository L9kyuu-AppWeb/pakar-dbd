<?php
$judul = "Tabel Urut No-Tiket";
$idadmin = $_SESSION['msc_unism_akun'];

if ($req3 == "proses") {
    $simpan = $db->updateData("tb_masalah_sistem", "tanggapan='proses'", "id", $req4);
    if ($simpan) {
        echo $db->alert("proses berhasil", $link_web);
    }
}
if ($req3 == "selesai") {
    $simpan = $db->updateData("tb_masalah_sistem", "tanggapan='selesai', idadmin='$idadmin'", "id", $req4);
    if ($simpan) {
        echo $db->alert("proses berhasil", $link_web);
    }
}
if ($req3 == "tolak") {
    $simpan = $db->updateData("tb_masalah_sistem", "tanggapan='tolak', idadmin='$idadmin'", "id", $req4);
    if ($simpan) {
        echo $db->alert("proses berhasil", $link_web);
    }
}
?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo $link_web ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo $link_web ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo $link_web ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
<div class="content">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Urutan</th>
                            <th>Sistem Informasi</th>
                            <th>Masalah</th>
                            <th>Deskripsi Masalah</th>
                            <th data-priority="2">Nim</th>
                            <th data-priority="1">Nama</th>
                            <th>Tanggapan</th>
                            <th>Proses</th>
                            <th>Selesai</th>
                            <th>Tolak</th>
                            <th>whatsapp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $tampil = $db->tampildata2("tb_masalah_sistem", "and tanggapan='Antri' or tanggapan='Proses' order by waktu asc");
                        while ($row = $tampil->fetch_array()) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>
                                    <?php echo $row['sistem_informasi'] ?>
                                </td>
                                <td>
                                    <?php echo $row['masalah'] ?>
                                </td>
                                <td>
                                    <?php echo $row['deskripsi_masalah'] ?>
                                </td>
                                <td>
                                    <?php echo $row['nim'] ?>
                                </td>
                                <td>
                                    <?php echo $row['nama'] ?>
                                </td>
                                <td>
                                    <?php echo $row['tanggapan'] ?>
                                </td>
                                <td>
                                    <a href="<?php echo $link_web . "//proses/" . $row['id'] ?>">Proses</a>
                                </td>
                                <td>
                                    <a href="<?php echo $link_web . "//selesai/" . $row['id'] ?>">Selesai</a>
                                </td>
                                <td>
                                    <a href="<?php echo $link_web . "//tolak/" . $row['id'] ?>">Tolak</a>
                                </td>
                                <td>
                                    <a href="https://wa.me/+62<?php echo $row['telepon'] ?>" target="_blank"><?php echo $row['telepon'] ?></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="<?php echo $link_web ?>" class="btn btn-danger"> Kembali</a>
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
<!-- DataTables  & Plugins -->
<script src="<?php echo $link_web ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $link_web ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $link_web ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $link_web ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $link_web ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $link_web ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $link_web ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo $link_web ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo $link_web ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo $link_web ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $link_web ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo $link_web ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            columnDefs: [{
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: -1
                }
            ]
        });
    });
</script>