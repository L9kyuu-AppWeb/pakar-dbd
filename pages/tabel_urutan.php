<?php
$judul = "Tabel Data";
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
                            <th>No</th>
                            <th data-priority="2">Nama</th>
                            <th data-priority="1">Telepon</th>
                            <th>Email</th>
                            <th>Tanggal</th>
                            <th>Provinsi</th>
                            <th>kota</th>
                            <th>Kecamatan</th>
                            <th>Alamat</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $tampil = $db->tampildata3("tb_pengguna", " order by tanggal desc");
                        while ($row = $tampil->fetch_array()) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>
                                    <?php echo $row['nama'] ?>
                                </td>
                                <td>
                                    <?php echo $row['telepon'] ?>
                                </td>
                                <td>
                                    <?php echo $row['email'] ?>
                                </td>
                                <td>
                                    <?php echo $row['tanggal'] ?>
                                </td>
                                <td>
                                    <?php echo $db->lihatdata("provinces", "name", "id", $row['provinces_id']);  ?>
                                </td>
                                <td>
                                    <?php echo $db->lihatdata("regencies", "name", "id", $row['regencies_id']);  ?>
                                </td>
                                <td>
                                    <?php echo $db->lihatdata("districts", "name", "id", $row['districts_id']);  ?> </td>
                                <td>
                                    <?php echo $row['alamat'] ?>
                                </td>
                                <td>
                                    <?php echo $row['hasil_mutu'] ?>
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