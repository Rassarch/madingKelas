<?php
    include("konfigurasi/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mading Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .masonry {
            column-count: 3;
            column-gap: 1rem;
        }
        .masonry-item {
            break-inside: avoid;
            background-color: #b1b1b1;
            border-radius: 20px;
            overflow: hidden;
        }
    </style>
</head>
<body>
    
    <h2 class="text-center text-bold mt-3">Mading Sekolah</h2>
    <div class="container mt-4">
        <div class="masonry"> 
            <?php
                $query = "SELECT * FROM konten ORDER BY tanggal DESC";
                $sql = mysqli_query($koneksi, $query);
                $konten = mysqli_fetch_all($sql, MYSQLI_ASSOC);
                foreach ($konten as $data):
            ?>
            <div class="masonry-item">
                <img src="img/<?= $data['gamar'] ?>" class="w-100">
                <div class="p-3">
                    <h5>Vincent Van Gogh</h5>
                    <h6>Sunflowers</h6>
                    <small>Koleksi lukisan bunga matahari ini adalah salah satu karya paling ikonik van Gogh. 
                        Dengan warna kuning yang cerah dan komposisi dinamis, lukisan ini melambangkan keindahan dan kehangatan, 
                        serta menggambarkan cinta van Gogh terhadap alam.</small> <br>
                    <small>1888</small>
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
