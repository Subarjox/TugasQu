<?php
include "../../classes/koneksi.php";
session_start();

// Periksa apakah pengguna sudah login dan memiliki role guru
if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'siswa') {
    echo "<script>
            alert('Akses ditolak! Hanya siswa yang bisa mengakses halaman ini. Silahkan login dulu.');
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
                    <span class="logo-subtitle">Murid</span>
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
                <span class='sidebar-user__subtitle'>Murid</span>
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
                    <a class="active" href="dashboard_siswa.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a  href="lihattugas.php"><span class="icon document" aria-hidden="true"></span>Lihat Hasil Tugas</a>
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
            <li><a href="edituser.php?id_user=<?php echo $user_id; ?>">
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

<!-- ! Main -->
<main class="main users chart-page" id="skip-target">
  <div class="container">
    <h2 class="main-title">Overview & Stats</h2>

    <div class="row stat-cards">

      <!-- Total Tugas -->
      <div class="col-md-6 col-xl-4">
        <article class="stat-cards-item">
          <div class="stat-cards-icon primary">
            <i data-feather="bar-chart-2" aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num">
              <?php
              // Query untuk menghitung total tugas
              $queryTotalTugas = "SELECT COUNT(*) AS total FROM tugas  WHERE tugas.status = 'Aktif'";
              $resultTotalTugas = mysqli_query($koneksi, $queryTotalTugas);
              $totalTugas = $resultTotalTugas ? mysqli_fetch_assoc($resultTotalTugas)['total'] : 0;
              echo $totalTugas;
              ?>
            </p>
            <p class="stat-cards-info__title">Total tugas yang anda punya</p>
            <p class="stat-cards-info__progress">
            </p>
          </div>
        </article>
      </div>

      <!-- Total Siswa -->
      <div class="col-md-6 col-xl-4">
        <article class="stat-cards-item">
          <div class="stat-cards-icon warning">
            <i data-feather="file" aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num">
              <?php
              // Query untuk menghitung total siswa
              $queryTotalSiswa = "SELECT COUNT(*) AS total FROM users WHERE role = 'guru'";
              $resultTotalSiswa = mysqli_query($koneksi, $queryTotalSiswa);
              $totalSiswa = $resultTotalSiswa ? mysqli_fetch_assoc($resultTotalSiswa)['total'] : 0;
              echo $totalSiswa;
              ?>
            </p>
            <p class="stat-cards-info__title">Total Guru</p>
            <p class="stat-cards-info__progress">
            </p>
          </div>
        </article>
      </div>

      <!-- Total Tugas Aktif -->
      <div class="col-md-6 col-xl-4">
        <article class="stat-cards-item">
          <div class="stat-cards-icon purple">
            <i data-feather="file" aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num">
              <?php
              // Query untuk menghitung total tugas aktif
              $queryTugasNonaktif = "SELECT COUNT(*) AS total FROM tugas WHERE status = 'Nonaktif'";
              $resultTugasNonaktif = mysqli_query($koneksi, $queryTugasNonaktif);
              $totalTugasNonaktif = $resultTugasNonaktif ? mysqli_fetch_assoc($resultTugasNonaktif)['total'] : 0;
              echo $totalTugasNonaktif;
              ?>
            </p>
            <p class="stat-cards-info__title">Total Tugas Nonaktif</p>
            <p class="stat-cards-info__progress">
            </p>
          </div>
        </article>
      </div>

    </div>
  

        
    <?php
// Query untuk mengambil data tugas berdasarkan id_user
if ($role === 'guru') {
    // Guru hanya melihat tugas yang dibuat oleh mereka
    $sql = "SELECT * FROM tugas WHERE id_user = '$user_id'";

} elseif ($role === 'siswa') {

    // Query untuk mengambil data tugas yang belum di-upload dan statusnya aktif
    $query = "SELECT tugas.id_tugas, tugas.judul, tugas.deskripsi, tugas.batas_waktu, users.nama AS nama_guru
              FROM tugas
              JOIN users ON tugas.id_user = users.id_user
              LEFT JOIN pengumpulan_tugas ON tugas.id_tugas = pengumpulan_tugas.id_tugas AND pengumpulan_tugas.id_user = '$user_id'
              WHERE tugas.status = 'Aktif' 
              AND (pengumpulan_tugas.file_tugas IS NULL OR pengumpulan_tugas.file_tugas = '')";
}

$result = $koneksi->query($query);
?>

<br>
<h2 class="main-title">Daftar Tugas</h2>
<br>
<div class="users-table table-wrapper">
    <table class="posts-table">
        <thead>
            <tr class="users-table-info">
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Batas Waktu</th>
                <th>Guru</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['judul']); ?></td>
                        <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                        <td><?php echo htmlspecialchars($row['batas_waktu']); ?></td>
                        <td><?php echo htmlspecialchars($row['nama_guru']); ?></td>
                        <td>
                            <span class="p-relative">
                                <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                    <div class="sr-only">More info</div>
                                    <i data-feather="more-horizontal" aria-hidden="true"></i>
                                </button> 
                                <ul class="users-item-dropdown dropdown">
                                    <li><a href="uploadtugas.php?id_tugas=<?php echo $row['id_tugas']; ?>">Upload Tugas</a></li>
                                </ul>
                            </span>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada tugas yang dapat di-upload.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<?php
// Tutup koneksi
$koneksi->close();
?>


    <!-- ! Footer -->
      <!-- <footer class="footer">
    <div class="container footer--flex">
      <div class="footer-start">
        <p>2021 © Elegant Dashboard - <a href="elegant-dashboard.com" target="_blank"
            rel="noopener noreferrer">elegant-dashboard.com</a></p>
      </div>
      <ul class="footer-end">
        <li><a href="##">About</a></li>
        <li><a href="##">Support</a></li>
        <li><a href="##">Puchase</a></li>
      </ul>
    </div>
  </footer>
    </div>
  </div> -->
<!-- Chart library -->
<script src="../../plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="../../plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="../../js/script.js"></script>
</body>

</html>