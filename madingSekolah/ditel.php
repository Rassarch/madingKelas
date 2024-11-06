<?php
session_start();
include("konfigurasi/koneksi.php");

$id = $_GET['id'];
$query = "SELECT konten.*, user.nama FROM konten INNER JOIN user ON konten.user_id = user.id WHERE konten.id = $id";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($sql);

// Fetch comments
$query_comments = "SELECT komentar.*, user.nama FROM komentar INNER JOIN user ON komentar.user_id = user.id WHERE komentar.konten_id = $id ORDER BY komentar.tanggal DESC";
$sql_comments = mysqli_query($koneksi, $query_comments);
$komentar = mysqli_fetch_all($sql_comments, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        img {
            max-width: 100%;
            height: auto;
        }
        .content {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        .content h2 {
            margin-bottom: 20px;
        }
        .content small,
        .content h6,
        .content p {
            margin-top: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="content">
            <img class="w-100 h-auto mb-3" src="img/<?= $data['gambar'] ?>" alt="Mading Image">
            <h2><?= $data['judul'] ?></h2>
            <small class="text-muted"><?= $data['tanggal'] ?></small>
            <h6><?= $data['deskripsi'] ?></h6>
            <p>Ditulis oleh: <strong><?= $data['nama'] ?></strong></p>
            <a href="index.php" class="btn btn-primary">Kembali</a>

            <div id="input-komentar" class="container mt-2">
                <h5>Tambah Komentar</h5>
                <?php if (isset($_SESSION['user'])): ?>
                <form action="proses/proses-tambah-komentar.php" method="post">
                    <div class="input-group">
                        <input type="hidden" name="konten_id" value="<?= $_GET['id'] ?>">
                        <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
                        <input type="text" name="komentar" class="form-control" placeholder="Ayo di komen le..">
                        <button type="submit" class="btn btn-success">Komen</button>
                    </div>
                </form>
                <?php else: ?>
                <p>Kalo mau komen login dulu le...</p>
                <?php endif; ?>
            </div>

            <div id="list-komentar" class="container mt-3 mb-5">
                <?php foreach ($komentar as $komen): ?>
                <div class="data-komentar text-black border-bottom">
                    <h3 class="mb-0"><?= $komen['nama'] ?></h3>
                    <small><?= $komen['tanggal'] ?></small>
                    <p class="mb-0"><?= $komen['isi'] ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>
