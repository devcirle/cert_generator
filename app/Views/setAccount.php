<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>

    <title>Document</title>
</head>

<body>
    <h1>Restrict Account</h1>
    <?= form_open('setAccount'); ?>
    <table id="datatable" class="display">
        <thead>
            <tr>
                <th>Username</th>
                <th>Role</th>
                <th>Account Status</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
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