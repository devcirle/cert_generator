<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

    <style>
        @font-face {
            font-family: 'Bookman Old Style';
            src: url('fonts/bookman.ttf') format('ttf');
        }

        body {
            font-family: 'Bookman Old Style';
            background: #f3f3f3;
            margin: 0 auto;
            width: 794px;
        }

        .signature {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }



        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 794px;
            margin: 0 auto;
        }

        #download-button {



            font-size: 1.2rem;
            background: #101541;
            border: none;
            border-radius: 0.5rem;
            font-weight: bold;
            color: #fff;
            margin: 2rem;
            padding: 1rem;

        }

        #download-button:hover {
            cursor: pointer;
            background: #41c3ca;
        }

        .body-bg {
            /* background-image: url('images/cert.png'); */
            position: relative;
            width: 794px;
            height: 1122px;
            margin: 0 auto;

            /* left: -9999px; */


        }

        .img-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Maintain aspect ratio and cover container */
            z-index: -1;
        }

        .body-content {
            padding: 30rem 0rem 1rem 0rem;
        }

        .name {
            padding: 0 7rem 0 7rem;
        }

        .name,
        .participation,
        .seminar,
        .venue,
        .given-date,
        .position {
            display: flex;
            justify-content: center;
        }

        .seminar {
            display: flex;
            flex-direction: column;
        }

        .seminar,
        .venue,
        .given-date,
        .position {
            text-align: center;
        }

        .name {
            font-family: "Century Gothic", sans-serif;
            font-weight: 900;
            font-size: 30pt;
            text-transform: uppercase;
            text-align: center;
        }

        .participation {
            margin: 10px 0 20px 0;
        }

        .seminar-title {
            font-weight: bold;
            font-size: 18pt;
            font-family: 'Bookman Old Style';

        }

        .seminar-title,
        .venue,
        .given-date {
            padding: 0 9rem 0 9rem;
        }

        .position {
            font-size: 12pt;
            font-weight: bold;


            position: absolute;
            top: 940px;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .sds {
            font-size: 16pt;
            font-weight: bold;
            position: absolute;
            /* top: 908px;
            left: 250px; */
            top: 82%;
            left: 50%;
            /* Translate the element back by half of its width and height */
            transform: translate(-50%, -50%);
        }

        .signature img {
            width: 200px;
            position: absolute;
            /* top: 908px;
            left: 250px; */
            top: 81%;
            left: 50%;
            /* Translate the element back by half of its width and height */
            transform: translate(-50%, -50%);
        }

        .unique-code {
            font-family: Tahoma, sans-serif;
            position: absolute;
            top: 63.5rem;
            left: 39.45rem;
            font-weight: 900;
            font-size: 6.6pt;
            width: 70px;

        }
    </style>
</head>

<body>
    <div class="wrapper">
        <button id="download-button">
            DOWNLOAD CERTIFICATE
        </button>
        <div class="body-bg">
            <img class="img-bg" src="images/cert.png" alt="">
            <div class="body-content">
                <div class="name">
                    <?= $data['name']; ?>
                </div>
                <div class="participation"><i>for his/her active participation during the</i></div>
                <div class="seminar">

                    <div class="seminar-title">
                        <?= $seminar['title']; ?>
                    </div>
                    Program
                </div>
                <br>
                <div class="venue">held at
                    <?= $seminar['venue']; ?>
                    on <br>
                    <?php
                    $seminarDates = json_decode($seminar['date']);
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

                </div>
                <br>
                <br>
                <div class="given-date">
                    <?php
                    $seminarDates = json_decode($seminar['date']);
                    // Convert dates to DateTime objects
                    $dateObjects = array_map(function ($date) {
                        return new DateTime($date);
                    }, $seminarDates);

                    $startDate = reset($dateObjects);
                    $formattedDate = $endDate->format('jS');
                    echo "Given this " . $formattedDate . " day of " . $startDate->format('F, Y');
                    ?>
                    at the<br>
                    <?= $seminar['venue']; ?>
                </div>


            </div>

            <div class="signature">
                <img src="<?= $signature; ?>">
            </div>
            <div class="sds">
                <?= $sds; ?>
            </div>

            <div class="body-chief">
                <div class="position">Schools Division Superintendent</div>
            </div>
            <div class="unique-code">
                <?= $data['code']; ?>
            </div>
        </div>

        <script>
            const captureButton = document.getElementById('download-button');

            captureButton.addEventListener('click', async () => {
                const elementToCapture = document.querySelector('.body-bg');

                const scaleFactor = 5; // Scale factor

                const canvas = await html2canvas(elementToCapture, {
                    scale: scaleFactor
                });

                const dataURL = canvas.toDataURL('image/png');

                const link = document.createElement('a');
                link.href = dataURL;
                link.download = 'SDOIN-certificate.png';
                link.click();
            });
        </script>






    </div>

</body>

</html>