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

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #datatable_wrapper, #datatable_wrapper * {
                visibility: visible;
            }
            #datatable_wrapper {
                position: static;
            }
            br {
                display: none;
            }
        }
    </style>

    <title>Dashboard Admin</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="images\logos.png" alt="DepEd">
            <div class="title">DASHBOARD</div>
        </div>
        <div class="container">
            <nav>
                <ul>
                    <li class="tabs"><a href="datatable">HOME</a></li>
                    <li class="tabs"><a href="#">ACCOUNT</a></li>
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
                <th>Seminar</th>
                <th>Name</th>
                <th>School</th>
                <th>District</th>
                <th>Position</th>
                <th>Contact</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Pre-Reg Date</th>
                <th>Code</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td>
                        <?= $row['seminar']; ?>
                    </td>
                    <td>
                        <?= $row['name']; ?>
                    </td>
                    <td>
                        <?= $row['school']; ?>
                    </td>
                    <td>
                        <?= $row['district']; ?>
                    </td>
                    <td>
                        <?= $row['position']; ?>
                    </td>
                    <td>
                        <?= $row['contact']; ?>
                    </td>
                    <td>
                        <?= $row['gender']; ?>
                    </td>
                    <td>
                        <?= $row['age']; ?>
                    </td>
                    <td>
                        <?= $row['pre_reg']; ?>
                    </td>
                    <td>
                        <?= $row['code']; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>

    </table>
    
    <button id="printButton">Print Data</button>

    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
        document.getElementById('printButton').addEventListener('click', function () {
            window.print();
        });
    </script>
</body>

</html>