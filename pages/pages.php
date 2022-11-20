<?php
if (@$_SESSION['pakardbd_user'] == "") {
    if ($req2 == "") {
        include 'pages/home.php';
    } elseif ($req2 == "masuk") {
        include 'pages/masuk.php';
    } else {
        include 'pages/404.php';
    }
} elseif (@$_SESSION['pakardbd_user'] != "") {
    if ($req2 == "") {
        include 'pages/home.php';
    } elseif ($req2 == "home") {
        include 'pages/tabel_urutan.php';
    } else {
        include 'pages/404.php';
    }
}
