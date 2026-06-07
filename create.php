<?php 
include('db.php'); 

if (isset($_POST['submit'])) {
    $flight_number = $_POST['flight_number'];
    $airline = $_POST['airline'];
    $departure_city = $_POST['departure_city'];
    $arrival_city = $_POST['arrival_city'];
    $departure_time = $_POST['departure_time'];

    $sql = "INSERT INTO flights (flight_number, airline, departure_city, arrival_city, departure_time) 
            VALUES ('$flight_number', '$airline', '$departure_city', '$arrival_city', '$departure_time')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Flight</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow">
            <div class="card-header bg-primary text-white"><h4>Add New Flight Record</h4></div>
            <div class="card-body">
                <form action="create.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Flight Number</label>
                        <input type="text" name="flight_number" class="form-control" placeholder="e.g. PK-306" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Airline</label>
                        <input type="text" name="airline" class="form-control" placeholder="e.g. PIA" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Departure City</label>
                        <input type="text" name="departure_city" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Arrival City</label>
                        <input type="text" name="arrival_city" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Departure Date & Time</label>
                        <input type="datetime-local" name="departure_time" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success w-100">Save Flight</button>
                    <a href="index.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>