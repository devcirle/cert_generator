<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/seminar.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="js/seminar.js"></script>
    <title>Program Owner Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/daterangepicker.css" />

</head>
<body>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    
    <h1>Program Owner Dashboard</h1>
    
    <div>
        <h3>Title</h3>
        <div>Date</div>
        <div>Venue</div>
        <div>
            <select>
                <option>Status</option>
                <option>Upcoming</option>
                <option>Ongoing</option>
                <option>Ended</option>
            </select>
        </div>
    </div>
    
    <button id="btnOpenForm">Open Form</button>
    
    <div class="form-popup-bg">
        <div class="form-container">
            <form action="SeminarController/create" method="post">
            <button id="btnCloseForm" class="close-button">X</button>
                <div>
                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                </div>
                <div>
                    <input type="text" name="title" placeholder="Seminar Title">
                </div>
                
                <div>
                    <input type="text" name="venue" placeholder="Venue">
                </div>

                <div>
                    <input type="hidden" id="date" name="date">
                    <input type="text" class="picker" id="dateRangePicker" name="daterange" value="01/01/2023 - 01/15/2023">

                    <script>
                        $(function() {
                            var dateRangePicker = $('#dateRangePicker');
                            dateRangePicker.daterangepicker({
                                opens: 'center',
                                autoUpdateInput: false,
                                locale: {
                                    cancelLabel: 'Clear'
                                },
                                parentEl: "body"
                            });

                            dateRangePicker.on('apply.daterangepicker', function(ev, picker) {
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

                            dateRangePicker.on('cancel.daterangepicker', function(ev, picker) {
                                $(this).val('');
                                $('#date').val('');
                            });
                        });
                    </script>
                </div>

                <div>
                    <button type="submit" class="btn btn-success">Set Schedule</button>
                </div>    
            </form>
            </div>
        </div>

</body>
</html>
