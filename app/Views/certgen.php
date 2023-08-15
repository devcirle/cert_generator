<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/headerstyle.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/certgen.css">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="logos">
            <img class="logocontainer" src="images/logos.png" alt="">
        </div>
        <div class="hamburger">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>

            <ul class="menu__box blur-effect">
                <li><a class="menu__item" href="#">ABOUT</a></li>
                <li><a class="menu__item" href="events">EVENTS</a></li>
                <li><a class="menu__item" href="cert-test">CERTIFICATES</a></li>
                <li><a class="menu__item" href="attendance">ATTENDANCE</a></li>
                <li><a class="menu__item" href="#">SUPPORT</a></li>
            </ul>
        </div>

        <div class="nav">
            <ul>
                <li><a href="#">ABOUT</a></li>
                <li><a href="events">EVENTS</a></li>
                <li><a href="cert-test">CERTIFICATES</a></li>
                <li><a href="attendance">ATTENDANCE</a></li>
                <li><a href="#">SUPPORT</a></li>
            </ul>
        </div>
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

    <?= form_open('cert-test'); ?>
    <div class="container">
        <div class="searchpage">
            <label for="search">Please enter certificate code</label>
            <div class="search">
                <input type="text" class="searchTerm" placeholder="e.g. SDOIN-CODE23 ...">
                <img src="images/searchicon.png" class="searchIcon">
            </div>
            <button type="submit">Search</button>
        </div>
    </div>
    </form>

</body>

</html>