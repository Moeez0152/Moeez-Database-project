<?php 
include('db.php'); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM flights WHERE id=$id");
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $flight_number = $_POST['flight_number'];
    $airline = $_POST['airline'];
    $departure_city = $_POST['departure_city'];
    $arrival_city = $_POST['arrival_city'];
    $departure_time = $_POST['departure_time'];

    $sql = "UPDATE flights SET flight_number='$flight_number', airline='$airline', 
            departure_city='$departure_city', arrival_city='$arrival_city', departure_time='$departure_time' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Flight</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark"><h4>Edit Flight Record</h4></div>
            <div class="card-body">
                <form action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Flight Number</label>
                        <input type="text" name="flight_number" class="form-control" value="<?php echo $row['flight_number']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Airline</label>
                        <input type="text" name="airline" class="form-control" value="<?php echo $row['airline']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Departure City</label>
                        <input type="text" name="departure_city" class="form-control" value="<?php echo $row['departure_city']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Arrival City</label>
                        <input type="text" name="arrival_city" class="form-control" value="<?php echo $row['arrival_city']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Departure Date & Time</label>
                        <input type="datetime-local" name="departure_time" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($row['departure_time'])); ?>" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-warning w-100">Update Flight</button>
                    <a href="index.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>