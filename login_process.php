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

 
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $connection->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: newinder.php");
        exit();
    } else {
        echo "Invalid username or password. Please try again.";
    }
}

$connection->close();
?>
