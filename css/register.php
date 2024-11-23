<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link rel="icon" type="image/png" href="img/favicon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css"
    integrity="sha384-nEnU7Ae+3lD52AK+RGNzgieBWMnEfgTbRHIwEvp1XXPdqdO6uLTd/NwXbzboqjc2" crossorigin="anonymous">
    <title>Register Form</title>
</head>
<body>
    <h1 class="text-center mt-5">Register</h1>
    <form action="./backend/register.php" method="post" class="container mt-5">
        <div class="form-group">
            <input type="text" name="name" placeholder="Masukkan nama anda" class="form-control mb-3" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Masukkan email anda" class="form-control mb-3" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Masukkan password anda" class="form-control mb-3" required>
        </div>
        <div class="form-group">
            <input type="password" name="confirm" placeholder="Masukkan konfirmasi password anda" class="form-control mb-3" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
        <p class="text-center mt-3">Sudah punya akun? <a href="index.php">Login disini</a></p>
    </form>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>