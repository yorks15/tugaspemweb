<?php
// Mulai session untuk menyimpan informasi pengguna
session_start();

// Masukkan koneksi ke database
require './../config/db.php';  // Pastikan path sesuai dengan file db.php Anda

if(isset($_POST['submit'])) {
    // Ambil data dari form
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $password = mysqli_real_escape_string($db_connect, $_POST['password']);

    // Query untuk mengambil user dengan email yang sesuai
    $user = mysqli_query($db_connect, "SELECT * FROM users WHERE email = '$email'");

    if(mysqli_num_rows($user) > 0) {
        // Jika user ditemukan
        $data = mysqli_fetch_assoc($user);

        // Verifikasi password yang dimasukkan dengan hash password yang ada di database
        if(password_verify($password, $data['password'])) {
            // Jika password benar, simpan data user di session
            $_SESSION['user'] = [
                'id' => $data['id'],
                'name' => $data['name'],
                'email' => $data['email']
            ];

            // Redirect ke halaman profil setelah login sukses
            header("Location: ../dashboard.php");
            exit();
        } else {
            // Jika password salah
            $_SESSION['error'] = 'Password salah!';
            header("Location: ../index.php");
            exit();
        }
    } else {
        // Jika email tidak ditemukan
        $_SESSION['error'] = 'Email tidak ditemukan!';
        header("Location: ../index.php");
        exit();
    }
}
?>