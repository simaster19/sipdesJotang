<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sipdes Jotang</title>
  <link rel="stylesheet" href="assets/css/main/app.css">
  <link rel="stylesheet" href="assets/css/pages/auth.css">
  <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
  <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
</head>

<body>
  <div id="auth">

    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="text-center">
            <a href="./"><img src="assets/images/logo/logo2.png" alt="Logo">
              <h3 class="d-inline-block mb-3">SIPDES-JOTANG</h3>
            </a>
          </div>

          <form action="app/Controller/proccess_login.php" method="POST">
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="text" class="form-control form-control-md" placeholder="Username" name="username" id="username">
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="password" class="form-control form-control-md" placeholder="Password" name="password" id="password">
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            <button class="btn btn-primary btn-block btn-md shadow-lg mt-5" type="submit" name="tb_login">Log in</button>
          </form>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
          <!-- <div class="container-lg">

            <h1 class="text-white">PROFIL DESA</h1>
            <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti aut delectus nulla ad voluptates suscipit quaerat dolor quia maiores culpa, consectetur ipsum vel eos? Est recusandae atque ratione quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, eum. Error ipsa sint neque, minima modi perspiciatis ex fuga assumenda earum sed autem odit molestias quaerat saepe sapiente. Veniam, corrupti. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere sit pariatur officia, incidunt eveniet, iure recusandae eligendi, perferendis amet eum eius ratione omnis aperiam at fuga accusamus aliquid voluptate ducimus! </p>
          </div> -->
        </div>
      </div>
    </div>

  </div>
</body>

</html>