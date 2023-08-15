<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel=stylesheet href="css/eventspage.css">
    <link rel=stylesheet href="css/header.css">

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
                <li><a class="menu__item" href="/">HOME</a></li>
                <li><a class="menu__item" href="events">EVENTS</a></li>
                <li><a class="menu__item" href="cert-test">CERTIFICATES</a></li>
                <li><a class="menu__item" href="attendance">ATTENDANCE</a></li>
                <li><a class="menu__item" href="/">EXIT</a></li>
            </ul>
        </div>

        <div class="nav">
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="events">EVENTS</a></li>
                <li><a href="cert-test">CERTIFICATES</a></li>
                <li><a href="attendance">ATTENDANCE</a></li>
                <li><a href="/">EXIT</a></li>
            </ul>
        </div>
    </div>
    <hr>
    <?= form_open('preregister'); ?>
    <div class="content">
        <?php foreach ($seminars as $card): ?>
                <div class="cards">
                    <div class="card">
                        <input type="hidden" name="id" value="<?= $card['id']; ?>">
                        <div class="card__content">
                            <div class="card__title">
                                <?= $card['title']; ?>
                            </div>
                            <p class="card__text">
                                <?php if (isset($card['registeredBy'])): ?>
                                    <p>Created By:
                                        <b>
                                            <?php echo $card['registeredBy']; ?>
                                        </b>
                                    </p>
                            <?php endif; ?>
                            <br>
                            <?= $card['venue']; ?>
                            <br>
                            <?= $card['date']; ?>
                            </p>
                            <button type="submit" class="btn">Pre-Register</button>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
    </form>
</body>

</html>