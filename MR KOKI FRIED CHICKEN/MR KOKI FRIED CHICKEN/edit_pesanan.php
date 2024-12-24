<?php
include 'koneksi.php';

// Mendapatkan ID dari parameter URL
$id = $_GET['id'];
$sql = "SELECT * FROM pemesanan WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Memecah data 'pelayanan' menjadi array untuk checkbox
$pelayanan_sebelumnya = explode(', ', $row['pelayanan']);

// Menangani form submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $pelayanan = implode(', ', $_POST['pelayanan']);
    // Menambahkan waktu perjalanan jika diperlukan
    $waktu_perjalanan = $_POST['waktu_perjalanan'];

    // Update data ke database
    $sql_update = "UPDATE pemesanan SET 
        nama='$nama', 
        nomor_hp='$nomor_hp', 
        jumlah_peserta='$jumlah_peserta', 
        waktu_perjalanan='$waktu_perjalanan', 
        pelayanan='$pelayanan'
        WHERE id=$id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Data berhasil diperbarui.";
        header("Location: modifikasi_pesan.php");
        exit();
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Wisata Dulu Kuy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="daftar_paket.php">Daftar Paket Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="modifikasi_pesan.php">Modifikasi Pesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Form Edit Pesanan -->
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
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
