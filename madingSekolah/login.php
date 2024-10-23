<?php
    session_start(); // untuk menjalankan sesi
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Mading</title>
</head>
<body>
    
    <h1>Login Mading</h1>

    <form action="proses/proses-login.php" method="post">
        <input type="email" name="email" placeholder="Enter your email"> <br>
        <input type="password" name="password" placeholder="Enter your password"> <br>

        <button>Login</button>
    </form>

    <a href="daftar.php">Don’t have an account? Sign Up</a>

    <?php
        if (isset($_SESSION['error'])) {
            echo $_SESSION['error']; // memanggil session
            unset($_SESSION['error']);
        }
    ?>

</body>
</html>