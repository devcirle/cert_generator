<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/headerstyle.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/accountupdate.css">
</head>

<body>
    <div class="header">
        <div class="logos">
            <img class="logocontainer" src="images/logos.png" alt="">
            <h2>Account</h2>
        </div>
        <div class="hamburger">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>

            <ul class="menu__box blur-effect">
                <li><a class="menu__item" href="dashboard">HOME</a></li>
                <li><a class="menu__item" href="#">ACCOUNT</a></li>
                <li><a class="menu__item" href="home">LOGOUT</a></li>
            </ul>
        </div>

        <div class="nav">
            <ul>
                <li><a href="dashboard">HOME</a></li>
                <li><a href="#">ACCOUNT</a></li>
                <li><a href="home">LOGOUT</a></li>
            </ul>
        </div>

    </div>

    <hr>
    <br>
    <br>
    <br>

    <?= form_open('updateAccount'); ?>
    <div class="container">
        <div class="content">
            <div class="change-cred">
                <div class="heading"><img src="images/vector.png">
                    <p>Account Update</p>
                </div>
                <hr>

                <?php if (session()->has('success_message')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session('success_message') ?>
                    </div>
                <?php elseif (session()->has('error_message')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session('error_message') ?>
                    </div>
                <?php endif; ?>

                <div class="username">
                    <label for="username">New Username:</label>
                    <input type="text" name="username">
                </div>

                <div class="password">
                    <label for="password">New Password:</label>
                    <input type="password" name="password">
                </div>

                <div class="password">
                    <label for="confirmpassword">Confirm Password:</label>
                    <input type="password" name="confirmpassword">
                </div>

            </div>
            <div class="save-changes">
                <button type="submit">Save changes</button>
            </div>
        </div>
    </div>
    </form>
</body>

</html>