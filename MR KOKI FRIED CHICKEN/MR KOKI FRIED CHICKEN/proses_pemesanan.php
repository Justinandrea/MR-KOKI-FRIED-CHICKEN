<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pemesanan";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$nomor_hp = isset($_POST['nomor_hp']) ? $_POST['nomor_hp'] : '';
$tanggal_pesan = isset($_POST['tanggal_pesan']) ? $_POST['tanggal_pesan'] : '';
$kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
$pelayanan = isset($_POST['pelayanan']) ? implode(', ', (array)$_POST['pelayanan']) : '';
$jumlah_menu = isset($_POST['jumlah_menu']) ? $_POST['jumlah_menu'] : 0;

// Debugging: Cek nilai sebelum menyimpan
echo "Nama: $nama <br>";
echo "Nomor HP: $nomor_hp <br>";
echo "Tanggal Pesan: $tanggal_pesan <br>";
echo "Kategori: $kategori <br>";
echo "Pelayanan: $pelayanan <br>";
echo "Jumlah Menu: $jumlah_menu <br>";

// Validasi data sebelum menyimpan
if (!empty($nama) && !empty($nomor_hp) && !empty($tanggal_pesan) && $jumlah_menu > 0) {
    // Siapkan query untuk mencegah SQL injection
    $stmt = $conn->prepare("INSERT INTO pemesanan (nama, nomor_hp, tanggal_pesan, kategori, pelayanan, jumlah_menu) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $nama, $nomor_hp, $tanggal_pesan, $kategori, $pelayanan, $jumlah_menu);
    
    if ($stmt->execute()) {
        echo "Pemesanan berhasil disimpan.";
        header("Location: modifikasi_pesan.php");
        exit();
    } else {
        echo "Error: " . $stmt->error; // Tampilkan error jika ada
    }

    // Tutup statement
    $stmt->close();
} else {
    echo "Data tidak valid. Pastikan semua data telah diisi dengan benar.";
}

$conn->close();
?>
