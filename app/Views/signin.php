<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inria Serif:wght@400&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inria Sans:wght@300;400;700&display=swap">
  </head>
  <body>
    <div class="pc-admin-loginpage">
        <div class="loginbox1">

		<?php if(session()->getFlashdata('msg')):?>
            <div>
                <?= session()->getFlashdata('msg') ?>
			</div>
        <?php endif;?>
		<?= form_open('SigninController/loginAuth'); ?>
            
            <div class="logos1">
                <img class="cropped-cropped-logo-smallest-icon1" alt="" src="sdoin_logo.png">

                <img class="department-of-education-deped-icon2" alt="" src="deped_logo.png">

                <img class="department-of-education-deped-icon3" alt="" src="kagawaran_logo.png">
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
                <a href="signup" class="register2" id="Register">
                    <b class="register-as-admin">REGISTER</b>
                </a>
            </div>

        </form>
      </div>
    </div>
  </body>
</html>
