<?php
    
    include('konfigurasi/cek-login.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Upload Content</h1>
                <h2 class="text-center mb-4">Halo, <?= $user['nama'] ?></h2>
                <p class="text-center">Silahkan isi formulir dibawah untuk mendaftar ke mading sekolah</p>
                <form action="proses/proses-upload.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="judul" class="form-label">judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Masukkan judul gambar">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">gambar</label>
                        <input type="file" class="form-control" name="gambar" placeholder="Masukkan gambar anda" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">deskripsi</label>
                        <input type="textarea" class="form-control" name="deskripsi" placeholder="Masukkan deskripsi gambar">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" placeholder="Masukkan Tanggal">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>