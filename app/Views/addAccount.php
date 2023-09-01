<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, width=device-width">
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="css/adminreg.css">
  <link rel="stylesheet" href="css/admin.css">
  <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@700&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <div class="logo">
      <img src="images\logos.png" alt="DepEd">
      <div class="title">REGISTER</div>
    </div>
    <div class="container">
      <nav>
        <ul>
          <li class="tabs"><a href="admindashboard">HOME</a></li>
          <li class="tabs"><a href="/updateData">SET DATA</a></li>
          <li class="tabs"><a href="/viewOwners">VIEW OWNERS</a></li>
          <li class="tabs"><a>ACCOUNT</a>
            <ul>
              <li><a id="list" href="/addAccount">CREATE ACCOUNT</a></li>
              <li><a id="list" href="/updateAccount">RETRIEVE ACCOUNT</a></li>
              <li><a id="list" href="/setAccount">RESTRICT ACCOUNT</a></li>
            </ul>
          </li>
          <li class="tabs"><a href="home">LOGOUT</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="account-form">
    <?= form_open('addAccount'); ?>
    <div class="container-form">
      <div class="addaccount">
        <h1>ADD ACCOUNT</h1>
      </div>
      <div class="rolefield">
        <label for="role">Role</label>
        <div class="admin"><input type="radio" name="role" value="1" checked>
          Admin
        </div>
        <div class="owner"><input type="radio" name="role" value="2">
          <p>Program owner</p>
        </div>
      </div>
      <div class="namefield">
        <div class="name">Name</div>
        <div class="full-name">
          <input class="inputname" name="name" type="text">
        </div>
      </div>

      <!-- <div class="rolefield">
      <div class="role">Role</div>
      <div class="select-container">
        <select name="role">
          <option value="1">Admin</option>
          <option value="2">Program Owner</option>
        </select>
      </div>
    </div> -->


      <?php if (session()->has('success_message')): ?>
        <div class="alert alert-success" role="alert">
          <?= session('success_message') ?>
        </div>
      <?php elseif (session()->has('error_message')): ?>
        <div class="alert alert-danger" role="alert">
          <?= session('error_message') ?>
        </div>
      <?php endif; ?>
      <div class="fields">
        <div class="username">
          <div class="username1">Username</div>
          <div class="usernamefield">
            <input class="enter-username" name="username" type="username" required
              value="<?= isset($_SESSION['prev_username']) ? $_SESSION['prev_username'] : '' ?>">
          </div>
        </div>

        <div class="username">
          <div class="password1">Password</div>
          <div class="usernamefield">
            <input class="input-password" name="password" type="password" required>
            <?php if (isset($validation) && $validation->getError('confirmpassword')): ?>
              <div class="error-message">
                <?= $validation->getError('confirmpassword') ?>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="username">
          <div class="confirm-password">Confirm Password</div>
          <div class="confirmationfield">
            <input class="input-password1" name="confirmpassword" type="password" required>
            <?php if (isset($validation) && $validation->getError('confirmpassword')): ?>
              <div class="error-message">
                <?= $validation->getError('confirmpassword') ?>
              </div>
            <?php endif; ?>
          </div>
        </div>

      </div>

      <div class="buttonregister">
        <button class="register1">REGISTER</button>
      </div>
    </div>
    </form>
  </div>

</body>

</html>