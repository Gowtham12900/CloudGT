<?php
$conn = new mysqli("localhost", "root", "", "greens");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['upi_id'])){
    $upi_id = $conn->real_escape_string($_POST['upi_id']);

    // Check if exists (update latest or insert new)
    $sql_check = "SELECT id FROM upi_table ORDER BY id DESC LIMIT 1";
    $res = $conn->query($sql_check);

    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $id = $row['id'];
        $sql = "UPDATE upi_table SET upi_id='$upi_id', created_at=NOW() WHERE id=$id";
    } else {
        $sql = "INSERT INTO upi_table (upi_id) VALUES ('$upi_id')";
    }

    if($conn->query($sql)){
        
        echo "<script>
                alert('UPI ID successfully added!');
                window.location.href='payment.php';
              </script>";
        exit;
    } else {
        echo "Error: ".$conn->error;
    }
}
?>

