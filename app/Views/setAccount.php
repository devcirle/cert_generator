<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@700&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <!-- <link rel=stylesheet href="css/headerstyle.css">
    <link rel=stylesheet href="css/global.css"> -->
    <link rel=stylesheet href="css/admin.css">

    <title>Document</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="images\logos.png" alt="DepEd">
            <div class="title">ACCOUNT</div>
        </div>
        <div class="container">
            <nav>
                <ul>
                    <li class="tabs"><a href="datatable">HOME</a></li>
                    <li class="tabs"><a href="#">EVENTS</a></li>
                    <li class="tabs"><a>ACCOUNT</a>
                        <ul>
                            <li><a id="list" href="addAccount">CREATE ACCOUNT</a></li>
                            <li><a id="list" href="updateAccount">RETRIEVE ACCOUNT</a></li>
                            <li><a id="list" href="setAccount">RESTRICT ACCOUNT</a></li>
                        </ul>
                    </li>
                    <li class="tabs"><a href="home">LOGOUT</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <br>
    <br>
    <br>
    <br>
    <br>

    <?= form_open('setAccount'); ?>
    <table id="datatable" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Role</th>
                <th>Account Status</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td>
                        <?= $row['name']; ?>
                    </td>
                    <td name="username">
                        <?= $row['username']; ?>
                    </td>

                    <td>
                        <?php
                        if ($row['role'] == "1") {
                            echo "Admin";
                        } elseif ($row['role'] == "2") {
                            echo "Program Owner";
                        } else {
                            echo "Account Locked";
                        }
                        ?>
                    </td>

                    <td>
                        <?php
                        if ($row['role'] == 1) { ?>
                            <input type="radio" id="admin_<?= $row['id']; ?>" name="role[<?= $row['id']; ?>]" value="1"
                                <?= $row['role'] == 1 ? 'checked' : ''; ?>>
                            <label for="admin_<?= $row['id']; ?>">Admin</label>
                            <input type="radio" id="account_locked_<?= $row['id']; ?>" name="role[<?= $row['id']; ?>]"
                                value="-1" <?= $row['role'] == -1 ? 'checked' : ''; ?>>
                            <label for="account_locked_<?= $row['id']; ?>">Account Locked</label>
                            <?php
                        } elseif ($row['role'] == 2 or $row['role'] < 0) { ?>
                            <input type="radio" id="program_owner_<?= $row['id']; ?>" name="role[<?= $row['id']; ?>]" value="2"
                                <?= $row['role'] == 2 ? 'checked' : ''; ?>>
                            <label for="program_owner_<?= $row['id']; ?>">Program Owner</label>

                            <input type="radio" id="account_locked_<?= $row['id']; ?>" name="role[<?= $row['id']; ?>]"
                                value="-1" <?= $row['role'] == -1 ? 'checked' : ''; ?>>
                            <label for="account_locked_<?= $row['id']; ?>">Account Locked</label>
                            <?php
                        }
                        ?>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="buttons">
        <button type="submit" id="roleChangeButton">Save Changes</button>
    </div>

    </form>


    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });

        // Add a confirmation dialog before submitting the form
        document.getElementById("roleChangeButton").addEventListener("click", function (event) {
            var confirmed = confirm("Are you sure you want to save the changes?");
            if (!confirmed) {
                event.preventDefault(); // Cancel form submission
            }
        });

    </script>

</body>

</html>