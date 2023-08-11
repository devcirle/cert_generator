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
    <div class="content">
        <ul class="cards">
            <li class="cards__item">
                <div class="card">
                    <div class="card__image card__image--fence"></div>
                    <div class="card__content">
                        <div class="card__title">Flex</div>
                        <p class="card__text">This is the shorthand for flex-grow, flex-shrink and flex-basis combined. The second and third parameters (flex-shrink and flex-basis) are optional. Default is 0 1 auto. </p>
                        <button class="btn btn--block card__btn">Button</button>
                    </div>
                </div>
            </li>
            <li class="cards__item">
                <div class="card">
                    <div class="card__image card__image--river"></div>
                    <div class="card__content">
                        <div class="card__title">Flex Grow</div>
                        <p class="card__text">This defines the ability for a flex item to grow if necessary. It accepts a unitless value that serves as a proportion. It dictates what amount of the available space inside the flex container the item should take up.</p>
                        <button class="btn btn--block card__btn">Button</button>
                    </div>
                </div>
            </li>
            <li class="cards__item">
                <div class="card">
                    <div class="card__image card__image--record"></div>
                    <div class="card__content">
                        <div class="card__title">Flex Shrink</div>
                        <p class="card__text">This defines the ability for a flex item to shrink if necessary. Negative numbers are invalid.</p>
                        <button class="btn btn--block card__btn">Button</button>
                    </div>
                </div>
            </li>
            <li class="cards__item">
                <div class="card">
                    <div class="card__image card__image--flowers"></div>
                    <div class="card__content">
                        <div class="card__title">Flex Basis</div>
                        <p class="card__text">This defines the default size of an element before the remaining space is distributed. It can be a length (e.g. 20%, 5rem, etc.) or a keyword. The auto keyword means "look at my width or height property."</p>
                        <button class="btn btn--block card__btn">Button</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</body>

</html>