<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TugasQu | Sign In</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="../css/style.min.css">
</head>

<body>
  <div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">TugasQu</h1>
    <p class="sign-up__subtitle">Website Pusat Pengumpulan Tugas</p>
    <form class="sign-up-form form" action="../classes/login.php" method="POST">
      
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" type="email" name="email" placeholder="Masukan Email Anda" required>
      </label>

      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input class="form-input" type="password" name="password" placeholder="Masukan Password Anda" required>
      </label>
      
      <a class="link-info forget-link" href="signup.php">Belum punya akun? Buat akun</a>
     
      <button class="form-btn primary-default-btn transparent-btn">Login</button>
    </form>
  </article>
</main>
<!-- Chart library -->
<script src="../plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="../plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="../js/script.js"></script>
</body>

</html>