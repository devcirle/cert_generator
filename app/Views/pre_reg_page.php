<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pre-Register Page</title>
</head>
<body>
    <div>
        <div>
            <div>
                <h2>User Pre-Registration</h2>
                <?php if(isset($validation)):?>
                <div>
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <?= form_open('SignupController/create'); ?>
                    <div>
                        <input type="text" name="district" placeholder="District">
                    </div>
                    <div>
                        <input type="text" name="school" placeholder="School">
                    </div>
                    <div>
                        <input type="text" name="name" placeholder="Name">
                    </div>
                    <div>
                        <input type="text" name="position" placeholder="Position">
                    </div>
                    <div>
                        <input type="text" name="contact" placeholder="Contact">
                    </div>
                    <div>
                        <select>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-dark">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>