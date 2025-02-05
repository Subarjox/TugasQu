<?php
session_start();
include "koneksi.php";

// Ambil data dari form
$nama = isset($_POST['nama']) ? mysqli_real_escape_string($koneksi, $_POST['nama']) : '';
$email = isset($_POST['email']) ? mysqli_real_escape_string($koneksi, $_POST['email']) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($koneksi, $_POST['password']) : '';
$role = isset($_POST['role']) ? mysqli_real_escape_string($koneksi, $_POST['role']) : '';


$query = "INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `role`, `status`) VALUES (NULL, '$nama', '$email', '$password', '$role', '1');";
$insert= mysqli_query($koneksi, $query);

if ($insert){
   echo " <script text='text/javascript'>
   alert('Berhasil Ditambah');
   window,location.href='../index.php'
   </script>";

} else {
    echo "<script>
            alert('Gagal Menambah Data');

          </script>";
}
?>
