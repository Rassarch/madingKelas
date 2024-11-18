<?php
session_start();
include('../konfigurasi/koneksi.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user']['id'];

    if (isset($_POST['update_profile'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Update query
        $update_query = "UPDATE user SET nama='$name', email='$email' WHERE id=$user_id";
        if (mysqli_query($koneksi, $update_query)) {
            $_SESSION['user']['nama'] = $name;
            $_SESSION['user']['email'] = $email;
            $_SESSION['success_message'] = "Profile updated successfully!";
        } else {
            $_SESSION['error_message'] = "Error updating profile: " . mysqli_error($koneksi);
        }

    } elseif (isset($_FILES['profile_image'])) {
        $image_name = $_FILES['profile_image']['name'];
        $image_tmp = $_FILES['profile_image']['tmp_name'];
        $upload_dir = "../uploads/";

        // Move the uploaded file to the server
        if (move_uploaded_file($image_tmp, $upload_dir . $image_name)) {
            // Update the user's profile image in the database
            $image_query = "UPDATE user SET profile_image='$image_name' WHERE id=$user_id";
            if (mysqli_query($koneksi, $image_query)) {
                $_SESSION['user']['profile_image'] = $image_name;
                $_SESSION['success_message'] = "Profile image updated successfully!";
            } else {
                $_SESSION['error_message'] = "Error updating profile image: " . mysqli_error($koneksi);
            }
        } else {
            $_SESSION['error_message'] = "Error uploading the image.";
        }
    }

    // Redirect back to the profile page
    header('Location: ../profile.php');
    exit();
}
?>
