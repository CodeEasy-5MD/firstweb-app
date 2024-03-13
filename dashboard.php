<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    $sname= "localhost";
    $unmae= "root";
    $password = "";
    $db_name = "esaccodb";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);

    if (!$conn) {

    echo "Connection failed!";
}

    $userId = $_SESSION['id'];

    // Fetch the Sacco information for the logged-in user
    $sql = "SELECT sacco FROM users WHERE id = '$userId'";
    $result = $conn->query($sql);
    
    $sacco = "Unknown Sacco"; // Default value if the Sacco is not found

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $sacco = $row['sacco'];
    }

    // Close the database connection
    $conn->close();

    ?>

    <!DOCTYPE html>
    <html>
    <head>
    
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="dash.css">
    </head>
    <body>

    <div class="top-right">
    <p>Welcome, <?php echo $_SESSION['user_name']; ?>! - Sacco: <?php echo $sacco; ?></p>
        <a class="link-button" href="dashboard.php">Home</a>
        <a class="link-button" href="signup.php">Signup</a>
        <a class="link-button" href="logout.php">Logout</a>
    </div>
    <div class="background-image">
        <div class="content">
            <h1>Welcome to Our Website</h1>
            <p>E-SACCO helps vehicle owners keep track of their vehicle information for efficiency purposes. We've got you!</p> 
            <div class="dcontainer">

            <a href="vehinfo.php">
            <button class="button">Vehicle Information</button></a>
            
            
                
            </div>
        </div>
    </div>

    </body>
    </html>
    <?php

}
else{
    header('Location:index.php');
    exit();
}