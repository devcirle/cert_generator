<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/seminarhomepage.css">
        <script src="js/seminarhomepage.js"></script>
    </head>
    <body>
        
    <div class="card-container">
        <div class="card" onclick="showDetails(1)">
            <h2>Seminar 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod convallis velit.</p>
        </div>
    </div>

    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" onclick="hideDetails()">&times;</span>
            <h2 id="popup-title"></h2>
            <p id="popup-text"></p>
            <a href="adminsignup">Pre-Register</a>
        </div>
    </div>

    <div class="card-container">
        <?php foreach ($data as $card): ?>
        <div class="card" onclick="showDetails('<?php echo $card['title']; ?>', '<?php echo $card['venue']; ?>')">
            <h2><?php echo $card['title']; ?></h2>
            <p><?php echo $card['venue']; ?></p>
        </div>
        <?php endforeach; ?>
    </div>

    </body>
</html>