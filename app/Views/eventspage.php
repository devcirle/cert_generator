<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel=stylesheet href="css/eventspage.css">
    <link rel=stylesheet href="css/headerstyle.css">
    <link rel=stylesheet href="css/global.css">

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
    <?= form_open('preregister'); ?>
    <div class="content">
        <?php foreach ($seminars as $card) : ?>
            <div class="cards">
                <div class="card">
                    <input type="hidden" name="id" value="<?= $card['id']; ?>">
                    <div class="card__content">
                        <div class="title-wrapper">
                            <div class="card__title">
                                <?= $card['title']; ?>
                            </div>
                        </div>
                        <p class="card__text">
                            <?php if (isset($card['registeredBy'])) : ?>
                        <p>Created By:
                            <b>
                                <?php echo $card['registeredBy']; ?>
                            </b>
                        </p>
                    <?php endif; ?>
                    <br>
                    <?= $card['venue']; ?>
                    <br>
                    <?php
                    $seminarDates = json_decode($card['date']);
                    // Convert dates to DateTime objects
                    $dateObjects = array_map(function ($date) {
                        return new DateTime($date);
                    }, $seminarDates);

                    $startDate = reset($dateObjects);
                    $endDate = end($dateObjects);

                    $formattedStartDate = $startDate->format('F j');
                    $formattedEndDate = $endDate->format('F j, Y');

                    if ($startDate->format('m') !== $endDate->format('m')) {
                        $formattedDateRange = $formattedStartDate . '-' . $formattedEndDate;
                    } else {
                        $formattedDateRange = $startDate->format('F d') . '-' . $endDate->format('d, Y');
                    }

                    echo $formattedDateRange;
                    ?>
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