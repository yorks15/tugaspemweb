<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: login.php");  // Mengarahkan ke halaman login jika tidak ada session user
    exit();
}

$userName = $_SESSION['user']['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Link to external CSS -->
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="profile-card text-center">
                    <img src="https://via.placeholder.com/120" alt="Admin Profile Picture" class="img-fluid rounded-circle mb-4">
                    <h1>Selamat Datang, <?php echo htmlspecialchars($userName); ?>!</h1>
                    <p class="lead">Anda memiliki akses penuh ke sistem ini.</p>
                    <div class="mt-4">
                        <a href="show.php" class="btn btn-custom">
                            <i class="fas fa-tachometer-alt"></i> PRODUK
                        </a>
                        <a href="./backend/logout.php" class="btn btn-outline-danger ml-2">
                            <i class="fas fa-sign-out-alt"></i> Keluar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>