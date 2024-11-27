<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link rel="icon" type="image/png" href="img/favicon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css"
    integrity="sha384-nEnU7Ae+3lD52AK+RGNzgieBWMnEfgTbRHIwEvp1XXPdqdO6uLTd/NwXbzboqjc2" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Input stok</title>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card bg-dark text-white">
          <div class="card-header text-center">
            <h1 class="display-4"><i class="fas fa-box-open"></i> Tambah Produk</h1>
          </div>
          <div class="card-body">
            <a href="show.php" class="btn btn-info mb-4">
              <i class="fas fa-list"></i> Lihat data produk
            </a>
            <form action="./backend/create.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name"><i class="fas fa-tag"></i> Nama Produk</label>
                <input type="text" name="name" id="name" placeholder="Masukkan nama produk" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="price"><i class="fas fa-dollar-sign"></i> Harga Produk</label>
                <input type="number" name="price" id="price" placeholder="Masukkan harga produk" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="image"><i class="fas fa-image"></i> Gambar Produk</label>
                <input type="file" name="image" id="image" class="form-control-file" required>
              </div>
              <button type="submit" name="submit" class="btn btn-primary btn-block">
                <i class="fas fa-save"></i> Simpan
              </button>
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