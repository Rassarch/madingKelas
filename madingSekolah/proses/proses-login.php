<?php
    // untuk memanggil session agar bisa dijalankan
    session_start();

    // hubungkan database via koneksi.php
    include "../konfigurasi/koneksi.php";

    // mengambil data dari input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // cek apakah ada user dengan email yang di input
    $query = "SELECT * FROM user WHERE email = '$email'";
    $sql = mysqli_query($koneksi, $query);  // menjalankan query
    $user = mysqli_fetch_assoc($sql); // mendapatkan data user

    if ($user) {
        // berarti ada usernya
        $cek_password = password_verify($password, $user['password']);
        if ($cek_password) {
            echo "Mantap le...";
            $_SESSION['user'] = $user; // menyimpan user di session
        } else {
            // tidak ada user
            $_SESSION['error'] = "Password mu salah le...";
            header('location: ../login.php');
        }
    } else {
        // tidak ada user
        $_SESSION['error'] = "Akunmu ga ditemukan le...";
        header('location: ../login.php');
    }

?>