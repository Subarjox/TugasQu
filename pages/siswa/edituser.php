<?php
include "../../classes/koneksi.php";
session_start();

// Periksa apakah pengguna sudah login dan memiliki role guru
if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'siswa') {
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
                    <span class="logo-subtitle">Guru</span>
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
                <span class='sidebar-user__subtitle'>GURU</span>
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
                    <a  href="dashboard_siswa.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a  href="lihattugas.php"><span class="icon folder" aria-hidden="true"></span>Lihat Hasil Tugas</a>
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

<?php

if (isset($_GET['id_user']) && is_numeric($_GET['id_user'])) {
    $user_id = intval($_GET['id_user']); // Validasi ID user

    // Query untuk mendapatkan data user berdasarkan id_user
    $query = "SELECT * FROM users WHERE id_user = $user_id";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // Ambil data tugas
        $nama = htmlspecialchars($row['nama']);
        $email = htmlspecialchars($row['email']);
        $password = htmlspecialchars($row['password']);
    } else {
        die("Data User tidak ditemukan!");
    }
} else {
    die("ID User tidak valid!");
}
?>


<div class="main-wrapper">  
    <div class="layer"></div>
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <article class="sign-up">
                <h2 class="main-title">Edit User</h2>
                <form class="sign-up-form form" action="../../classes/updateuser.php" method="POST">
                    <input type="hidden" name="id_tugas" value="<?php echo $user_id; ?>">
                    
                    <label class="form-label-wrapper">  
                        <p class="stat-cards-info__title">Masukan nama baru anda :</p>
                        <input class="form-input" type="text" name="nama" value="<?php echo $nama; ?>" required>
                    </label>

                    <label class="form-label-wrapper">
                        <p class="stat-cards-info__title">Masukan Email baru anda :</p>
                        <input class="form-input" type="text" name="email" value= "<?php echo $email; ?>" required>
                    </label>

                    <label class="form-label-wrapper">
                        <p class="stat-cards-info__title">Masukan Password baru anda :</p>
                        <input class="form-input" type="password" name="password" value="">
                    </label>

    
                    
                    <button class="form-btn primary-default-btn transparent-btn"> Simpan Perubahan </button>
                    
                    <br>  

                  </form>



</div>


<!-- Chart library -->
<script src="../../plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="../../plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="../../js/script.js"></script>
</body>

</html>