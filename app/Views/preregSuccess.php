<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/success.css">
    <link rel="stylesheet" href="/css/global.css">
    <title>Registration Success</title>
</head>

<body>
    <div class="message">

        <div class="success-checkmark">
            <div class="check-icon">
                <span class="icon-line line-tip"></span>
                <span class="icon-line line-long"></span>
                <div class="icon-circle"></div>
                <div class="icon-fix"></div>
            </div>
        </div>
        <div class="sdoincode">
            <?= $data['cert_no']; ?>
        </div>


        <p class="bottomtxt">This will serve as your attendance code and <br> for retrieving your certificate</p>
        <div class="homebtn">
            <button class="print" id="print-button">Backup as PDF</button>
            <button class="home"><a href="/">Back to Home</a></button>

        </div>
    </div>

    <script>
        const printButton = document.getElementById('print-button');
        const printContent = document.querySelector('.sdoincode');

        printButton.addEventListener('click', () => {
            const printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Print</title></head><body>');
            printWindow.document.write(printContent.innerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
</body>

</html>