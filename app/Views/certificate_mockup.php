<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/certificate.css">
</head>

<body>
    <h1>Certificate Mockup</h1>
    <div class="container">
        <div class="background-img"></div>
        <div class="main-contents">

            <div class="header">
                <div class="edukasyon">
                    <img class="edukasyon-logo" src="images\cert-images\cert-edukasyon.png"
                        alt="kagawaran ng edukasyon">
                </div>
                <div class="republic">Republic of the Philippines</div>
                <div class="department">Department of Education</div>
                <div class="region">REGION I</div>
                <div class="division">SCHOOLS DIVISION OF ILOCOS NORTE</div>
                <div class="laoag">Laoag City, Ilocos Norte</div>
            </div>

            <div class="contents">
                <div class="certificate">Certificate of Participation</div>
                <div class="awarded">is awarded to</div>
                <div class="name">
                    <?= $data['name']; ?>
                </div>
                <div class="participation">for his/her active participation during the</div>
                <div class="seminar">
                    <?= $seminar['title']; ?>
                </div>
                <div class="venue">held at <b>
                        <?= $seminar['venue']; ?>
                    </b> on <br><br>
                    <?= $seminar['date']; ?>
                </div>
            </div>

            <div class="signature">
                <img src="images\cert-images\cert-sign.png">
            </div>

            <div class="footer">
                <div class="atty">ATTY. DONATO D. BALDERAS, JR.</div>
                <div class="sds">Schools Division Superintendent</div>
                <div class="logos">
                    <img class="deped-logos" src="images\cert-images\cert-logos.png" alt="cert-logos">
                    <div class="qr-tab">
                        <img class="qr-code" src="images\cert-images\cert-qr.png">
                        <div class="unique-code">
                            <?= $data['code']; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>