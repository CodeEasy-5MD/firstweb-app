<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dash.css">

    
    <title>Sign Up</title>
</head>
<body>
    <div class="signup-form">
        <h2>Sign Up</h2>
        <form id="signup-form" action="" method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $sname= "localhost";
        $unmae= "root";
        $password = "";
        $db_name = "esaccodb";
        
        $conn = mysqli_connect($sname, $unmae, $password, $db_name);
        
        if (!$conn) {
            
            echo "Connection failed!";
        }


        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = ($_POST["password"]);

        $sql = "INSERT INTO users (user_name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>console.log('Sign up successful');</script>";
            echo "<script>window.location.href = 'choosesacco.php';</script>";

        } else {
            echo "<script>console.log('Sign up failed');</script>";
        }

        $conn->close();
    }
    ?>
</body>
</html>
