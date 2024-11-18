<?php
    include("../konfigurasi/cek-login.php");
    include("../konfigurasi/koneksi.php");

    $user_id = $user['id']; // mengambil data user di cek-login
    $konten_id = $_POST['konten_id']; // mengambil data di from
    $tanggal = date('Y-m-d'); // mengambil tanggal sekarang
    $waktu = date('H:i:s'); //mengambil waktu sekarang
    $isi = $_POST['komentar']; // mengambil isi dari komentar

    $query = "INSERT INTO komentar(user_id, konten_id, tanggal, waktu, isi) VALUES ('$user_id', '$konten_id', '$tanggal', '$waktu', '$isi')";
    $sql = mysqli_query($koneksi, $query);

    header("location: ../ditel.php?id=$konten_id");
?>