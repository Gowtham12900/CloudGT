<?php
$conn = new mysqli("localhost", "root", "", "greens");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Header set pannrom Excel-ku
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=bookings.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "S.No\tName\tNumber\tLocation\tCourse\tBooked At\n";

$sno = 1;
$sql = "SELECT * FROM bookings ORDER BY id ASC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $sno . "\t" .
             $row['name'] . "\t" .
             $row['number'] . "\t" .
             $row['location'] . "\t" .
             $row['course'] . "\t" .
             $row['created_at'] . "\n";
        $sno++;
    }
} else {
    echo "No Data Found";
}

$conn->close();
?>
