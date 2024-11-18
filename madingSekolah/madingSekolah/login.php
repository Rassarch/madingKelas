<?php
    session_start(); // untuk menjalankan sesi
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Mading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card mt-4">
                <div class="card-body">
                <h2 class="text-black text-center">
                    LOGIN
                </h2>
                <form action="proses/proses-login.php" method="post">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">

                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password">

                    <button class="btn btn-primary mt-4">Login</button>
                </form>

                <a href="register.php">Don’t have an account? Sign Up</a>

                <?php
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error']; // memanggil session
                        unset($_SESSION['error']);
                    }
                ?>

                </div>
            </div>
        </div>
    </div>

</body>
</html>