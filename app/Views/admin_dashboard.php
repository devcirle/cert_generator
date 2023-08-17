<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>



    <title>Dashboard Admin</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="images\logos.png" alt="DepEd">
            <div class="title">ADMIN HOME</div>
        </div>
        <div class="container">
            <nav>
                <ul>
                    <li class="tabs"><a href="dashboard">HOME</a></li>
                    <li class="tabs"><a href="">EVENTS</a></li>
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
    <br>
    <br>
    <br>
    <br>
    <br>

    <table id="datatable" class="display">
        <thead>
            <tr>
                <th>Owner</th>
                <th>Status</th>
                <th>Title</th>
                <th>Date</th>
                <th>Venue</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td>
                        <?= $row['owner']; ?>
                    </td>
                    <td>
                        <?= $row['status']; ?>
                    </td>
                    <td>
                        <?= $row['title']; ?>
                    </td>
                    <td>
                        <?= $row['date']; ?>
                    </td>
                    <td>
                        <?= $row['venue']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
</body>

</html>