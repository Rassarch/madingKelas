<?php
session_start();
include('konfigurasi/koneksi.php');

// Ensure user session data is available
$user_profile_image = isset($_SESSION['user']['profile_image']) ? $_SESSION['user']['profile_image'] : 'default-profile.png';
$user_name = isset($_SESSION['user']['nama']) ? $_SESSION['user']['nama'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mading sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .masonry {
            column-count: 3;
            column-gap: 1rem;
        }

        .masonry-item {
            break-inside: avoid;
            background-color: #dcdcdc;
            border-radius: 5px;
            overflow: hidden;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .upload-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            border-radius: 50%;
            border: none;
            background-color: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .upload-btn svg {
            fill: #007bff;
        }

        .upload-btn:hover svg {
            fill: #0056b3;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand text-decoration-none" href="#">Mading Sekolah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="btn btn-light" href="upload.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 1a.5.5 0 0 1 .5.5V7h5.5a.5.5 0 0 1 0 1H8.5v5.5a.5.5 0 0 1-1 0V8H2a.5.5 0 0 1 0-1h5.5V1.5A.5.5 0 0 1 8 1z"/>
                            </svg>
                        </a>
                    </li>
                    <?php if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="uploads/<?= $user_profile_image ?>" class="profile-img" alt="Profile Image">
                            <?= $user_name ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-decoration-none" href="profile.php">Settings</a></li>
                            <li>
                                <form action="proses/proses-logout.php" method="post">
                                    <button class="dropdown-item text-decoration-none" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none" href="login.php">Login</a>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>    
    <div class="container mt-4">
        <div class="masonry">
            <?php
            $query = "SELECT * FROM konten ORDER BY tanggal DESC";
            $sql = mysqli_query($koneksi, $query);
            $konten = mysqli_fetch_all($sql, MYSQLI_ASSOC);
            foreach ($konten as $data):
            ?>
            <div class="masonry-item mb-2">
                <a href="ditel.php?id=<?= $data['id'] ?>" class="link-secondary link-underline-opacity-0 link-offset-0 text-decoration-none">
                    <img class="w-100" src="img/<?= $data['gambar']?>">
                    <div class="p-3">
                        <h4><?= $data['judul']?></h4>
                        <small><?= $data['tanggal']?></small>
                    </div>
                </a>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>
