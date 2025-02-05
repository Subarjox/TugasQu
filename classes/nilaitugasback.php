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

// Ambil data dari form
$id_pengumpulan = isset($_POST['id_pengumpulan']) ? intval($_POST['id_pengumpulan']) : 0;
$nilai = isset($_POST['nilai']) ? intval($_POST['nilai']) : null;
$komentar = isset($_POST['komentar']) ? trim($_POST['komentar']) : '';

// Validasi input
if (empty($id_pengumpulan) || $nilai === null || empty($komentar)) {
    echo "<script>
            alert('Semua data harus diisi!');
            window.location.href = '../../pages/siswa/dashboard_guru.php';
          </script>";
    exit;
}

// Cek apakah id_pengumpulan ada di tabel pengumpulan_tugas
$stmt = $koneksi->prepare("SELECT id_pengumpulan FROM pengumpulan_tugas WHERE id_pengumpulan = ?");
$stmt->bind_param("i", $id_pengumpulan);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Jika id_pengumpulan tidak ada, lakukan INSERT
    $stmt = $koneksi->prepare("INSERT INTO pengumpulan_tugas (id_pengumpulan, nilai, komentar) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $id_pengumpulan, $nilai, $komentar);
} else {
    // Jika id_pengumpulan ada, lakukan UPDATE
    $stmt = $koneksi->prepare("UPDATE pengumpulan_tugas SET nilai = ?, komentar = ? WHERE id_pengumpulan = ?");
    $stmt->bind_param("isi", $nilai, $komentar, $id_pengumpulan);
}

if ($stmt->execute()) {
    echo "<script>
            alert('Tugas berhasil dinilai!');
            window.location.href = '../pages/guru/dashboard_guru.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menyimpan nilai: {$stmt->error}');
          </script>";
}

$stmt->close();
$koneksi->close();
?>
