<?php
session_start();
include "koneksi.php";

// Pastikan session aktif dan role adalah siswa
if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'siswa') {
    echo "<script>
            alert('Akses ditolak! Silahkan login sebagai siswa.');
            window.location.href = '../../index.php';
          </script>";
    exit;
}

$id_tugas = isset($_POST['id_tugas']) ? intval($_POST['id_tugas']) : 0;
$id_user = $_SESSION['id_user']; // ID siswa dari session aktif

// Cek apakah file PDF di-upload
if (isset($_FILES['file_tugas']) && $_FILES['file_tugas']['error'] == 0) {
    $file_tmp = $_FILES['file_tugas']['tmp_name'];
    $file_name = $_FILES['file_tugas']['name'];
    $file_size = $_FILES['file_tugas']['size'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Validasi apakah file yang di-upload adalah PDF
    if ($file_ext != 'pdf') {
        echo "<script>
                alert('Hanya file PDF yang diizinkan!');
                window.history.back();
              </script>";
        exit;
    }   

    // Tentukan lokasi untuk menyimpan file
    $upload_dir = '../pages/siswa/uploads/pdf-tugas/'; // Folder untuk menyimpan file PDF
    $new_file_name = uniqid() . '.pdf'; // Nama file baru untuk disimpan
    $file_path = $upload_dir . $new_file_name;

    // Pindahkan file dari temporary location ke folder yang ditentukan
    if (move_uploaded_file($file_tmp, $file_path)) {
        // Masukkan data pengumpulan tugas ke database
        $stmt = $koneksi->prepare("INSERT INTO pengumpulan_tugas (id_tugas, id_user, file_tugas) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $id_tugas, $id_user, $new_file_name);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Tugas berhasil dikumpulkan!');
                    window.location.href = '../pages/siswa/dashboard_siswa.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal mengumpulkan tugas: {$stmt->error}');
                    window.history.back();
                  </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
                alert('Gagal meng-upload file!');
   
              </script>";
        exit;
    }
} else {
    echo "<script>
           alert('Error dalam upload file. Kode error: {$_FILES['file_tugas']['error']}');
            window.history.back();
          </script>";
    exit;
}

$koneksi->close();
?>
