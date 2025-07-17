<?php
session_start();

// (Optional during development)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// DB Connection
$conn = new mysqli("localhost", "root", "", "greens");
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$updates = [];
$messages = [];

// Update Days
if (isset($_POST['days']) && $_POST['days'] !== "") {
   $days = $conn->real_escape_string($_POST['days']);
   $updates[] = "workshop_days = '$days'";
   $messages[] = "Days updated successfully!";
}

// Update From Date
if (isset($_POST['from_date']) && $_POST['from_date'] !== "") {
   $from_date = $conn->real_escape_string($_POST['from_date']);
   $updates[] = "from_date = '$from_date'";
   $messages[] = "Date updated successfully!";
}

// Update To Date
if (isset($_POST['to_date']) && $_POST['to_date'] !== "") {
   $to_date = $conn->real_escape_string($_POST['to_date']);
   $updates[] = "to_date = '$to_date'";
   $messages[] = "";
}

// Final Update Query
if (!empty($updates)) {
   $sql = "UPDATE settings SET " . implode(', ', $updates) . " WHERE id = 1";

   if ($conn->query($sql) === TRUE) {
      $_SESSION['update_messages'] = $messages;
      header("Location: syllabus.php");
      exit();
   } else {
      echo "❌ Error updating record: " . $conn->error;
   }
} else {
   echo "⚠️ No input values received.";
}

$conn->close();
?>
