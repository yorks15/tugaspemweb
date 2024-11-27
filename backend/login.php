<?php
if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email == 'admin@admin.com' && $password == 'admin') {
        // Admin login
        header('location: ./../dashboard.php');
    } elseif($email != '' && $password != '') {
        // User login (any non-empty email and password)
        header('location: ./../user_dashboard.php');
    } else {
        // Empty email or password
        echo "<script>alert('Email dan password harus diisi!'); window.location.href='../index.php';</script>";
    }
} else {
    // Email or password not set
    echo "<script>alert('Silakan isi email dan password!'); window.location.href='../index.php';</script>";
}
?>