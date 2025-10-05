<?php
$conn = new mysqli("localhost", "root", "", "greens");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])){
    $id = (int)$_GET['id'];

    $sql = "DELETE FROM upi_table WHERE id=$id";
    if($conn->query($sql)){
        echo "<script>
                alert('UPI ID successfully deleted!');
                window.location.href='payment.php'; // Replace with your admin page
              </script>";
        exit;
    } else {
        echo "Error: ".$conn->error;
    }
} else {
    echo "<script>
            alert('Invalid Request!');
            window.location.href='payment.php';
          </script>";
    exit;
}
?>
