<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up Page</title>
</head>
<body>
    <div>
        <div>
            <div>
                <h2>Register User</h2>
                <?php if(isset($validation)):?>
                <div>
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <form action="<?php echo base_url(); ?>public/SignupController/store" method="post">
                    <div>
                        <input type="text" name="username" placeholder="Username" value="<?= set_value('username') ?>" class="form-control" >
                    </div>
                    <div>
                        <select name="role">
                            <option>Admin</option>
                            <option>Program Owner</option>
                        </select>
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    <div>
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
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