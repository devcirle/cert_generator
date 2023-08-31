<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin.css">

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

            #datatable_wrapper,
            #datatable_wrapper * {
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
            <div class="title">ADMIN HOME</div>
        </div>
        <div class="container">
            <nav>
                <ul>
                    <li class="tabs"><a href="/ownerdashboard">HOME</a></li>
                    <li class="tabs"><a href="">EVENTS</a></li>
                    <li class="tabs"><a href="/updateData">SET DATA</a></li>
                    <li class="tabs"><a href="/viewOwners">VIEW OWNERS</a></li>
                    <li class="tabs"><a>ACCOUNT</a>
                        <ul>
                            <li><a id="list" href="/addAccount">CREATE ACCOUNT</a></li>
                            <li><a id="list" href="/updateAccount">RETRIEVE ACCOUNT</a></li>
                            <li><a id="list" href="/setAccount">RESTRICT ACCOUNT</a></li>
                        </ul>
                    </li>
                    <li class="tabs"><a href="/home">LOGOUT</a></li>
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
                <th>Status</th>
                <th>Title</th>
                <th>Date</th>
                <th>Venue</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td>
                        <?php
                        switch ($row['status']) {
                            case "0":
                                echo "Ended";
                                break;
                            case "1":
                                echo "Upcoming";
                                break;
                            case "2":
                                echo "Ongoing";
                                break;
                            case "3":
                                echo "Cancelled";
                                break;
                        }
                        ?>
                    </td>
                    <td>
                        <?= $row['title']; ?>
                    </td>
                    <td>
                        <?php
                        $seminarDates = json_decode($row['date']);
                        // Convert dates to DateTime objects
                        $dateObjects = array_map(function ($date) {
                            return new DateTime($date);
                        }, $seminarDates);

                        $startDate = reset($dateObjects);
                        $endDate = end($dateObjects);

                        $formattedStartDate = $startDate->format('F j');
                        $formattedEndDate = $endDate->format('F j, Y');

                        if ($startDate->format('m') !== $endDate->format('m')) {
                            $formattedDateRange = $formattedStartDate . '-' . $formattedEndDate;
                        } else {
                            $formattedDateRange = $startDate->format('F d') . '-' . $endDate->format('d, Y');
                        }

                        echo $formattedDateRange;
                        ?>
                    </td>
                    <td>
                        <?= $row['venue']; ?>
                    </td>
                    <td>
                        <form action="<?= base_url('seminar/viewDetails/' . $row['id']); ?>" method="post">
                            <button type="submit">View Details</button>
                        </form>
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