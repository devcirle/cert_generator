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
      <?= form_open('new_register'); ?>
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
                <select name="role">
                  <option value="1">Admin</option>
                  <option value="2">Program Owner</option>
                </select>
            </div>
        </div>

        <div class="fields">
          <div class="username">
            <div class="username1">Username</div>
            <div class="usernamefield">
              <img class="vector-icon1" alt="" src="vector1.svg">
              <input class="enter-username" name="username" type="username" placeholder="Enter username" required value="<?= isset($_SESSION['prev_username']) ? $_SESSION['prev_username'] : '' ?>">
            </div>
          </div>
          <div class="username">
            <div class="password1">Password</div>
            <div class="usernamefield">
              <img class="vector-icon1" alt="" src="vector2.svg">
              <input class="input-password" name="password" type="password" placeholder="Input password" required>
              <?php if (isset($validation) && $validation->getError('confirmpassword')): ?>
              <div class="error-message"><?= $validation->getError('confirmpassword') ?></div>
              <?php endif; ?>
            </div>
          </div>
          <div class="username">
            <div class="confirm-password">Confirm Password</div>
            <div class="confirmationfield">
              <img class="vector-icon1" alt="" src="vector3.svg">
              <input class="input-password1" name="confirmpassword" type="password" placeholder="Input password" required>
              <?php if (isset($validation) && $validation->getError('confirmpassword')): ?>
              <div class="error-message"><?= $validation->getError('confirmpassword') ?></div>
              <?php endif; ?>
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