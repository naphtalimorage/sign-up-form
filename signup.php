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
    $firstname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lastname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $num = mysqli_real_escape_string($conn, $_POST["number"]);
    $address = mysqli_real_escape_string($conn, $_POST["add"]);
    $gmail = mysqli_real_escape_string($conn, $_POST["mail"]);
    $password = mysqli_real_escape_string($conn, $_POST["pass"]);

    // Prepare SQL statement
    $sql = "INSERT INTO form (fname, lname, gender, cname, address, email, password) VALUES ('$firstname', '$lastname', '$gender', '$num', '$address', '$gmail', '$password')";

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
    <title>sign up</title>
    <link rel="stylesheet" href="style.css">
    <script src="signup.js"></script>
</head>
<body>
    <div class="signup"> 
        <h2>sign up</h2>
        <h4>It's free and only takes a minute</h4>
        <form method="POST">
            <input type="text" name="fname" placeholder="First Name" required>
            <input type="text" name="lname" placeholder="Last Name" required>
            <input type="text" name="gender" placeholder="Gender" required>
            <input type="text" name="number" placeholder="Contact Address" required>
            <input type="text" name="add" placeholder="Address" required>
            <input type="email" name="mail" placeholder="Email" required>
            <input type="password" name="pass" placeholder="Password" required>
            <input type="submit" id="btn" value="Submit">
        </form>
        <p>By clicking the sign up button,You agree to our<br>
        <a href="#">Terms and Condition</a> and<a href="#">Policy</a>
        </p> 
        <p>Already have an account? <a href="login.php">Login Here</a></p>
    </div>
</body>
</html>
