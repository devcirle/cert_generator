<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
<<<<<<< HEAD
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inria Serif:wght@400&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inria Sans:wght@300;400;700&display=swap">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>

  <div class="main-ct">
    <div class="card ct-cardstyle">
      <div class="card-body loginbox">

        <?php if (session()->getFlashdata('msg')) : ?>
          <div>
            <?= session()->getFlashdata('msg') ?>
          </div>
        <?php endif; ?>
        
        <div class="content">
          <div class="logos">
            <img class="img-fluid logo" alt="" src="images/logos.png">
          </div>


          <div class="field">
          
            <input class="form-control fieldinput" name="username" type="username" placeholder="Username" required>
            <input class="form-control input-password" name="password" type="password" placeholder="Password" required>
          
          </div>

          <div class="signin">
            <button class="btn btnlogin" id="Login">
              <b class="sign-in">SIGN IN</b>
            </button>
          </div>
        </div>

        
=======
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inria Serif:wght@400&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inria Sans:wght@300;400;700&display=swap">
</head>

<body>
  <div class="pc-admin-loginpage">
    <div class="loginbox1">

      <?php if (session()->getFlashdata('msg')): ?>
        <div>
          <?= session()->getFlashdata('msg') ?>
        </div>
      <?php endif; ?>
      <?= form_open('SigninController/loginAuth'); ?>

      <div class="logos1">
        <img class="cropped-cropped-logo-smallest-icon1" alt="" src="sdoin_logo.png">

        <img class="department-of-education-deped-icon2" alt="" src="deped_logo.png">

        <img class="department-of-education-deped-icon3" alt="" src="kagawaran_logo.png">
>>>>>>> ead226715f8bff791e05a65d5a6c4c147514cb74
      </div>

      <div class="header2">
        <b class="header3">SEMINAR/TRAINING SYSTEM</b>
      </div>

      <div class="field">
        <input class="field1input" name="username" type="username" placeholder="Username" required>
        <input class="field1input" name="password" type="password" placeholder="Password" required>
      </div>

      <div class="buttons1">
        <button class="login" id="Login">
          <b class="sign-in">SIGN IN</b>
        </button>
      </div>

      </form>
    </div>
  </div>
</body>

</html>