<?php
$servername = 'localhost';
$username = 'root';
$password = ''; // Replace 'your_password' with the actual password
$database = 'regester'; // Replace 'your_database' with the actual database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch data from POST
    $gmail = mysqli_real_escape_string($conn, $_POST["mail"]);
    $password = mysqli_real_escape_string($conn, $_POST["pass"]);

    // Prepare SQL statement
    $sql = "SELECT * FROM form  WHERE email = '$gmail' limit 1";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="Login">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <label>Email</label>
            <input type="email" name="mail" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" name="" value="Submit">
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up Here</a></p>
    </div>        
</body> 
</html>