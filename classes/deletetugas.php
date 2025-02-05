<?php
session_start();
include "koneksi.php";

// Pastikan session aktif dan role adalah guru
if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'guru') {
    echo "<script>
            alert('Akses ditolak! Silahkan login sebagai guru.');
            window.location.href = '../../index.php';
          </script>";
    exit;
}

// Ambil data dari form dan lakukan validasi
$id_tugas = isset($_POST['id_tugas']) ? intval($_POST['id_tugas']) : 0; // Pastikan $id_tugas adalah angka
$id_user = $_SESSION['id_user']; // Ambil user_id dari session aktif

// Gunakan prepared statement untuk keamanan
$stmt = $koneksi->prepare("DELETE FROM tugas WHERE id_tugas = ?");
$stmt->bind_param("i", $id_tugas); // 'i' karena id_tugas adalah integer

if ($stmt->execute()) {
    echo "<script>
            alert('Tugas berhasil dihapus!');
            window.location.href = '../pages/guru/dashboard_guru.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus tugas: {$stmt->error}');
            window.history.back();
          </script>";
}

$stmt->close();
$koneksi->close();
?>
