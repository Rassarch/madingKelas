<?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "mading_sekolah";

    $koneksi = mysqli_connect($hostname, $username, $password, $database);

    // Cek koneksi
    if (!$koneksi) {
        die("Koneksi gagal le...");
    }

?>