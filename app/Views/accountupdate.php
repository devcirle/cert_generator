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
                <li><a class="menu__item" href="#">HOME</a></li>
                <li><a class="menu__item" href="#">ACCOUNT</a></li>
                <li><a class="menu__item" href="#">LOGOUT</a></li>
            </ul>
        </div>

        <div class="nav">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">ACCOUNT</a></li>
                <li><a href="#">LOGOUT</a></li>
            </ul>
        </div>

    </div>

    <hr>
    <div class="container">
        <div class="content">
            <div class="change-cred">
                <div class="heading"><img src="images/vector.png"><p>Account settings</p></div>
                <hr>
                <div class="username">
                <label for="username">Username:</label>
                <input type="text" name="username">
                </div>
                <div class="password">
                <label for="password">Password:</label>
                <input type="password" name="password">
                </div>
            </div>
            <div class="save-changes">
                <p><i>Enter password to save changes</i></p>
                <input type="password" name="password">
                <button type="submit">Save changes</button>
            </div>
        </div>
    </div>
</body>

</html>