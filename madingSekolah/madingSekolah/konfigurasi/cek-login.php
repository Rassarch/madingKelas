<?php
    
    session_start();    

    if (isset($_SESSION['user'])) {
        // Berarti sudah login
        $user = $_SESSION['user'];
    } else {
        // Berarti belum login
        echo "Login dulu le..";
        echo "<a href='../madingSekolah/login.php'>Klik disini buat login le..</a>";
        exit(); // untuk menghentikan eksekusi kode php
    }

?>