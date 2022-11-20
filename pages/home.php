<?php
$judul = "Home";
$link = "$link_web";

// $_SESSION['pakar_dbd_profil_hasil'] = "hasil";
// $_SESSION['pakar_dbd_profil_hasil'] = "";

$pakar_dbd_profil = @$_SESSION['pakar_dbd_profil'];
$pakar_dbd_profil_hasil = @$_SESSION['pakar_dbd_profil_hasil'];


if (isset($_POST['profil'])) {
    $simpan = $db->insertdata("tb_pengguna", "nama, email, telepon,provinces_id, regencies_id, districts_id, alamat", "'$_POST[nama]','$_POST[email]','$_POST[telepon]','$_POST[provinsi]','$_POST[kota]','$_POST[kecamatan]','$_POST[alamat]'");
    if ($simpan) {
        $tampil = $db->bebas("select max(idpengguna) as id from tb_pengguna")->fetch_array();
        $id = $tampil['id'];
        $_SESSION['pakar_dbd_profil'] = $id;
        echo $db->alert2("$link");;
    }
}

if (isset($_POST['penilaian'])) {
    $x1 = $_POST['x1'];
    $b1 = $db->lihatdata("tb_faktor", "konstan", "kode", $x1);
    $n1 = $db->lihatdata("tb_faktor", "nilai", "kode", $x1);

    $x2 = $_POST['x2'];
    $b2 = $db->lihatdata("tb_faktor", "konstan", "kode", $x2);
    $n2 = $db->lihatdata("tb_faktor", "nilai", "kode", $x2);

    $x3 = $_POST['x3'];
    $b3 = $db->lihatdata("tb_faktor", "konstan", "kode", $x3);
    $n3 = $db->lihatdata("tb_faktor", "nilai", "kode", $x3);

    $x4 = $_POST['x4'];
    $b4 = $db->lihatdata("tb_faktor", "konstan", "kode", $x4);
    $n4 = $db->lihatdata("tb_faktor", "nilai", "kode", $x4);


    $hasil = -1.791 + ($b1 * $n1) + ($b2 * $n2) + ($b3 * $n3) + ($b4 * $n4);
    $hasil_mutu = $db->lihatdata("tb_resiko", "nilai_resiko", "nilai_y", $hasil);
    $simpan = $db->updateData("tb_pengguna", "x1='$x1',x2='$x2',x3='$x3',x4='$x4',hasil='$hasil',hasil_mutu='$hasil_mutu'", "idpengguna", $pakar_dbd_profil);
    $_SESSION['pakar_dbd_profil_hasil'] = "hasil";
    if ($simpan) {
        $ip = getClientIP();
        $tampil = $db->tampildata3("tb_pengguna", "and idpengguna='$pakar_dbd_profil'")->fetch_array();
        $provinsi = $db->lihatdata("provinces", "name", "id", $tampil['provinces_id']);
        $kota = $db->lihatdata("regencies", "name", "id", $tampil['regencies_id']);
        $kecamatan = $db->lihatdata("districts", "name", "id", $tampil['districts_id']);

        $message_text = "IP Address :  $ip\nNama :  $tampil[nama]\nEmail :  $tampil[email]\nNo Whatsapp :  $tampil[telepon]\nProvinsi: $provinsi\nKota : $kota\nKecamatan: $kecamatan\nAlamat :  $tampil[alamat]\n\nHasil Prediksi : $tampil[hasil_mutu].";

        sendMessage($message_text);

        echo $db->alert2("$link");
    }
}
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row mb-2">

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container">
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Informasi</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                                <div id="accordion">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                    Pencegahan
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <img class="d-block w-100" src="<?php echo "$link_web/file/gambar/home.jpeg" ?>" alt="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Gambar Nyamuk DBD</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUVFRgVFRUYGBgZGhwcGhoYHBkaGhwaGB4aGhocGhgcIS4lHB4rIRocJjgnKy8xNjU1GiQ7QDs0Py40NTEBDAwMEA8QHxISHjQrISM0NDQ0NDQ0NDE0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NTQxNDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NP/AABEIALcBEwMBIgACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAAAAQIDBAUGB//EAD0QAAIBAwMBBQcCBAUCBwAAAAECEQADIQQSMUEFIlFhcQYTMoGRobHB8BRC0eEjUmJy8RWyJDNDU5LC8v/EABkBAAMBAQEAAAAAAAAAAAAAAAABAgMEBf/EACQRAQEAAgICAQUBAQEAAAAAAAABAhEhMQMSQTJRYXGRIvAT/9oADAMBAAIRAxEAPwDvUUUV5r0RRRRQBRRRQBRRRQBRRRTAooooB0U5pUAUwaRooBipClSmgLKBSBoogSmilNOmQp0qVAFFFFAFFFImgHUTQTUSaQBNBNI0qAKKKKZiiiilyBuoBqiaA9I9L6KrD1MNQLDoomighRRRQBRRRTArRpdI1wMVgBV3EkwIz/Ss9ee9tXdLG9GKmQGIJHdJXmORjrVYyW6qMrZNx6JTIB8aVK0e6voPxTqVJAUIhKb47oME9AeI+tRd9ok8Dn0ryOle/qVvsjugViyAE7WYHcoI68DkdavHHe7U5ZWakexpTWPsrWi9aS4P5hkeDDDA+hBrXUWaXtIUwagKYNATp1Cac0BKilNFBHSomkTQDmkTSmkTQZzRRUaADQaKaIWIABJOBQSNFWXrRVirCCDBquinLsUUUUBnAoirSlMCodGlBNCtVrJVZSjafXY301eolKgRFPY9WoXKhqNQqIzsYVQWJ8AMk1QrVHVLvtun+ZGX/wCSkfrTl5Rli5vYvtLb1Gou2VMgFvdvwLioTJC9DEH0zjivREV8vv8AYxtWLWtsMVZILjkb0bbuGfLI4j1r3nZHbaX7QuDBEh1n4GAluekZB8K2zwneLDDK3jLvt1Irg+2yk6RyGI2Mj4jkMIkdcwflVev7ZYoSiEqpXc8OFJIYlVI5juzEx1HjiTtHTuzW9Q9p1uLt7rurI7QASQkfF3pmOQZEUsMMtylnnjqx6Psx/wDAtMxibaZOM7RNaxXlLQ/hLz6ZlXuFR7zcSGBVHXcXYBQAw6wI681107WQcBmHAKm2QfQq5n6mllhdnjlNK/aPVlLTR8JEOw/kViACciJOK0ez1hUsJtgh5eRBkNxkc4rxWpuXtRr2VUcozhvdjaS38OoWQTg96TzzjpXoLNnUaV2axpr50xl3tujdyBJNtxPOTt8o8I0uF9ZIiZz2tq3s9zY1T2D8FyXt+Tcuo+ZJr0Bryfbnbli4lu5bL70cMkoQCOHE8cT866Vv2p0xE7n8+4/PrFZ5Y5XnS5ljPl2qK5Ke0umaSGcxzCPj7VYnb+nP8zD1Rx9O7nip9b9l+0dSisSdrac/+qk+BO0/RorRb1SN8Lo3oyn8GlqjcWTTmkadBnRSooAoqNFABpzSqvUXlRS7mFHJ5+w5NAq0Ctuj1osOyNaYvtlSR3VnoT41botbZt21uWyLjsJkggLPSD1rnXrpZizGSTJNafT+2XOX6K7cLEsxknJNRFAFE1lWoiilNFMJGomnUGrN1aMtUGNRLUi9A9Uiai1RZqFNB3EbakEoIqSmmnTheztkNpCjAEBrqEHgjc2D8jXlFuHRPfVHmHCqwg/Bv2iTgOCckggQZHAr02i1nuLGqbBNu85UeLOwCj6mvL9lLbe+vvAzW03PcYMu527slQSDLPtMcgY6Ejs8Uu7fh5/nsmMnzys/ilPC/wARfYjfccb1DcKllHku0k94gmfhAGa1dt9sX7pa1dNwi2N7hh7r/EWQGKbBCrEDHTmTA4YV9NcU7nS4j543qNqtIKttBKtMA9YmvQdo6mb94ojW0uMWdXgNEfzCT1IaOuSeYGuXTnx7QDkOt99Qhd0XcXfbcEptI2LkLtaB17ucxNGm7SII2uo723ePgJJ68xzxHWn25o9XdtPq3tW0tJsQMq7CxGBKqTESJ4EsAJzXFuXDc04U7y7XVUEQEKkfCw6tIkEdB51Mm+122dOt2tqVS6m4k7bfxKCQzO5uOyiPhnIOPtTtdpDlHvjgyARkHyiqOxuyhfvpYuXNhll3SIXaSIyRXo/af2J0mnRXXVguSvcJbvzwF27jPqYqppNledt6p7TM+ndxuBDrESDkmeDJHHnitSOjCS6EAD4l2MMADvD08ehqvS9kWkvIurD20YKMMfjOzaN4J7sEEnkA8CK9X7X+xFqzo/4jTgj3ZPvFZt8qSAGWZEjcceBxRORlPV5q97sEbLyEEDcWZQZ6gDc0iR1+1QuIh/nSR4b+vgFEVx9Pph3St07zJ2hDjJjvHB9IqOs7N1dubzK6AMDuHwqx+HgnaSfGlMd1VupLvt231QHDGP8AYf2aC118JZuPjB923rye6P8Amu32J7XBlVLyEsqDc6DdMYJKgT548a9Tp9QjqHRgynIK8VhlnZ3G0wl+XK9nLN9bc35VjACEqQqLMCF4OTXXzRRWN5rWTU0UnwqQalRQYopM4USxAHn9h61ytX2sSzW7CF3EgnMJEZMwp9Nw4pzG1Nykde+GW097axRFLMQPDoOpPkJNcLS6W7qDv1K7Exstbs+MvHB8pPOa9Rf7SZ0VdgtqAJRTI3RmSORNY6q2Y8T+pkt5v8AAAgcCig0xUNCNKnSNAFFFFBHQwqQXNS21DrZHWoAVrZKqe2YxzRpcyivZUYzV9lgw8COR4UzbzRoplslSkUq5EqRFCbXg+1rxRdUV6XhiRgm1cZSfLeFPyFeT0GhL7rittFvb3mxLEgBFMZcyTzwvFe7/AOk29RqdYl3ujajBv8sKO8cwR6153UaOzb92ti4mpTYzPtlDa2QbjHcxBLAEzEd0ATgHu8d/zp5nmx3lv9n2XqkS/ad1W8UIIDEgP1Ft2I+JTBByOOZqF25qNdqnvW1m626bSqSVAlQYjG2eehX0mvXXLYW2ly6Pdi2XX3S7nS6xPdcMeJyY/wAxjy9L2J28dKr6hUlrm1bg4KPblYKmPiLZng88mjeu/kvXc47h2Lepu6BtM1xArM7OoUm6HtOWi9uPcG5ARA4C9MV5rRuLup0yhQiqVfb0k7EHqe7uz/mNdK/oL+oS5rXVtqy5LMNjFmyNoJJAJwBzA61j7OT/AMQ7QSEe2gbwKqwYkz/Md1FupTxx3lIpvqFe4GUEbicjBDncMejfatek11sEEW0Dp8LxLjb3uWJx8vzWT3RKb4w7vGRMg5nOOR6zWC4Chwc1GN06548cpy9P7RduDVIquFIUZAAAESo48o4ivO9m6z3DDcovWlMm25bYTwCCCCrCMEeFNjtgpmRJBzHBj95xWVEZu6B0kDAnbJ+Ziar2P/yx1rTo6/Xpcb3lm0LIUAbEcng/HuOS/E+MV7TTe2KXdDe09xC1112LsKd5z3QSrEHBAYxPU18zbmZqdtwN7EtuwVIMQwIM/SeCMx6VWOX3c/m8OpuOrpxf02pBWUuookiCQXURPImCMGt3Zmuv6a8GuIypcfvYIQljkg8Aifp6Vf7M6TR6nfd1+tZHkQJh2iRLFlO7AWI8a73tJ21pr2n/AIHRl7zbg5dxAATJPwAN3ZJwMTmaNS7lZW5TVkvEd9GBAIyDx50OQBJIA88D6mvmlvX3e5au624id2BbULC8fEuQAADH+qvS2PY7SsA7PcvT/M7nIPHwxiue4Y491tM8r1HS1vtDprWGuqSCJCncV3Rlo4EGfSvSarSoiEi6ruVOwKe7JGCzZO30ivP6fsTTINqWLYHmgY557zSa3osYH5J/NL2xnU/o9cr3f45H/Qt7btS5u5lUErbUmJgTubjqY8AK61m0qKERQqjAVQAB6AVKipuVva5jJ0KKDSpGZomilSAooopgUUqKQaStOpkUhUunaJqMVa4qFMRRe0oORKkcEc/fkVle7cTld6+Kc/NT+k10S1UuKWwy2u0EmN4Bnhu6ceTQa0i6OZHr+/Kq30yOIdQw8wDx61x+1jYsgKC6O3wJbYiScCEnbE+I8aqTaLw5l7Uql7U3mKvvARbbKSjFVttLjhgJ+EkyRkYFccez72tKNUjne9x7YtldouW177sFEECVMggY46Go+1fZ922qsWBBckKxPvizCXIAG0qFRZOM+Irm6f2iuqiIWDpb3wjzAL7pOCCDngcxmu3D6XneX63qOzfZXT3rCXu/vfJYMYwxHwxEYrLqA6X7iXli1fbaCWBJYKATjgnB8jFaOx/am1p9Olp1drig9xVyNzFl7x8QR4/KazajWLqboUo1tx3lVx0x3hjH9jFYX2lu+nXjMLJrtDT275tNZuu4Gn3Na2JuVy2+GeegBIBgRPkKv7C7F3pdLtAZ2aCCZB+FpkefjXX0KhNxZtxY58hmBnJ5j5CtnvkVG2KqiCYAAE5PSovluXDXHwTHmvMdm6HdpA6As25pAOe6SoYA8mBBHgfIVxBD+APh4HrzXqfZO+BpkyeW5/3Gp9rdmo6MyIC8ErB2ncTJ8iCZMHxNP21lZVyf5ljyVxQCeYqrfkHn18Ktu23TDoynz/cVQgrRUjQdOjCQTunMjoefLn88Vk1NodOlamQgA+PHmBj8j7VQwo2XrL2z+8YQPD/mtGluQyzgn1wKv00AnGOophFaZ58aLWeWLt9hppHuOmqZVDgFHONpGGG4deCB1qrsbt7UoU01lFuliQi5DGSSBnjGax6Ds65d3C0oYpnJAE9OetT7O7H1aX1vd+06HcH7rDcPITiPKqlxs1k488M5d4/L2Om7ZZXe1qbfuLibZUmfiyIIwflXZVp4rjWNLcvt/EahpuMF3jaqr3BAAA4H9a7IFYZ+u+GmPtr/AEdE0poqFiilNOaYFFFKaQOlRNBoB0UpooDdFIc0NQM1LoSbyqg1Y1QZR1OKBBVbtiuZ2j2/Ytd0uGb/ACJ3mPyFZ+1LL6lUCM9lD8fRmB6COKqY/crl8RDXdtnebOnG+51M9xP9zQc+VVWdOunBuXCbl9iBvI7xY4CoOIz6DJ8a12bFrTIFQR0AA7ztEwB/Mxg/k4BIo0yyd7qC5GB0RcEovkepxPpADlkn4PVt/JJoQwL3CPelTD/+3IwEONsY7wgmK8B7M6O2924Lo3qiMVksATOD4wRJ+dfQwcw4BXgg5BHWQeRFeTtaA6ZXXLP/AIqzGWGFQgc5EGPM1eGd9b+dJ8nilynHEltbOxNWlrT+8aFjduaMmDgeJxiKq0btdu/xLgrK7bankLmS3mcn9iud2doZM3CdqMQqHgNwxIPgRHyNdS5cqPJlMdyd1r4fHc8ZbNSf9te189DUNTqiLb/7G/7TWfcfrSeyzrsSNzkKJ4liAJI6ZrLD6o6PJJMLfwzaS86adQnQt/3GtWi1dycmpXezLmnZtPc2l0YhihJUkndIJAMd6cik6MvI+VXndWz8svDJcJfw2aq8rqVcBh5/16Vzb/Z1s24RYfdIYkwR/lP6RQbmYipe8K8cGpmWWK7jjkxDsa5Eys+En8kVG32TdOe6P9xz+DXR9/GKl/EdKqeXIr45rhh0nZDOSGYJHjkn0jpWs6H3MPC3QPiUqJj/AEgzT0rkMSTWxbpBk5mnfJdsr49x0/Z/U6Z1LWVCMfjXgz5ia7qlfCvHaJUFxmA2kjmtWo7Vu2m+DeniORT4vTG42dvVOahNcnQe0Nq5Ana3g2DXVDg8Zo1WeolSmijdQWjmgNS20UA6BUQac0AyaDSmiaAdFKaKA6HSq7nGMGmZAqBacZmodDjans6+0xqCMzgL9OKzN2AzH/E1DuPDC/gTXoGXNIrFPdP1jk6PsWzaO5EAY8k5P3rVqXCruJx+8AdT5VocU2tIVEglgZXwBgifvS5vZ8TpzbdgzvcQYhRwUU8z/qMCfp0zLZuPyrY6QKqTH4p05+HOvIRM1xLnarW9VbFsKXKtJbO3cpXcP9QXdHyNdntW8LKFiJYkKi9Wc4VR6n7A153srsxk1L7jufYGc9N9zLAeQAj61WGOt5fbos8t6xnz3+mwaXaAAIAAAHkOKznTMWgc16JdOInFC2BI6Vlp0TyScRk0/ZI2bmI9JzVN3s+IInmRGK7yWhtkD1+dRvDu/SqkkZXK1w+yL7ahFu3iWcyrnEk2+5JjqQgmujqNCCvT9az+zS928sfBqbo+RYN/9q7ziYUgACcx/Srz17VjhbJHkm7O71QvaI8LmvSe62sD4Z+tWpaByIXz4zWfrG88leTv9j3RBCzIxAn6itWi7HLEbyUEeHX9K9G6bYkkHBn5TOKkqzk9c+p60epXyWvPansUoJUhjOY/PpWnQdmKWG84j9jFdnZ/l+33x1ppbHMRBzHFPSbldONqezB/ID8+ahp9CTXom5JJ6GKrt2eoHXr1p6R7VwNd7OI/KweRFbOwkbToyZYefNdh0/5P3ql7eTxVTKxncZl24Wut6lnLIwAPSnoDqA6i6RsPWu4E8KT6fdT9k+sbL+l2ruUyKwgzU7TmNpJjwqwbQu2Kd9b0jWU75UUA0KpNI81JnNM0qU0BOio0UthrEmJNF1+szVassTkmncuKeEK+vWp+HVrlNSTx1pv4A/OqFYeNamKcSSfLj504WXCgJnn6UL1k0O/kajvA6TSMDzmsxUAkzxz6enU1eg65/Sso1qNcfT7A/cYOW+FQ4IAjMuRmMQIOZxWOO6WWWpx25ei07X7x1Dj/AA1JFlDyCDDOwP8ANII//IJ1tZAdmCgFokjrtECt1i13QqDAAEDEAYHp/wAUigBwPLP9KMst1WOMn7FjSKMwS0cdPJonH0oK9YnP0njNabQgfHn1Pp0qsr9efL09akb5QtpzmPHFJ7ZI45x+/Cr9nU0vddcjp/agt6cHsNgt7VJHF4NjPxopx8wa7bEcCePvVOmTTpdfap96wLXYMSpJVGEg8Qw+Wa0JbYTkGInB70+A+/yqs+/4jC8c/lRtznyHzOMxzVlhwwBEwZ5BU4xwwFTQgNx9enjFXJcM9AM8fPr1/tUxpUNm7AnPEg+Xj0poCMHEDy+VTDnJ9JxOf2aUDpPmTmTEmPrTTskVTGQDPmR1Py+E1N0M9I8vH9DOfnUtqgSf3z/akwng59PDH0/pTSpHOcD0njy61o7pYCMeE/r+5qoLHn6+XPFWl1nb3d2YEgHGTA5MSPqKYppCsSM936ZHQ81U4QqTmZGI6dfv08qHnyBxwI8J6fL51O2ixleIyJjBnIpFZorAjkYPQ4g+PjVIEyevrV11pET1mJ/E81U5KwFbzx0/UGgIKgmamiZpAkZifPr96tVlHj9qZWM11o4qsZNawmZgkZ+dZ9seYoLSJFKrtp5iqbk0IsE0UpopaGqsRvLir719iNp2x5ZrKi4jp1/vVjwRzEek+VRHZZNgCMdamjlT0nzqhW6CrkUcyB6yZ+VEKpG4epzUFWRM/fP0qNxp8fn9qT3FRSzMFVQWJOAAOSaO6V4Z+1u0BYtFzlsKiTl3bCqAPE/YGsvZOlZEAbNxyXuHGXcycjoOB5CsvZ5bVXv4ogiygK6fcI3McPd2kdeB5DgV3EQHn5xV5f5nr/U4832+Pg1BBwczz+aqHPU+f4rQ4MEDjwaJzVNpSMD7Y/FQ1n3Wp6ZPWP1qbqI/569aaSDn6/2ptt4LTPWOPrVfDO3lFAef7/vmrBwccRiDBH6VBmIkYjGRxNSNxiAM+Annx6Uh24N1tmutmf8AzLDL4SUYOM+hNdxR1JNcP2wAtjT3we8l1d/iFeQw9Mj6V6FGBEzj681V5kqZeaqIz9KsDEHmAPSPoaTIJkcZ/f4qSoOJ/NSq0oH7xUQkcfzfTwwOnFWQagFz0McH+lAWEEDBzgimWBkHA8vEcVFakxUyRJ86ZHbIH04/P7FDHoRgfUfOpKIghuR9BSZ5xTlL5LaNoIEMTDCen4ikqwOpJ8Yx4YA9amkZkT9cGpOZMj9/bmmnXKoDxJA6xzFUqnWfp9q0Fc548qYWDg8jOMUh0oZMRJEjGY5Hj9/pSDfQ8wQR05Pj5VcxHXE8VSR5f1pjs1QR5j1weD3T4VHYQZK4x5T4QJz/AHq62duT8ic9I/JpPEDOR+IAxH7igle0E8x1P9Iqq9mpOM4+p5/vUdnl+/3+aWxpTtFOrVtMfCimNIKhEL4wfrS1JkEBSOk859ak4CgHJJxmq3kA5Oeh4rKtu0bCz5R4cn61osr1KyPM1nRa1BSsSQfEf3p4i1C++enoBx4Z9KxdpdnfxDWw7FbSZZAIDkRs3/5gMnb1raFLGRjPX06/KtbIij493WPPiqx3LuJutarG9sIFQBQo+EKIEDy6CrFUxgYpbSTujy9KYB5xjxpfJ7TAKrJCwerCePPmqUPUCKvOZJzVSsZ9fKnRDk80iB++Kko6THPNRGT9qVOGvH5qbuQQeSPH9fGmBAOeOoHXzqoDIFAjNr9F7626MPjUgz0JGD+Ks7LLizbV1hwoD8EEricdDE/OtaCMkEVFVnI4FP40V+6yIE/sUy8gcTTxtktBnAiqRcHESfGgljcdP1pInjHl41EryZ+VNFg858aDWBKTAjwIp9OaQufymImgj28VYAIiROTVfWIxUgooJIR61GPlTQ0mHWmXyFFMjpSApkUxS4iaqAg1oYrAHWlbxzS+QrHEUiPKrnEHFZ7nJ/NFKKxBPz+Q9KmBEE/LJpBM1NGjg0xYp3+UfWnWlU8Z+lFCXMBM5zFGsnAIj5zNOisvh0TsWVJ7oMQK1BTtEGQ0TPIJ8D8qVFVj0nLsrdoTEx+5qN1ixAjj70UUfAidm6QDgRUN1KiiktZABMyaghPIoopidJ3ySMmes1EIIkTRRRTPadpqu3MwaKKQ+F7SI8KQHMYFFFMJBZqET8qKKQWhZ4pMlKinCifSoKuRRRRTXM58KiD5UUU4ABUlniiiikkozVbNmiiiAhk04oooALUW1BYA0UU01Nk71VladFCYq206KKRv/9k=" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="data:image/jpeg;base64,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">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1611566788/attached_image/mengenal-habitat-dan-kebiasaan-nyamuk-demam-berdarah-agar-mudah-menanganinya.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-custom-icon" aria-hidden="true">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-custom-icon" aria-hidden="true">
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <?php if ($pakar_dbd_profil == "" and $pakar_dbd_profil_hasil == "") { ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12 text-center d-flex align-items-center justify-content-center">
                                        <div class="">
                                            <h2>Pakar Resiko Keberadaan Jentik</h2>
                                            <p class="lead mb-5">
                                                Seberapa besar resiko tempat penampungan air kamu di rumah menjadi tempat perkembangbiakan nyamuk.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?php echo $link ?>" method="POST">
                                        <div class="form-group">
                                            <label for="inputName">Nama</label>
                                            <input type="text" name="nama" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">E-Mail</label>
                                            <input type="email" name="email" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSubject">No Whatsapp</label>
                                            <input type="telepon" name="telepon" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSubject">Provinsi</label>
                                            <?php $sql_provinsi = $db->tampildata("provinces"); ?>
                                            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="provinsi" id="provinsi">
                                                <option></option>
                                                <?php
                                                while ($rs_provinsi = $sql_provinsi->fetch_array()) {
                                                    echo '<option value="' . $rs_provinsi['id'] . '">' . $rs_provinsi['name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <img src="file/gambar/loading.gif" width="35" id="load1" style="display:none;" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSubject">Kabupaten</label>
                                            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="kota" id="kota">
                                                <option></option>
                                            </select>
                                            <img src="file/gambar/loading.gif" width="35" id="load2" style="display:none;" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSubject">Kecamatan</label>
                                            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="kecamatan" id="kecamatan">
                                                <option></option>
                                            </select>
                                            <img src="file/gambar/loading.gif" width="35" id="load3" style="display:none;" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputMessage">Alamat</label>
                                            <textarea name="alamat" class="form-control" rows="4" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="profil" class="btn btn-primary" value="Lanjut Penilaian">
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                <?php } elseif ($pakar_dbd_profil != "" and $pakar_dbd_profil_hasil == "") { ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12 text-center d-flex align-items-center justify-content-center">
                                        <div class="">
                                            <h2>Profil</h2>
                                            <p class="lead mb-5">
                                                <?php
                                                $tampil = $db->tampildata3("tb_pengguna", "and idpengguna='$pakar_dbd_profil'")->fetch_array();
                                                ?>
                                                IP Address : <?php echo getClientIP() ?><br>
                                                Nama : <?php echo $tampil['nama']; ?><br>
                                                Email : <?php echo $tampil['email']; ?><br>
                                                No Whatsapp : <?php echo $tampil['telepon']; ?><br>
                                                Alamat : <?php echo $tampil['alamat']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?php echo $link ?>" method="POST">
                                        <div class="form-group">
                                            <label for="inputName">Sumber Air (x1)</label>
                                            <select class="custom-select form-control-border" id="exampleSelectBorder" name="x1" required>
                                                <option value="">--pilih--</option>
                                                <option value="F01">Non PDAM</option>
                                                <option value="F02">PDAM</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Warna TPA (x2)</label>
                                            <select class="custom-select form-control-border" id="exampleSelectBorder" name="x2" required>
                                                <option value="">--pilih--</option>
                                                <option value="F03">Gelap</option>
                                                <option value="F04">Terang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSubject">Letak TPA (x3)</label>
                                            <select class="custom-select form-control-border" id="exampleSelectBorder" name="x3" required>
                                                <option value="">--pilih--</option>
                                                <option value="F05">Diluar Rumah</option>
                                                <option value="F06">Didalam Rumah</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputMessage">Frekuensi Membersihkan TPA (x4)</label>
                                            <select class="custom-select form-control-border" id="exampleSelectBorder" name="x4" required>
                                                <option value="">--pilih--</option>
                                                <option value="F07">>7 Hari Sekali</option>
                                                <option value="F08">
                                                    <= 7 Hari Sekali</option> </select> </div> <div class="form-group">
                                                        <input type="submit" name="penilaian" class="btn btn-primary" value="Kirim Penilaian">
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                <?php } elseif ($pakar_dbd_profil != "" and $pakar_dbd_profil_hasil == "hasil") { ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12 text-center d-flex align-items-center justify-content-center">
                                        <div class="">
                                            <h2>Profil</h2>
                                            <p class="lead mb-5">
                                                <?php
                                                $tampil = $db->tampildata3("tb_pengguna", "and idpengguna='$pakar_dbd_profil'")->fetch_array();
                                                ?>
                                                IP Address : <?php echo getClientIP() ?><br>
                                                Nama : <?php echo $tampil['nama']; ?><br>
                                                Email : <?php echo $tampil['email']; ?><br>
                                                No Whatsapp : <?php echo $tampil['telepon']; ?><br>
                                                Alamat : <?php echo $tampil['alamat']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12 text-center d-flex align-items-center justify-content-center">
                                        <div class="">
                                            <h1>Hasil</h1>
                                            <h3>
                                                Hasil Prediksi, jentik Jentik Akan berkembang biak dirumah mu = <?php echo $tampil['hasil_mutu'] ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                <?php } ?>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->

        </div>

    </div>

</div>
<!-- /.content -->
<div class="content">

    <!-- Default box -->


    </d>
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