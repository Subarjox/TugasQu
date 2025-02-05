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
$id_tugas = isset($_POST['id_tugas']) ? trim($_POST['id_tugas']) : '';
$judul = isset($_POST['judul']) ? trim($_POST['judul']) : '';
$deskripsi = isset($_POST['deskripsi']) ? trim($_POST['deskripsi']) : '';
$batas_waktu = isset($_POST['batas_waktu']) ? trim($_POST['batas_waktu']) : '';
$status = isset($_POST['status']) ? trim($_POST['status']) : '';


$id_user = $_SESSION['id_user']; // Ambil user_id dari session aktif

if ($id_tugas === '' || $judul === '' || $deskripsi === '' || $batas_waktu === '' || $status === '') {
    echo "<script>
            alert('Semua data harus diisi!');
            window.history.back();
          </script>";
    exit;
}

// Gunakan prepared statement untuk keamanan
$stmt = $koneksi->prepare("UPDATE tugas SET judul = ?, deskripsi = ?, batas_waktu = ?, status = ?, id_user = ? WHERE id_tugas = ?");
$stmt->bind_param("sssssi", $judul, $deskripsi, $batas_waktu, $status, $id_user, $id_tugas);

if ($stmt->execute()) {
    echo "<script>
            alert('Tugas berhasil diperbarui!');
            window.location.href = '../pages/guru/dashboard_guru.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal memperbarui tugas: {$stmt->error}');
            window.history.back();
          </script>";
}

$stmt->close();
$koneksi->close();
?>
