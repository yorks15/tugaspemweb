<?php
require './../config/db.php';

if(isset($_POST['submit'])) {

    global $db_connect;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    // Cek apakah password dan konfirmasi password cocok
    if($confirm != $password) {
        echo "Password tidak sesuai dengan konfirmasi password";
        die;
    }

    // Cek apakah email sudah terdaftar
    $usedEmail = mysqli_query($db_connect,"SELECT email FROM users WHERE email = '$email'");
    if(mysqli_num_rows($usedEmail) > 0) {
        echo "Email sudah digunakan";
        die;
    }

    // Hash password sebelum menyimpan ke database
    $password = password_hash($password, PASSWORD_DEFAULT);
    $created_at = date('Y-m-d H:i:s', time());
    
    // Insert data user ke database
    $users = mysqli_query($db_connect,"INSERT INTO users (name, email, password, created_at) 
                            VALUES ('$name', '$email', '$password', '$created_at')");

    // Jika registrasi berhasil, tampilkan pesan sukses dan arahkan ke index.php
    if ($users) {
        echo "<script>
                alert('Registrasi berhasil!');
                window.location.href = '../index.php';  // Arahkan ke index.php di luar folder
              </script>";
    } else {
        echo "Terjadi kesalahan, silakan coba lagi.";
    }
}
?>