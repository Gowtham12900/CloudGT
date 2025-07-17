<?php
session_start();


$conn = new mysqli("localhost", "root", "", "greens");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name     = $_POST['name'];
$number   = $_POST['number'];
$location = $_POST['location'];
$course   = $_POST['course'];

$sql = "INSERT INTO bookings (name, number, location, course) VALUES ('$name', '$number', '$location', '$course')";
$conn->query($sql);
$conn->close();


$_SESSION['popup_name'] = $name;


header("Location: index.php");
exit();
?>
