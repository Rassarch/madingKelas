<?php
session_start();
include('konfigurasi/koneksi.php');

// Get user data
$user_id = $_SESSION['user']['id'];
$query = "SELECT * FROM user WHERE id = $user_id";
$result = mysqli_query($koneksi, $query);
$user = mysqli_fetch_assoc($result);

// Get user's mading history
$mading_query = "SELECT * FROM konten WHERE user_id = $user_id ORDER BY tanggal DESC";
$mading_result = mysqli_query($koneksi, $mading_query);
$mading_history = mysqli_fetch_all($mading_result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.0/main.min.css" rel="stylesheet">
    <style>
        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .calendar {
            max-width: 1100px;
            margin: 0 auto;
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <a href="index.php" class="text-decoration-none">
            <h1 class="text-center text-black">User Profile</h1>
        </a>


        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['success_message']; ?>
                <?php unset($_SESSION['success_message']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error_message']; ?>
                <?php unset($_SESSION['error_message']); ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-4 text-center">
                <img src="uploads/<?= $_SESSION['user']['profile_image'] ?>" class="profile-image mb-3" alt="Profile Image">
                <form action="proses/proses-edit-profile.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="profile_image" class="form-control mb-2">
                    <button type="submit" class="btn btn-primary">Upload New Photo</button>
                </form>
            </div>
            <div class="col-md-8">
                <form action="proses/proses-edit-profile.php" method="post">
                    <input type="hidden" name="update_profile">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?= $user['nama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>">
                    </div>
                    <button type="submit" class="btn btn-success">Update Profile</button>
                </form>
            </div>
        </div>

        <h2 class="mt-5">Your Mading History</h2>
        <ul class="list-group">
            <?php foreach ($mading_history as $mading): ?>
                <li class="list-group-item">
                    <h5><?= $mading['judul'] ?></h5>
                    <p><?= $mading['deskripsi'] ?></p>
                    <small><?= $mading['tanggal'] ?></small>
                </li>
            <?php endforeach; ?>
        </ul>

        <h2 class="mt-5">Mading Upload Calendar</h2>
        <div id="calendar" class="calendar"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.0/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [ 
                    <?php foreach ($mading_history as $index => $mading): ?> 
                        { title: 'Mading Uploaded', start: '<?= $mading['tanggal'] ?>' }
                        <?php if ($index < count($mading_history) - 1) echo ','; ?> 
                        <?php endforeach; ?> 
                    ]
            });
            calendar.render();
        });
    </script>
</body>
</html>
