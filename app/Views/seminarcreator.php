<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/seminar.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="js/seminar.js"></script>
    <title>seminarcreator</title>
</head>
<body>
<h1>Contact us Today!</h1>
<button id="btnOpenForm">Open Form</button>

<div class="form-popup-bg">
  <div class="form-container">
    <button id="btnCloseForm" class="close-button">X</button>
    <h1>Contact Us</h1>
    <p>For more information. Please complete this form.</p>
    <form action="">
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" />
      </div>
      <div class="form-group">
        <label for="">Company Name</label>
        <input class="form-control" type="text" />
      </div>
      <div class="form-group">
        <label for="">E-Mail Address</label>
        <input class="form-control" type="text" />
      </div>
      <div class="form-group">
        <label for="">Phone Number</label>
        <input class="form-control" type="text" />
      </div>
      <button>Submit</button>
    </form>
  </div>
</div>
</body>
</html>