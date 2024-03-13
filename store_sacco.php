<?php
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "esaccodb";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}

// Get the selected Sacco from the AJAX request
if (isset($_POST['sacco'])) {
    $saccoName = $_POST['sacco'];

    // Escape and sanitize the input before using in the SQL query
    $saccoName = $conn->real_escape_string($saccoName);

    // Insert the selected Sacco into the 'users' table
    $sql = "INSERT INTO users (sacco) VALUES ('$saccoName')";
    if ($conn->query($sql) === TRUE) {
        echo "Sacco stored successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
