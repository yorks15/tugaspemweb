<?php

require './../config/db.php';

if (isset($_POST['submit'])) {
    global $db_connect;

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];
   
    // Membuat nama file unik
    $randomFilename = time() . '-' . md5(rand()) . '-' . $image;

    // Membuat folder "uploads" jika belum ada
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Membuat folder uploads di dalam direktori backend juga
    $backendUploadsDir = __DIR__ . '/uploads';
    if (!is_dir($backendUploadsDir)) {
        mkdir($backendUploadsDir, 0777, true);
    }

    // Lokasi upload file untuk kedua direktori
    $uploadPath = $uploadDir . '/' . $randomFilename;
    $backendUploadPath = $backendUploadsDir . '/' . $randomFilename;

    // Proses upload file ke kedua lokasi
    $upload = move_uploaded_file($tempImage, $uploadPath);
    if ($upload) {
        // Copy file ke folder backend/uploads
        copy($uploadPath, $backendUploadPath);

        // Menggunakan prepared statement untuk keamanan
        $stmt = $db_connect->prepare("INSERT INTO products (name, price, image) VALUES (?, ?, ?)");
        $imagePath = '/uploads/' . $randomFilename;
        $stmt->bind_param("sss", $name, $price, $imagePath);

        if ($stmt->execute()) {
            echo "Berhasil upload dan menyimpan ke database.";
            header("Location: show.php");
            exit();
        } else {
            echo "Gagal menyimpan ke database: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Gagal upload file.";
    }
}
?>