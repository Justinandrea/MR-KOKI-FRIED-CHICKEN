<?php
include 'koneksi.php';

$id = $_GET['id'];

$sql_delete = "DELETE FROM pemesanan WHERE id='$id'";
if ($conn->query($sql_delete) === TRUE) {
    echo "<script>
            alert('Pesanan berhasil dihapus.');
            window.location.href = 'modifikasi_pesan.php';
          </script>";
} else {
    echo "<script>
            alert('Error: " . $conn->error . "');
            window.location.href = 'modifikasi_pesan.php';
          </script>";
}

$conn->close();
?>
