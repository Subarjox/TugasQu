<?php
session_start();
include "koneksi.php";

// Aktifkan error reporting untuk debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

$id_user = $_SESSION['id_user']; // Ambil user_id dari session aktif
$role = $_SESSION['role'];

// Ambil data dari form dan lakukan validasi
$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// Gunakan prepared statement untuk keamanan
$stmt = $koneksi->prepare("UPDATE users SET nama = ?, email = ?, password = ? WHERE id_user = ?");
$stmt->bind_param("sssi", $nama, $email, $password, $id_user);

if ($stmt->execute()) {
    if ($role == 'guru') {
        echo "<script>
                alert('Akun bapa/ibu berhasil diperbarui!');
                window.location.href = '../pages/guru/dashboard_guru.php';
              </script>";
    } elseif ($role == 'siswa') {
        echo "<script>
                alert('Akun siswa berhasil diperbarui!');
                window.location.href = '../pages/siswa/dashboard_siswa.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Gagal memperbarui akun: {$stmt->error}');
            window.history.back();
          </script>";
}

$stmt->close();
$koneksi->close();
?>
