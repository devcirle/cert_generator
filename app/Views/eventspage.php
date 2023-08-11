<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="css/eventspage.css">
    <title>Document</title>
</head>

<body>
    <h1></h1>
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
                <li><a class="menu__item" href="#">HOME</a></li>
                <li><a class="menu__item" href="#">CERTIFICATES</a></li>
                <li><a class="menu__item" href="#">ATTENDANCE</a></li>
                <li><a class="menu__item" href="#">EXIT</a></li>
            </ul>
        </div>

        <div class="nav">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">CERTIFICATES</a></li>
                <li><a href="#">ATTENDANCE</a></li>
                <li><a href="#">EXIT</a></li>
            </ul>
        </div>
    </div>
    <hr>
    <?= form_open(''); ?>
    <div class="content">
        <?php foreach ($seminars as $card): ?>
            <ul class="cards">
                <li class="cards__item">
                    <div class="card">
                        <div class="card__image card__image--fence"></div>
                        <div class="card__content">
                            <div class="card__title">
                                <?= $card['title']; ?>
                            </div>
                            <p class="card__text">
                                <?php if (isset($card['registeredBy'])): ?>
                                <p>Created By:
                                    <?php echo $card['registeredBy']; ?>
                                </p>
                            <?php endif; ?>
                            <br>
                            <?= $card['venue']; ?>
                            <br>
                            <?= $card['date']; ?>
                            </p>
                            <button class="btn btn--block card__btn">Attend</button>
                        </div>
                    </div>
                </li>
            </ul>
        <?php endforeach; ?>
    </div>
    </form>
</body>

</html>