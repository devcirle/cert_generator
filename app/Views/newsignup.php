<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/adminreg.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inria Serif:wght@400&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inria Sans:wght@300;400;700&display=swap">
  </head>
  <body>
    <div class="pc-admin-register-page">
      <form class="main" action="<?php echo base_url(); ?>public/SignupController/store" method="post">
        <b class="registration">REGISTRATION</b>
        <div class="main-child"></div>

        <div class="namefield">
          <div class="name">Name</div>
          <div class="full-name">
            <img class="vector-icon" alt="" src="vector.svg">
            <input class="inputname" type="text" placeholder="Enter your full name">
          </div>
        </div>

        <div class="rolefield">
            <div class="role">Role</div>
            <div class="select-container">
                <input class="select-box" name="role" value="1">
            </div>
        </div>

        <div class="fields">
          <div class="username">
            <div class="username1">Username</div>
            <div class="usernamefield">
              <img class="vector-icon1" alt="" src="vector1.svg">
              <input class="enter-username" name="username" type="username" placeholder="Enter username">
            </div>
          </div>
          <div class="username">
            <div class="password1">Password</div>
            <div class="usernamefield">
              <img class="vector-icon1" alt="" src="vector2.svg">
              <input class="input-password" name="password" type="password" placeholder="Input password">
            </div>
          </div>
          <div class="username">
            <div class="confirm-password">Confirm Password</div>
            <div class="confirmationfield">
              <img class="vector-icon1" alt="" src="vector3.svg">
              <input class="input-password1" name="confirmpassword" type="password" placeholder="Input password">
            </div>
          </div>
        </div>

        <div class="buttonregister">
          <button class="register1">REGISTER</button>
        </div>
      </form>
    </div>
  </body>
</html>