<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css">
    <title>Data Table</title>
</head>
<body>
    <h1>Vehicle Information</h1>

    <table>
        <thead>
            <tr>
                <th>Vehicle Make</th>
                <th>Vehicle Number Plate</th>
                <th>Vehicle Capacity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('connectdb.php');

            $sql = "SELECT vehicle_plate_number, passenger_capacity, vehicle_make FROM reg_vehicle";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["vehicle_make"] . "</td>";
                    echo "<td>" . $row["vehicle_plate_number"] . "</td>";
                    echo "<td>" . $row["passenger_capacity"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
