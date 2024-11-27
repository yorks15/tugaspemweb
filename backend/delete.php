<?php
require './../config/db.php';

if (isset($_GET['id'])) {
    global $db_connect;

    $id = $_GET['id'];

    // Cari data produk berdasarkan ID
    $stmt = $db_connect->prepare("SELECT image FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imagePath);
    $stmt->fetch();
    $stmt->close();

    if ($imagePath) {
        // Lokasi file gambar
        $absoluteImagePath = $_SERVER['DOCUMENT_ROOT'] . $imagePath;

        // Debugging: tampilkan path file
        echo "Path file: " . $absoluteImagePath . "<br>";

        // Hapus file gambar jika ada
        if (file_exists($absoluteImagePath)) {
            if (unlink($absoluteImagePath)) {
                echo "File berhasil dihapus: " . $absoluteImagePath . "<br>";
            } else {
                echo "Gagal menghapus file: " . $absoluteImagePath . "<br>";
            }
        } else {
            echo "File tidak ditemukan: " . $absoluteImagePath . "<br>";
        }
    }

    // Hapus data dari database
    $stmt = $db_connect->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Data berhasil dihapus.";
        header("Location: show.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID produk tidak ditemukan.";
}
?>