<?php
    include('../konfigurasi/koneksi.php');
    include('../konfigurasi/cek-login.php');

    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

        // Khusus untuk gambar
    $nama_gambar = time().$_FILES['gambar']['name'];
    $tmp_gambar = $_FILES['gambar']['tmp_name'];
    $direktori = "../img/";
    
    $user_id = $user['id'];

    // Upload gambar ke direktori
    $upload  = move_uploaded_file($tmp_gambar, $direktori.$nama_gambar);

    if ($upload) {
        // Jika gambar sudah terupload
        $query = "INSERT INTO konten(user_id, judul, tanggal, deskripsi, gambar) VALUES('$user_id', '$judul', '$tanggal', '$deskripsi', '$nama_gambar')";
        $sql = mysqli_query($koneksi, $query);

        if ($sql) {
            echo "Mading mu berhasil di tambahin le..";
            header('location: ../index.php');
        }
    }
?>