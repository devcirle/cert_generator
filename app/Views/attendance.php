<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/headerstyle.css">
    <link rel="stylesheet" href="css/attendance.css">
    <link rel="stylesheet" href="css/global.css">
    <title>Document</title>
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
                <li><a class="menu__item" href="/">ABOUT</a></li>
                <li><a class="menu__item" href="/">HOME</a></li>
                <li><a class="menu__item" href="events">EVENTS</a></li>
                <li><a class="menu__item" href="cert-test">CERTIFICATES</a></li>
                <li><a class="menu__item" href="attendance">ATTENDANCE</a></li>
            </ul>
        </div>

        <div class="nav">
            <ul>
                <li><a class="menu__item" href="/">ABOUT</a></li>
                <li><a class="menu__item" href="/">HOME</a></li>
                <li><a class="menu__item" href="events">EVENTS</a></li>
                <li><a class="menu__item" href="cert-test">CERTIFICATES</a></li>
                <li><a class="menu__item" href="attendance">ATTENDANCE</a></li>
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

    <?= form_open('attendance/success') ?>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="position-relative">
            <div class="card p-2 text-center">
                <h6>ATTENDANCE</h6>
                <div>
                    <span>Enter the last 6 digits of your pre-register ID</span><br>
                    <small><i>e.g. SDOIN-<i><b>CODE23</b></i></small>
                </div>
                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                    <input name="first" class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" />
                    <input name="second" class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" />
                    <input name="third" class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" />
                    <input name="fourth" class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" />
                    <input name="fifth" class="m-2 text-center form-control rounded" type="text" id="fifth" maxlength="1" />
                    <input name="sixth" class="m-2 text-center form-control rounded" type="text" id="sixth" maxlength="1" />
                </div>
                <div class="mt-4">
                    <button class="btn px-4 validate">SUBMIT</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/attendance.js"></script>

</html>