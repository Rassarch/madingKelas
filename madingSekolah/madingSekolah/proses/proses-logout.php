<?php
    session_start();
   
    // Logika untuk menghapus semua session yang ada
    session_destroy();
    header('location: ../login.php');

?>