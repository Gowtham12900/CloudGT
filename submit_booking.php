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

// Booking insert
$sql = "INSERT INTO bookings (name, number, location, course) VALUES ('$name', '$number', '$location', '$course')";
$conn->query($sql);

// Store name for popup
$_SESSION['popup_name'] = $name;

// Fetch WhatsApp group link
$group_link = '';
$link_sql = "SELECT group_link FROM whatsapp_links WHERE course_name = ?";
$stmt = $conn->prepare($link_sql);
$stmt->bind_param("s", $course);
$stmt->execute();
$stmt->bind_result($group_link);
$stmt->fetch();
$stmt->close();
$conn->close();

// Store WhatsApp link in session
if (!empty($group_link)) {
    $_SESSION['popup_whatsapp'] = $group_link;
} else {
    $_SESSION['popup_whatsapp'] = null;
}

// Redirect back to index.php
header("Location: index.php");
exit();
?>
