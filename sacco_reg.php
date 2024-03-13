<?php
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "esaccodb";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vehiclePlateNumber = $_POST["vehicle_plate_number"];
    $passengerCapacity = $_POST["passenger_capacity"];
    $vehicleMake = $_POST["vehicle_make"];

    // Insert vehicle information into the database
    $sql = "INSERT INTO reg_vehicle (vehicle_plate_number, passenger_capacity, vehicle_make) 
            VALUES ('$vehiclePlateNumber', '$passengerCapacity', '$vehicleMake')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Vehicle information registered successfully');</script>";
        echo "<script>window.location.href = 'dashboard.php';</script>";

    } else {
        echo "<script>alert('Error registering vehicle information');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dash.css">

    <title>Sacco Dashboard</title>
</head>
<body>

<?php
    $saccoName = isset($_GET['sacco']) ? $_GET['sacco'] : 'Unknown Sacco';
    ?>

    <h2>Welcome to <?php echo $saccoName; ?> Dashboard</h2>

    <h3>Register Vehicle Information</h3>
    <form method="post">
        <label for="vehicle_plate_number">Vehicle Plate Number:</label>
        <input type="text" name="vehicle_plate_number" required><br>

        <label for="passenger_capacity">Passenger Capacity:</label>
        <input type="number" name="passenger_capacity" required><br>

        <label for="vehicle_make">Vehicle Make:</label>
        <input type="text" name="vehicle_make" required><br>

        <button type="submit">Register Vehicle</button>
    </form>
</body>
</html>
