<?php
require './../config/db.php';

// Mendapatkan ID produk dari parameter URL
$id = $_GET['id'];

// Ambil data produk berdasarkan ID
$product = mysqli_query($db_connect, "SELECT * FROM products WHERE id = $id");
$row = mysqli_fetch_assoc($product);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    
    // Handle file upload
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../uploads/";
        
        // Generate unique filename
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $new_filename = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_filename;
        
        // Create uploads directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        // Delete old image if exists and is in uploads folder
        if($row['image'] && strpos($row['image'], 'uploads/') !== false) {
            if(file_exists($row['image'])) {
                unlink($row['image']);
            }
        }
        
        // Upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;
        } else {
            $image = $row['image']; // Keep existing image if upload fails
        }
    } else {
        $image = $row['image']; // Keep existing image if no new file
    }

    // Update data produk
    mysqli_query($db_connect, "UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id");

    // Redirect ke halaman data produk
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        <h2 class="text-center mb-0"><i class="fas fa-edit"></i> Edit Produk</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><i class="fas fa-box"></i> Nama Produk:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $row['name']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="price"><i class="fas fa-tag"></i> Harga:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="price" name="price" value="<?= $row['price']; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image"><i class="fas fa-image"></i> Pilih Gambar:</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                                <?php if($row['image']): ?>
                                    <div class="mt-2">
                                        <p>Gambar saat ini:</p>
                                        <img src="<?= $row['image']; ?>" alt="Current product image" style="max-width: 200px;">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" name="update" class="btn btn-warning btn-lg">
                                    <i class="fas fa-save"></i> Update
                                </button>
                                <a href="index.php" class="btn btn-secondary btn-lg ml-2">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>