<?php
session_start();


if (!isset($_SESSION['admin_email'])) {
    echo "<script>alert('Please login to access'); window.location.href='index.php';</script>";
    exit;
}


$conn = new mysqli("localhost", "root", "", "greens");


if (isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id'];

    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        echo "<script>alert('Booking deleted successfully.'); window.location.href='booking.php';</script>";
    } else {
        echo "<script>alert('Error deleting booking.'); window.location.href='booking.php';</script>";
    }

    $stmt->close();
}
?>
