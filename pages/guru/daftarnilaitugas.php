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
                    <a  href="dashboard_guru.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a  href="tambahtugas.php"><span class="icon folder" aria-hidden="true"></span>Tambah Tugas</a>
                </li>
                <li>
                    <a  class="active" href="daftarnilaitugas.php"><span class="icon document" aria-hidden="true"></span>Nilai Tugas</a>
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
        
  <?php
// Query untuk guru
if ($role === 'guru') {
    // Guru melihat daftar tugas yang dibuat oleh dirinya sendiri beserta file upload siswa
    $query = "SELECT tugas.id_tugas, tugas.judul, tugas.deskripsi, 
                      pengumpulan_tugas.id_pengumpulan, 
                      pengumpulan_tugas.file_tugas AS download, 
                      pengumpulan_tugas.id_user AS id_siswa, 
                      users.nama AS nama_siswa
              FROM tugas
              LEFT JOIN pengumpulan_tugas ON tugas.id_tugas = pengumpulan_tugas.id_tugas
              LEFT JOIN users ON pengumpulan_tugas.id_user = users.id_user
              WHERE tugas.id_user = '$user_id'
              AND pengumpulan_tugas.file_tugas IS NOT NULL
              AND pengumpulan_tugas.file_tugas != ''";
              
} elseif ($role === 'siswa') {
    $query = "SELECT tugas.id_tugas, tugas.judul, tugas.deskripsi, 
                     pengumpulan_tugas.id_pengumpulan, 
                     pengumpulan_tugas.file_tugas AS download, 
                     users.nama AS nama_guru
              FROM tugas
              JOIN users ON tugas.id_user = users.id_user
              LEFT JOIN pengumpulan_tugas ON tugas.id_tugas = pengumpulan_tugas.id_tugas
              WHERE pengumpulan_tugas.file_tugas IS NOT NULL AND pengumpulan_tugas.file_tugas != ''";
}

// Eksekusi query
$result = $koneksi->query($query);
?>



<br>
<h2 class="main-title">Daftar Tugas yang Sudah di-Upload oleh Siswa</h2>
<br>
<div class="users-table table-wrapper">
    <table class="posts-table">
        <thead>
            <tr class="users-table-info">
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>File Tugas</th>
                <th>Nama Siswa</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['judul']); ?></td>
                        <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                        <td>
                            <?php if ($row['download']): ?>
                                <a href="uploads/pdf-tugas/<?php echo htmlspecialchars($row['download']); ?>" target="_blank">⬇️ Download</a>
                            <?php else: ?>
                                <span>Belum ada file</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['nama_siswa']); ?></td>
                        <td>
                            <span class="p-relative">
                                <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                    <div class="sr-only">More info</div>
                                    <i data-feather="more-horizontal" aria-hidden="true"></i>
                                </button>
                                <ul class="users-item-dropdown dropdown"> 
                                    <!-- Ganti id_pengumpulan menjadi yang sesuai -->
                                    <li><a href="nilaitugas.php?id_pengumpulan=<?php echo $row['id_pengumpulan']; ?>">Lihat Penilaian</a></li>
                                </ul>
                            </span>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada tugas yang di-upload oleh siswa.</td>
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