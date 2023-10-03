<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link href="img/logo/logo.png" rel="icon"> -->
  <title>Login</title>
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="admin/css/ruang-admin.min.css" rel="stylesheet">

   <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h3 text-gray-1000 mb-5">Login</h1>
                  </div>

                  <?php
                // Cek apakah ada pesan error yang diberikan
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    switch ($error) {
                        case 'captchaError':
                            echo '<p style="color: red;">Anda adalah robot. centang dulu!</p>';
                            break;
                        default:
                            break;
                    }
                }
                ?>

                  <form method="POST" action="procces_login.php">
                    <div class="form-group">
                      <input type="text" class="form-control" name="username"  id="admin" placeholder="Username">
                      <span id="username_error" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                      <span id="password_error" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                      <div class="g-recaptcha" data-sitekey="6Lc6ezsoAAAAAOdOEBl4DlsAKvLtMYvnkJqCdWUO"></div>
                      <span id="captcha_error" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <p>Belum punya akun? <a class="font-weight-bold small" href="register.php">Sign Up!</a></p>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Login Content -->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="admin/js/ruang-admin.min.js"></script>
</body>

</html>