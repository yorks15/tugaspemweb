<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="img/favicon.png">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css"
    integrity="sha384-nEnU7Ae+3lD52AK+RGNzgieBWMnEfgTbRHIwEvp1XXPdqdO6uLTd/NwXbzboqjc2" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <style>
    .form-control {
      background-color: #000; /* Hitam */
      color: #fff; /* Teks putih */
      border: 1px solid #444; /* Garis abu-abu */
    }

    .form-control::placeholder {
      color: #ccc; /* Placeholder abu-abu */
    }

    .form-control:focus {
      background-color: #000;
      color: #fff;
      border-color: #007bff; /* Warna biru saat fokus */
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
  </style>
  <title>Login Form</title>
</head>
<body class="bg-dark text-light">
  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card bg-dark shadow-lg" style="width: 400px;">
      <div class="card-header text-center border-light">
        <h3 class="card-title text-light"><i class="fas fa-user-circle"></i> Login</h3>
      </div>
      <div class="card-body">
        <?php
        // Menampilkan pesan error jika ada
        if(isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);  // Menghapus error setelah ditampilkan
        }
        ?>
        <form action="./backend/login.php" method="post">
          <div class="form-group">
            <label for="email" class="text-light"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="password" class="text-light"><i class="fas fa-lock"></i> Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password Anda" class="form-control" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Login</button>
        </form>
      </div>
      <div class="card-footer text-center border-light">
        <small class="text-light">Belum punya akun? <a href="register.php" class="text-primary">Daftar di sini</a></small>
      </div>
    </div>
  </div>
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>