<?php
    include "../konfigurasi/koneksi.php";
    
    // mengambil data dari input
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    // cek apakah password dikonfirmasi
    if ($password != $konfirmasi_password) {
        die("Password nya ga sama le...");
    }

    // enkripsi password terlebih dahulu
    $password_enkripsi = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user(nama, email, level, password) VALUES('$nama', '$email', 'siswa', '$password_enkripsi')";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {

        header('location: ../login.php');
    }

?>
