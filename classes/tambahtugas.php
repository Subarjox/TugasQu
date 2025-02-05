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
$judul = isset($_POST['judul']) ? trim($_POST['judul']) : '';
$deskripsi = isset($_POST['deskripsi']) ? trim($_POST['deskripsi']) : '';
$batas_waktu = isset($_POST['batas_waktu']) ? trim($_POST['batas_waktu']) : '';
$status = isset($_POST['status']) ? trim($_POST['status']) : '';
$id_user = $_SESSION['id_user']; // Ambil user_id dari session aktif

if ($judul === '' || $deskripsi === '' || $batas_waktu === '' || $status === '') {
    echo "<script>
            alert('Semua data harus diisi!');
            window.history.back();
          </script>";
    exit;
}

// Gunakan prepared statement untuk keamanan
$stmt = $koneksi->prepare("INSERT INTO tugas (judul, deskripsi, batas_waktu, status, id_user) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $judul, $deskripsi, $batas_waktu, $status, $id_user);

if ($stmt->execute()) {
    echo "<script>
            alert('Tugas berhasil ditambah!');
            window.location.href = '../pages/guru/dashboard_guru.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menambah tugas: {$stmt->error}');
            window.history.back();
          </script>";
}

$stmt->close();
$koneksi->close();
?>
