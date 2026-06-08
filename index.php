<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airport Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>?? Airport Flight Schedule</h2>
            <a href="create.php" class="btn btn-primary">+ Add New Flight</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Flight Number</th>
                            <th>Airline</th>
                            <th>Departure</th>
                            <th>Arrival</th>
                            <th>Date/Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM flights";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td><strong>{$row['flight_number']}</strong></td>
                                    <td>{$row['airline']}</td>
                                    <td>{$row['departure_city']}</td>
                                    <td>{$row['arrival_city']}</td>
                                    <td>{$row['departure_time']}</td>
                                    <td>
                                        <a href='update.php?id={$row['id']}' class='btn btn-sm btn-warning me-1'>Edit</a>
                                        <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this flight?\")'>Delete</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center text-muted'>No flights found. Add some!</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>