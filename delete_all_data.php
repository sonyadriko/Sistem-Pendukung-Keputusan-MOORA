<?php
include 'koneksi.php'; // Include file koneksi.php untuk menghubungkan ke database

// Query untuk menghapus semua data dari tabel handphone
$sql = "TRUNCATE TABLE handphone";

if ($conn->query($sql) === TRUE) {
    // Jika penghapusan berhasil, kembalikan respons ke klien
    echo "All data deleted successfully";
} else {
    // Jika terjadi kesalahan, kembalikan pesan kesalahan ke klien
    echo "Error deleting data: " . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
