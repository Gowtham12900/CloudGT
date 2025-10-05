<?php
session_start();

if (!isset($_SESSION['admin_email'])) {
    echo "<script>alert('Please login to access'); window.location.href='index.php';</script>";
    exit;
}

$conn = new mysqli("localhost", "root", "", "greens");

if (isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id'];

   
    $stmt_fetch = $conn->prepare("SELECT payment_screenshot FROM bookings WHERE id = ?");
    $stmt_fetch->bind_param("i", $delete_id);
    $stmt_fetch->execute();
    $stmt_fetch->bind_result($payment_screenshot);
    $stmt_fetch->fetch();
    $stmt_fetch->close();

    
    if (!empty($payment_screenshot) && file_exists('../'.$payment_screenshot)) {
        unlink('../'.$payment_screenshot);
    }

    
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
