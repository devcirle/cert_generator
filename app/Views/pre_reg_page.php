<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/pre_reg_page.css">
    <link rel="stylesheet" href="css/global.css">
    <title>Pre-Register Page</title>
</head>

<body>
    <div class="card">
        <div class="container">
            <header>
                <img src="images/sdoin.png" alt="">EVENT<br>PRE-REGISTRATION <img src="images/kagawaran.png" alt="">
            </header>
            <?php if (isset($validation)): ?>
                <div>
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>
            <?= form_open('preregister/success') ?>

            <div class="content">
                <!-- test -->
                <input type="hidden" name="seminar" value="<?= $data['seminarId']; ?>">
                <!-- test -->
                <label for="Name">Name</label>
                <input type="text" name="name"
                    value="<?= isset($_SESSION['prev_name']) ? $_SESSION['prev_name'] : '' ?>" />
                <label for="District">District</label>
                <input type="text" name="district" pattern=".{6,}" title="Please enter at least 6 characters." />
                <label for="School">School</label>
                <input type="text" name="school"
                    value="<?= isset($_SESSION['prev_school']) ? $_SESSION['prev_school'] : '' ?>" />
                <label for="Age">Age</label>
                <input type="number" name="age"
                    value="<?= isset($_SESSION['prev_age']) ? $_SESSION['prev_age'] : '' ?>" />
                <label for="Position">Position</label>
                <input type="text" name="position"
                    value="<?= isset($_SESSION['prev_position']) ? $_SESSION['prev_position'] : '' ?>" />
                <label for="Contact">Contact</label>
                <input type="text" name="contact"
                    value="<?= isset($_SESSION['prev_contact']) ? $_SESSION['prev_contact'] : '' ?>" />

            </div>
            <div class="gender-container">
                <label for="Gender">Gender</label>
                <input type="radio" name="gender" value="Male" checked>
                Male
                <input type="radio" name="gender" value="Female">
                Female
                </br>
                </select>
            </div>
            <div class="register">
                <button type="submit" class="btn reg">PRE-REGISTER</button>
                <button type="cancel" class="btn cancel">CANCEL</button>
            </div>
            </form>
        </div>
    </div>
</body>
<script src="js/pre_reg_page.js"></script>

</html>