<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="js/seminar.js"></script>
    <title>Program Owner Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/programowner.css">
    <link rel="stylesheet" href="css/eventspage.css">
    <link rel="stylesheet" href="css/global.css">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <div class="header">
        <div class="logos">
            <img class="logocontainer" src="images/logos.png" alt="">
            <b>DASHBOARD</b>
        </div>

        <div class="nav">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">ACCOUNT</a></li>
                <li><a href="home">LOGOUT</a></li>
            </ul>
        </div>
    </div>
    <hr class="top-hr">
    <div class="event">
        <img class="event-logo" src="" alt="">
        <h1>EVENTS</h1>
        <hr class="event-hr">
    </div>
    
    <div class="ownerContent">
        <div class="add-button">
            <button id="btnOpenForm" class="add-event">+</button>
        </div>
    
        <div class="content">
            <?php foreach ($data as $card): ?>
                    <div class="cards">
                        <div class="card">
                            <div class="card__content">
                                <div class="card__title">
                                    <?= $card['title']; ?>
                                </div>
                                <p class="card__text">
                                    <?= $card['date']; ?>
                                    <br>
                                    <?= $card['venue']; ?>
                                    <br>
                                    <?= $card['status']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>

    

    <div class="form-popup-bg">
        <div class="form-container">
            <form action="SeminarController/create" method="post">
                <div class="title">
                    CREATE NEW EVENT
                </div>
                <hr>
                <div>
                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                </div>

                <label for="title">Event Name:</label>
                <div id="title">
                    <textarea name="title" id="title" cols="30" rows="3"></textarea>
                </div>

                <label for="title">Set Date:</label>
                <div id="date-range">
                    <input type="hidden" id="date" name="date">
                    <input type="text" class="picker" id="dateRangePicker" name="daterange"
                        value="01/01/2023 - 01/15/2023">

                    <script>
                        $(function () {
                            var dateRangePicker = $('#dateRangePicker');
                            dateRangePicker.daterangepicker({
                                opens: 'center',
                                autoUpdateInput: false,
                                locale: {
                                    cancelLabel: 'Clear'
                                },
                                parentEl: "body"
                            });

                            dateRangePicker.on('apply.daterangepicker', function (ev, picker) {
                                var startDate = picker.startDate;
                                var endDate = picker.endDate;

                                var dates = [];
                                var currentDate = moment(startDate);

                                while (currentDate.isSameOrBefore(endDate, 'day')) {
                                    dates.push(currentDate.format('YYYY-MM-DD'));
                                    currentDate.add(1, 'days');
                                }

                                $(this).val(startDate.format('MM/DD/YYYY') + ' - ' + endDate.format('MM/DD/YYYY'));
                                $('#date').val(JSON.stringify(dates));
                            });

                            dateRangePicker.on('cancel.daterangepicker', function (ev, picker) {
                                $(this).val('');
                                $('#date').val('');
                            });
                        });
                    </script>
                </div>
                <label for="venue">Set Venue:</label>
                <div id="venue">
                    <textarea name="venue" id="" cols="30" rows="3"></textarea>
                </div>


                <div class="buttons">
                    <div>
                        <button id="btnCloseForm" class="close-button">CANCEL</button>
                    </div>
                    <div>
                        <button type="submit" class="save-button">SAVE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>