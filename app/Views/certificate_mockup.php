<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/certificate.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

    <!-- <style>
        .container {
            position: relative;
            width: 559.29px;
            height: 794.49px;
        }

        .background-img {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url('images/cert-images/cert-bg.png');
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

        .main-contents .header,
        .main-contents .contents,
        .main-contents .footer,
        .signature {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .header {
            padding-top: 58.66px;
        }

        .republic {
            padding-top: 9.024px;
        }

        .certificate {
            padding-top: 20.16px;
            color: #085296;
        }

        .awarded,
        .name,
        .participation,
        .seminar,
        .venue,
        .date {
            padding-top: 15px;
        }

        /*
.atty{
    padding-top: 132px;
}
*/


        .republic,
        .department {
            font-family: 'Old English Text MT';
        }

        .region {
            font-family: 'Trajan Pro';
        }

        .division,
        .laoag {
            font-family: 'Tahoma';
        }

        .certificate {
            font-family: 'Blacksword';
        }

        .awarded,
        .name,
        .participation,
        .seminar,
        .venue,
        .date,
        .footer {
            font-family: 'Bookman Old Style';
        }

        .region,
        .division,
        .laoag {
            font-size: 8pt;
        }

        .awarded,
        .participation,
        .venue,
        .footer,
        .date {
            font-size: 10pt;
        }

        .republic,
        .seminar {
            font-size: 11pt;
        }

        .department {
            font-size: 14pt;
        }

        .name {
            font-size: 16pt;
        }

        .certificate {
            font-size: 32pt;
        }

        .header,
        .footer {
            font-weight: bold;
        }

        .awarded,
        .name,
        .participation,
        .seminar,
        .venue,
        .date {
            font-style: italic;
        }

        .edukasyon-logo {
            width: 74.112px;
            height: 74.112px;
        }

        .deped-logos {
            width: 363.84px;
            height: 51.65px;
        }

        .qr-code {
            width: 52.8px;
            height: 52.8px;
        }

        .seminar,
        .venue,
        .name {
            max-width: 400px;
            text-align: center;
        }

        .footer {
            position: absolute;
            bottom: 65px;
            width: 100%;
        }

        .signature {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .signature img {
            max-width: 25%;
            /* Set your desired maximum width, for example, 80% */
            max-height: 25%;
            /* Set your desired maximum height, for example, 80% */
            object-fit: contain;
            /* Adjust the object-fit property to control how the image is displayed */
            z-index: 1;
            padding-top: 490px;
        }

        .logos {
            display: flex;
            justify-content: center;
            align-content: center;
        }

        .qr-tab {
            display: flex;
            justify-content: center;
            align-content: center;
            flex-direction: column;
            padding-left: 19.36px;
        }

        .unique-code {
            background-color: white;
            font-size: 5pt;
        }
    </style> -->
</head>

<body>
    <!-- <h1 class="mockup">Certificate Mockup</h1> -->
    <div class="wrapper">
        <div class="container" id="capture-me">
            <div class="background-img"><img class="background-img" src="images/cert-images/cert-bg.png"></div>
            <div class="main-contents">

                <div class="header">
                    <div class="edukasyon">
                        <img class="edukasyon-logo" src="images\cert-images\cert-edukasyon.png" alt="kagawaran ng edukasyon">
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
    </div>

    <button id="capture-button">Capture</button>

    <div id="captured-image"></div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const captureButton = document.getElementById('capture-button');
            const elementToCapture = document.getElementById('capture-me');

            captureButton.addEventListener('click', async () => {
                try {
                    const scale = 2; // Increase the scale for higher image quality
                    const contentWidth = elementToCapture.offsetWidth;
                    const contentHeight = elementToCapture.offsetHeight;

                    const canvas = document.createElement('canvas');
                    const dpi = 300; // DPI for printing

                    const a4Width = 8.27 * dpi; // A4 paper width in pixels
                    const a4Height = 11.69 * dpi; // A4 paper height in pixels

                    const scaleFactor = Math.min(a4Width / contentWidth, a4Height / contentHeight);

                    canvas.width = a4Width;
                    canvas.height = a4Height;

                    const canvasContext = canvas.getContext('2d');
                    canvasContext.scale(scaleFactor, scaleFactor);

                    await html2canvas(elementToCapture, {
                        canvas: canvas,
                    });

                    // Create a data URL and trigger a download
                    const dataURL = canvas.toDataURL('image/png');
                    const link = document.createElement('a');
                    link.href = dataURL;
                    link.download = 'captured_image.png'; // Set the file name
                    link.click();
                } catch (error) {
                    console.error('An error occurred:', error);
                }
            });
        });
    </script>

    <!-- <button id="printButton">Print Certificate</button>

    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            printCertificate();
        });

        function printCertificate() {
            var printWindow = window.open('', '_blank');
            var printContent = document.querySelector('.container').outerHTML;

            // Customize the print styles including A4 size and targeting .container
            printContent += '<style>';
            printContent += '/* Custom print styles */';
            printContent += '.container { width: 100%; height: 100vh; }'; // Cover entire A4 page
            printContent += '@page { size: A4; }'; // Set A4 paper size
            printContent += '</style>';

            printWindow.document.open();
            printWindow.document.write(printContent);
            printWindow.document.close();

            // Wait for the window to finish loading before printing
            printWindow.onload = function() {
                printWindow.print();
                printWindow.close();
            };
        }
    </script> -->
</body>

</html>