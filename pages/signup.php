<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TugasQu| Sign Up</title>
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
    <p class="sign-up__subtitle">Daftar akun</p>
    <form class="sign-up-form form" action="../classes/signin.php" method="POST">
      <label class="form-label-wrapper">
        <p class="form-label">Nama</p>
        <input class="form-input" type="text" name="nama" placeholder="Enter your name" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" type="email" name="email" placeholder="Enter your email" required>
      </label>
      <label class="form-checkbox">
        <p class="form-label">Daftar Sebagai </p>
        <div>
          <label>
            <input class="form-input" type="radio" name="role" value="siswa" required>
            Murid
          </label>
        </div>
        <div>
          <label>
            <input class="form-input" type="radio" name="role" value="guru" required>
            Guru
          </label>
        </div>
      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input class="form-input" type="password" name="password" placeholder="Enter your password" required>
      </label>
      <label class="form-label-wrapper">
      <a class="link-info forget-link" href="index.php">Sudah punya akun? Login disini</a>
      </label>
      <button class="form-btn primary-default-btn transparent-btn">Buat Akun </button>
    </form>
  </article>
</main>
<!-- Chart library -->
<script src="../plugins/chart.min.js"></script>
<!-- Icons library -->
<script src=".../plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="../js/script.js"></script>
</body>

</html>