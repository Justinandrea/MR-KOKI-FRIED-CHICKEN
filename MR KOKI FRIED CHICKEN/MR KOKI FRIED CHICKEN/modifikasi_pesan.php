<?php
include 'koneksi.php';

// Ambil data dari database
$sql = "SELECT * FROM pemesanan";
$result = $conn->query($sql);

// Tambahkan logika untuk menyimpan data ke database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi data yang dikirim
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $nomor_hp = isset($_POST['nomor_hp']) ? $_POST['nomor_hp'] : '';
    $tanggal_pesan = isset($_POST['tanggal_pesan']) ? $_POST['tanggal_pesan'] : '';
    $kategori = isset($_POST['kategori']) ? implode(', ', $_POST['kategori']) : ''; // Mengubah array menjadi string
    $pelayanan = isset($_POST['pelayanan']) ? $_POST['pelayanan'] : '';
    $jumlah_menu = isset($_POST['jumlah_menu']) ? $_POST['jumlah_menu'] : 0;

    // Cek apakah kategori kosong
    if (empty($kategori)) {
        echo "Kategori tidak boleh kosong!";
        exit();
    }

    // Proses penyimpanan data ke database
    $sql_insert = "INSERT INTO pemesanan (nama, nomor_hp, tanggal_pesan, kategori, pelayanan, jumlah_menu)
                   VALUES ('$nama', '$nomor_hp', '$tanggal_pesan','$kategori', '$pelayanan', '$jumlah_menu')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Makan Dulu Yuk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.html">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link active" href="daftar_paket.php">Daftar Paket Wisata</a></li>
                    <li class="nav-item"><a class="nav-link" href="modifikasi_pesan.php">Modifikasi Pesanan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <h2 class="mb-4 text-center text-primary">Daftar Pesanan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Tanggal Pesan</th>
                    <th>Kategori</th>
                    <th>Daftar Menu</th>
                    <th>Jumlah Menu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['nama']}</td>
                            <td>{$row['nomor_hp']}</td>
                            <td>{$row['tanggal_pesan']}</td>
                            <td>{$row['kategori']}</td>
                            <td>{$row['pelayanan']}</td>
                            <td>{$row['jumlah_menu']}</td>
                            <td>
                                <a href='edit_pesanan.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='delete_pesanan.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
