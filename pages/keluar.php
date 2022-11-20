<?php
include '../config/koneksi.php';

unset($_SESSION['pakar_dbd_profil']);

header("location:$link_web");
