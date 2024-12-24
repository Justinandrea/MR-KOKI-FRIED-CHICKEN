<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Paket Wisata</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .form-control:focus {
            border-color: #007bff; /* Warna border saat fokus */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Bayangan saat fokus */
        }
        .btn-primary {
            background-color: #0056b3; /* Warna tombol simpan */
            border-color: #0056b3; /* Warna border tombol simpan */
        }
        .btn-success {
            background-color: #28a745; /* Warna tombol hitung */
            border-color: #28a745; /* Warna border tombol hitung */
        }
        .btn-danger {
            background-color: #dc3545; /* Warna tombol reset */
            border-color: #dc3545; /* Warna border tombol reset */
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Wisata dulu kuy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="daftar_paket.php">Daftar Paket Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="modifikasi_pesan.php">Modifikasi Pesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-4">
   <h2 class="mb-4 text-center text-primary">Pilihan paket wisata</h2>
        <div class="row justify-content-center">
            <!-- Card 1 -->
            <div class="col-md-3 text-center">
                <div class="card mb-4 shadow">
                    <img src="images/bandung.jpg" class="card-img-top" alt="Paket Wisata 1">
                    <div class="card-body">
                        <h5 class="card-title">Paket Wisata 1</h5>
                        <p class="card-text">Termasuk layanan full.</p>
                        <a href="detail_paket.php" class="btn btn-primary">Detail Paket</a>
                        <a href="javascript:void(0);" onclick="pilihPaket('wisata1')" class="btn btn-success">Pilih Paket akan terisi otomatis</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-3 text-center">
                <div class="card mb-4 shadow">
                    <img src="images/bandung1.webp" class="card-img-top" alt="Paket Wisata 2">
                    <div class="card-body">
                        <h5 class="card-title">Paket Wisata 2</h5>
                        <p class="card-text">Deskripsi singkat paket wisata 2.</p>
                        <a href="javascript:void(0);" onclick="pilihPaket('wisata2')" class="btn btn-primary">Detail Paket</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-3 text-center">
                <div class="card mb-4 shadow">
                    <img src="images/bandung1.webp" class="card-img-top" alt="Paket Wisata 3">
                    <div class="card-body">
                        <h5 class="card-title">Paket Wisata 3</h5>
                        <p class="card-text">Deskripsi singkat paket wisata 3.</p>
                        <a href="javascript:void(0);" onclick="pilihPaket('wisata3')" class="btn btn-primary">Detail Paket</a>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-md-3 text-center">
                <div class="card mb-4 shadow">
                    <img src="images/bandung.jpg" class="card-img-top" alt="Paket Wisata 4">
                    <div class="card-body">
                        <h5 class="card-title">Paket Wisata 4</h5>
                        <p class="card-text">Deskripsi singkat paket wisata 4.</p>
                        <a href="javascript:void(0);" onclick="pilihPaket('wisata4')" class="btn btn-primary">Detail Paket</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Pemesanan -->
        <div class="container mt-5">
            <h2 class="mb-4 text-center text-primary">Form Pemesanan Paket Wisata</h2>
            <form action="proses_pemesanan.php" method="post" class="bg-light p-4 rounded shadow">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pemesan:</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="nomor_hp" class="form-label">Nomor HP/Telp:</label>
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_pesan" class="form-label">Tanggal Pesan:</label>
                    <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pesan" required>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori :</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kategori[]" value="Makanan Berat" id="Makanan Berat">
                        <label class="form-check-label" for="Makanan Berat">Makanan Berat </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kategori[]" value="Makanan Ringan" id="Makanan Ringan">
                        <label class="form-check-label" for="Makanan Ringan">Makanan Ringan </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kategori[]" value="Minuman" id="Minuman">
                        <label class="form-check-label" for="Minuman">Minuman </label>
                    </div>



                <div class="mb-3">
                    <label for="pelayanan" class="form-label">Daftar Menu :</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Paket Float Small" id="Paket Float Small">
                        <label class="form-check-label" for="Paket Float Small">Paket Float Small (Rp 37.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Nasi Goreng Chicken Nugget" id="Nasi Goreng Chicken Nugget">
                        <label class="form-check-label" for="Nasi Goreng Chicken Nugget">Nasi Goreng Chicken Nugget (Rp 24.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Nasi Goreng Telur Dadar" id="Nasi Goreng Telur Dadar">
                        <label class="form-check-label" for="Nasi Goreng Telur Dadar">Nasi Goreng Telur Dadar (Rp 24.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Nasi Goreng Telur Ceplok" id="Nasi Goreng Telur Ceplok">
                        <label class="form-check-label" for="Nasi Goreng Telur Ceplok">Nasi Goreng Telur Ceplok (Rp 24.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Nasi Goreng Ayam Paha Bawah" id="Nasi Goreng Ayam Paha Bawah">
                        <label class="form-check-label" for="Nasi Goreng Ayam Paha Bawah">Nasi Goreng Ayam Paha Bawah (Rp 31.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Rice Box Barbeque" id="Rice Box Barbeque">
                        <label class="form-check-label" for="Rice Box Barbeque">Rice Box Barbeque (Rp 23.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Rice Box Teriyaki" id="Rice Box Teriyaki">
                        <label class="form-check-label" for="Rice Box Teriyaki">Rice Box Teriyaki (Rp 23.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Rice Box Geprek Original" id="Rice Box Geprek Original">
                        <label class="form-check-label" for="Rice Box Geprek Original">Rice Box Geprek Original (Rp 31.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Sop Ayam" id="Sop Ayam">
                        <label class="form-check-label" for="Sop Ayam">Sop Ayam (Rp 10.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Chicken Nugget" id="Chicken Nugget">
                        <label class="form-check-label" for="Chicken Nugget">Chicken Nugget (Rp 23.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Fish Nugget" id="Fish Nugget">
                        <label class="form-check-label" for="Fish Nugget">Fish Nugget (Rp 23.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Spagheti Pasta" id="Spagheti Pasta">
                        <label class="form-check-label" for="Spagheti Pasta">Spagheti Pasta (Rp 24.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Chicken Keju Burger" id="Chicken Keju Burger">
                        <label class="form-check-label" for="Chicken Keju Burger">Chicken Keju Burger (Rp 27.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Beef Burger" id="Beef Burger">
                        <label class="form-check-label" for="Beef Burger">Beef Burger (Rp 23.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Egg Burger" id="Egg Burger">
                        <label class="form-check-label" for="Egg Burger">Egg Burger (Rp 18.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Mocca Float" id="Mocca Float">
                        <label class="form-check-label" for="Mocca Float">Mocca Float (Rp 18.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Coklat Float" id="Coklat Float">
                        <label class="form-check-label" for="Coklat Float">Coklat Float (Rp 24.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Es Tarik Cincau" id="Es Tarik Cincau">
                        <label class="form-check-label" for="Es Tarik Cincau">Es Tarik Cincau (Rp 10.000)</label>
                    </div>
                <div class="mb-3">
                    <label for="jumlah_menu" class="form-label">Jumlah Menu:</label>
                    <input type="number" class="form-control" id="jumlah_menu" name="jumlah_menu" required>
                </div>
               
                <button type="submit" class="btn btn-primary">Simpan</button>

<script>
    function hitungTotal() {
        const menuPrices = {
            "Paket Float Small": 37000,
            "Nasi Goreng Chicken Nugget": 24000,
            "Nasi Goreng Telur Dadar": 24000,
            "Nasi Goreng Telur Ceplok": 24000,
            "Nasi Goreng Ayam Paha Bawah": 31000,
            "Rice Box Barbeque": 23000,
            "Rice Box Teriyaki": 23000,
            "Rice Box Geprek Original": 31000,
            "Sop Ayam": 10000,
            "Chicken Nugget": 23000,
            "Fish Nugget": 23000,
            "Spagheti Pasta": 24000,
            "Chicken Keju Burger": 27000,
            "Beef Burger": 23000,
            "Egg Burger": 18000,
            "Mocca Float": 18000,
            "Coklat Float": 24000,
            "Es Tarik Cincau": 10000
        };

       
}

</script>
