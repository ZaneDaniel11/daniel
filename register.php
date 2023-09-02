<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>

    <button><a href="login.php">log in</a></button>
</body>
</html>
<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'store_database';

$connection = new mysqli($host, $username, $password, $database);


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $check_result = $connection->query($check_query);

    if ($check_result->num_rows > 0) {
        echo "Username exists. Please choose a different one.";
    } else {
       
        $insert_query = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
        
        $result = mysqli_query($connection,$insert_query);
        if($result)
        {
            echo'created Succesfully';
        }
    }
}

$connection->close();
?>
