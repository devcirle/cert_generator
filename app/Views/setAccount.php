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
                    <td>
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
                        <select>
                            <option value="<?= $row['role']; ?>" selected><?php
                              if ($row['role'] == "1") {
                                  echo "Admin";
                              } elseif ($row['role'] == "2") {
                                  echo "Program Owner";
                              } else {
                                  echo "Account Locked";
                              }
                              ?></option>
                            <?php
                            if ($row['role'] !== '1') {
                                echo '<option value="1">Admin</option>';
                            }
                            if ($row['role'] !== '2') {
                                echo '<option value="2">Program Owner</option>';
                            }
                            if ($row['role'] !== '-1') {
                                echo '<option value="-1">Account Locked</option>';
                            }
                            ?>
                        </select>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="buttons">
        <button>Cancel</button>
        <button>Save Changes</button>
    </div>

    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
</body>

</html>