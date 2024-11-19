<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.0/main.min.css" rel="stylesheet">
    <style>
        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .bento-card {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .bento-card h3 {
            margin-bottom: 10px;
        }
        .calendar {
            max-width: 100%;
            margin: 0 auto;
        }
        .dashboard-header {
            background: #007bff;
            color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        /* New card section for profile */
        .profile-card {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-card .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="dashboard-header text-center">
            <h1>Halo, <?= $user['nama'] ?>!</h1>
            <p>Welcome to your personal dashboard</p>
        </div>

        <!-- Bento Cards Section -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="bento-card">
                    <h3>Total Mading</h3>
                    <p class="display-4"><?= $total_mading ?></p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="bento-card">
                    <h3>Total Komentar</h3>
                    <p class="display-4"><?= $total_comments ?></p>
                </div>
            </div>
            <!-- Profile Card Section -->
            <div class="col-md-4 mb-4">
                <div class="profile-card">
                    <h3>Profile Information</h3>
                    <div class="text-center mb-3">
                        <img src="uploads/<?= $_SESSION['user']['profile_image'] ?>" class="profile-image" alt="Profile Image">
                    </div>
                    <form action="proses/proses-edit-profile.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="profile_image" class="form-control mb-2">
                        <button type="submit" class="btn btn-primary btn-block">Upload New Photo</button>
                    </form>
                    <form action="proses/proses-edit-profile.php" method="post" class="mt-3">
                        <input type="hidden" name="update_profile">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="<?= $user['nama'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>">
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Mading Upload Calendar Section -->
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
                    <?php 
                    $events = [];
                    foreach ($mading_history as $mading) {
                        $backgroundColor = (date('Y-m-d') === $mading['tanggal']) ? '#28a745' : '#007bff';
                        $events[] = "{ 
                            title: 'Mading Uploaded', 
                            start: '{$mading['tanggal']}', 
                            backgroundColor: '{$backgroundColor}', 
                            borderColor: '{$backgroundColor}' 
                        }";
                    }
                    echo implode(',', $events); 
                    ?>
                ]
            });
            calendar.render();
        });
    </script>
</body>
</html>
