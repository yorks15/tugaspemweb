<?php
// Mulai session untuk mengakses data session
session_start();

// Menghancurkan semua session yang ada
session_destroy();

// Menghapus session yang berhubungan dengan pengguna
unset($_SESSION['user']);

// Redirect pengguna ke halaman login setelah logout
header("Location: ./../index.php");
exit();
?>