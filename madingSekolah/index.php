<?php
session_start();
include('konfigurasi/koneksi.php')
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
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-3">
                <?php
                if (isset($_SESSION['user'])) :                            
                ?>
                <form action="proses/proses-logout.php" method="post">
                    <button class="btn btn-danger">Logout</button>
                </form>
                <?php
                endif
                ?>
            </div>
            <div class="col-md-6">
                <h2 class="text-center">Mading Kucing</h2>
            </div>
            <div class="col-md-3 text-end">
                <a href="upload.php" class="btn btn-primary">Upload Mading</a>
            </div>
        </div>
    </div>    
    <div class="container mt-4">
        <div class="masonry">
            <?php
            $query = "SELECT * FROM konten ORDER BY tanggal DESC";
            $sql = mysqli_query($koneksi, $query);
            $konten = mysqli_fetch_all($sql, MYSQLI_ASSOC);
            foreach ($konten as $data):
            ?>
            <div class="masonry-item mb-2">
                <img class="w-100"  src="gambar/<?= $data['gambar']?>">
                <div class="p-3">
                    <h4><?= $data['judul']?></h4>
                    <small><?= $data['tanggal']?></small>
                    <h6><?= $data['deskripsi']?></h6>
                </div>
            </div>
            <?php
            endforeach
            ?>            
        </div>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>
