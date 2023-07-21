<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    
    <style>
        body {
            background-color: blue;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: white;
            border-radius: 10px;
        }
        .user, .pass, .role {
            padding-top: 20px;
        }
        .title, .buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

    </style>

</head>
<body>
    
    <form method="POST" action="<?= site_url('register') ?>">
        <div class="container">
            <div class="title">
                <div>
                    <h2>SEMINAR/TRAINING</h2>
                </div>
                <div>
                    <h2>SYSTEM ADMIN</h2>
                </div>
            </div>
            <div class="user">
                <input type=text id="username" name="username" required>
            </div>
            <div class="pass">
                <input type=password id="password" name="password" required>
            </div>
            
            <div class="role">
                <select id="role" name="role">
                    <option value="Admin">Admin</option>
                    <option value="Program Owner">Program Owner</option>
                </select>
            </div>
            <div class="buttons">
                <div>
                    <button type=submit>Register</button>
                </div>
            </div>
        </div>
    </form>

</body>
</html>

