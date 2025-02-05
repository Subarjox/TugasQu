<?php
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'tugasqu';

// Mencoba membuat koneksi ke database
$koneksi = mysqli_connect($server, $user, $password, $database);

// Periksa koneksi
// if (!$koneksi) {
//     die("Koneksi ke database gagal: " . mysqli_connect_error());
// } else {
//     echo "Koneksi berhasil!";
// }

// Debugging: Jalankan query contoh
// $query = "SELECT * FROM system_info WHERE id = '2'";
// $result = mysqli_query($koneksi, $query);

// // Periksa apakah query berhasil
// if ($result) {
//     // Ambil data hasil query
//     $data = mysqli_fetch_assoc($result);
//     echo "<pre>";
//     print_r($data);
//     echo "</pre>";
// } else {
//     echo "Query gagal: " . mysqli_error($koneksi);
// }
?>
