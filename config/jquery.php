<!-- jQuery -->
<script src="<?php echo $link_web ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $link_web ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo $link_web ?>/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $link_web ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $link_web ?>/dist/js/demo.js"></script>
<script>
    $(document).ready(function() {
        //untuk memanggil plugin select2
        $('#provinsi').select2({
            placeholder: 'Pilih Provinsi',
            language: "id"
        })

        $('#kota').select2({
            placeholder: 'Pilih Kota',
            language: "id"
        })

        $('#kecamatan').select2({
            placeholder: 'Pilih Kecamatan',
            language: "id"
        })

        //saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
        $("#provinsi").change(function() {
            $("img#load1").show();
            var id_provinces = $(this).val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "config/data-wilayah.php?jenis=kota",
                data: "id_provinces=" + id_provinces,
                success: function(msg) {
                    $("select#kota").html(msg);
                    $("select#kecamatan").html("");
                    $("img#load1").hide();
                    // getAjaxKota();
                }
            });
        });

        $("#kota").change(getAjaxKota);

        function getAjaxKota() {
            $("img#load2").show();
            var id_regencies = $("#kota").val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "config/data-wilayah.php?jenis=kecamatan",
                data: "id_regencies=" + id_regencies,
                success: function(msg) {
                    $("select#kecamatan").html(msg);
                    $("img#load2").hide();
                    // getAjaxKecamatan();
                }
            });
        }
    });
</script>