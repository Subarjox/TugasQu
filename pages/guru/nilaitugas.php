<?php
include "../../classes/koneksi.php";
session_start();

// Periksa apakah pengguna sudah login dan memiliki role guru
if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'guru') {
    echo "<script>
            alert('Akses ditolak! Hanya guru yang bisa mengakses halaman ini. Silahkan login dulu.');
            window.location.href = '../../index.php';
          </script>";
    exit;
}

?>

<?php

$user_id = $_SESSION['id_user'];
$role = $_SESSION['role'];
// Query untuk mengambil data pengguna berdasarkan id_user
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$user_id'");
$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html> 
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> TugasQu | Dashboard</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../../img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="../../css/style.min.css">
</head>

<body>
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
  <!-- ! Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">TugasQu</span>
                    <span class="logo-subtitle">GURU</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
        <?php
echo "
    <div class='sidebar-footer'>
        <a href='' class='sidebar-user'>
            <span class='sidebar-user-img'>
                <picture>
                    <source srcset='../img/avatar/avatar-illustrated-01.webp' type='image/webp'>
                    <img src='./img/avatar/avatar-illustrated-01.png' alt='User name'>
                </picture>
            </span>
            <div class='sidebar-user-info'>
                <span class='sidebar-user__title'> 
                    {$data['nama']}
                </span>
                <span class='sidebar-user__subtitle'>SISWA</span>
            </div>
        </a>
    </div>
";
?>
<ul class="sidebar-body-menu">
<li>
                  <ul class="cat-sub-menu"></ul>
              </li>
                <li>
                    <a  href="dashboard_guru.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a  href="tambahtugas.php"><span class="icon folder" aria-hidden="true"></span>Tambah Tugas</a>
                </li>
                <li>
                    <a   href="daftarnilaitugas.php"><span class="icon document" aria-hidden="true"></span>Nilai Tugas</a>
                </li>
            </ul>
        </div>
    

</aside>
  <div class="main-wrapper">
    <!-- ! Main nav -->
    <nav class="main-nav--bg">
  <div class="container main-nav">
    <div class="main-nav-start">
      <div class="search-wrapper">
        <i data-feather="search" aria-hidden="true"></i>
        <input type="text" placeholder="Enter keywords ..." required>
      </div>
    </div>
    <div class="main-nav-end">
      <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
      </button>
      <div class="lang-switcher-wrapper">
        <button class="lang-switcher transparent-btn" type="button">
          EN
          <i data-feather="chevron-down" aria-hidden="true"></i>
        </button>
        <ul class="lang-menu dropdown">
          <li><a href="##">English</a></li>
          <li><a href="##">French</a></li>
          <li><a href="##">Uzbek</a></li>
        </ul>
      </div>
      <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
        <span class="sr-only">Switch theme</span>
        <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
        <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
      </button>
      <div class="notification-wrapper">
        <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
          <span class="sr-only">To messages</span>
          <span class="icon notification active" aria-hidden="true"></span>
        </button>
        <ul class="users-item-dropdown notification-dropdown dropdown">
          <li>
            <a href="##">
              <div class="notification-dropdown-icon info">
                <i data-feather="check"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">System just updated</span>
                <span class="notification-dropdown__subtitle">The system has been successfully upgraded. Read more
                  here.</span>
              </div>
            </a>
          </li>
          <li>
            <a href="##">
              <div class="notification-dropdown-icon danger">
                <i data-feather="info" aria-hidden="true"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">The cache is full!</span>
                <span class="notification-dropdown__subtitle">Unnecessary caches take up a lot of memory space and
                  interfere ...</span>
              </div>
            </a>
          </li>
          <li>
            <a href="##">
              <div class="notification-dropdown-icon info">
                <i data-feather="check" aria-hidden="true"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">New Subscriber here!</span>
                <span class="notification-dropdown__subtitle">A new subscriber has subscribed.</span>
              </div>
            </a>
          </li>
          <li>
            <a class="link-to-page" href="##">Go to Notifications page</a>
          </li>
        </ul>
      </div>
      <div class="nav-user-wrapper">
        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
          <span class="sr-only">My profile</span>
          <span class="nav-user-img">
            <picture><source srcset="./img/avatar/avatar-illustrated-02.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-02.png" alt="User name"></picture>
          </span>
        </button>
        <ul class="users-item-dropdown nav-user-dropdown dropdown">
          <li><a href="##">
              <i data-feather="user" aria-hidden="true"></i>
              <span>Profile</span>
            </a></li>
          <li><a href="##">
              <i data-feather="settings" aria-hidden="true"></i>
              <span>Account settings</span>
            </a></li>
          <li><a class="danger" href="../../classes/logout.php">
              <i data-feather="log-out" aria-hidden="true"></i>
              <span>Logout</span>
            </a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<?php
// Ambil id_pengumpulan dari URL
if (isset($_GET['id_pengumpulan'])) {
    $id_pengumpulan = $_GET['id_pengumpulan'];

    // Query untuk mengambil data tugas dan nilai berdasarkan id_pengumpulan
    $query = "SELECT tugas.id_tugas, tugas.judul, tugas.deskripsi, pengumpulan_tugas.id_pengumpulan, 
                     pengumpulan_tugas.nilai, pengumpulan_tugas.komentar, pengumpulan_tugas.file_tugas
              FROM tugas
              LEFT JOIN pengumpulan_tugas ON tugas.id_tugas = pengumpulan_tugas.id_tugas
              WHERE pengumpulan_tugas.id_pengumpulan = '$id_pengumpulan'";

    $result = $koneksi->query($query);
    $row = $result->fetch_assoc();

    // Menyiapkan variabel jika nilai dan komentar tidak ada
    $nilai = !empty($row['nilai']) ? $row['nilai'] : 'belum ada';
    $komentar = !empty($row['komentar']) ? $row['komentar'] : 'belum ada';
    $judul = $row['judul'];
    $deskripsi = $row['deskripsi'];
    $file = !empty($row['file_tugas']) ? $row['file_tugas'] : 'belum ada';
    $id_tugas = $row['id_tugas']; // Ambil id_tugas dari tabel tugas
    $id_pengumpulan = $row['id_pengumpulan']; // Ambil id_pengumpulan dari tabel pengumpulan_tugas
} else {
    echo "ID Pengumpulan tidak ditemukan.";
    exit;
}
?>

<div class="main-wrapper">
    <div class="layer"></div>
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <article class="sign-up">
                <h2 class="main-title">Penilaian Tugas</h2>
                <form class="sign-up-form form" action="../../classes/nilaitugasback.php" method="POST" enctype="multipart/form-data">

                    <!-- Kirimkan id_pengumpulan sebagai hidden field -->
                    <input type="hidden" name="id_pengumpulan" value="<?php echo $id_pengumpulan; ?>"> <!-- Kirimkan id_pengumpulan -->
                    <input type="hidden" name="id_tugas" value="<?php echo $id_tugas; ?>">

                    <!-- Judul Tugas sebagai Readonly -->
                    <label class="form-label-wrapper">
                        <p class="stat-cards-info__title">Judul Tugas</p>
                        <input class="form-input" type="text" name="judul" value="<?php echo $judul; ?>" readonly>
                    </label>

                    <!-- Deskripsi Tugas sebagai Readonly -->
                    <label class="form-label-wrapper">
                        <p class="stat-cards-info__title">Deskripsi Singkat</p>
                        <input class="form-input" type="text" name="deskripsi" value="<?php echo $deskripsi; ?>" readonly>
                    </label>

                    <!-- Nilai dengan placeholder jika kosong -->
                    <label class="form-label-wrapper">
                        <p class="stat-cards-info__title">Nilai</p>
                        <input class="form-input" type="text" name="nilai" value="<?php echo $nilai; ?>" required>
                    </label>

                    <!-- Komentar dengan placeholder jika kosong -->
                    <label class="form-label-wrapper">
                        <p class="stat-cards-info__title">Komentar</p>
                        <input class="form-input" type="text" name="komentar" value="<?php echo $komentar; ?>" required>
                    </label>

                    <!-- Input File untuk Upload File PDF (hanya jika file sudah ada) -->
                    <label class="form-label-wrapper">
                        <p class="stat-cards-info__title">File Tugas Murid : </p>
                        <br>
                        <p> <a href="uploads/pdf-tugas/<?php echo htmlspecialchars($file); ?>" target="_blank"> ⬇️ Download</a> </P>
                    </label>

                    <br>
                    <button class="form-btn primary-default-btn transparent-btn"> Submit Nilai & Komentar</button>
                    <br>  
                </form>
            </article>
        </div>
    </main>
</div>









<!-- Chart library -->
<script src="../../plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="../../plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="../../js/script.js"></script>
</body>

</html>