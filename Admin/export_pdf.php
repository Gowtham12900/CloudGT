<?php
require_once('tcpdf/tcpdf.php'); // TCPDF include

$conn = new mysqli("localhost", "root", "", "greens");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 🔁 Query bookings data
$sql = "SELECT * FROM bookings ORDER BY id ASC";
$result = $conn->query($sql);

// 📝 New PDF create
$pdf = new TCPDF();
$pdf->AddPage();

// 🖊️ Title
$pdf->SetTextColor(0, 128, 128); // Teal color
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Greens Bookings Report', 0, 1, 'C');

// 📋 Table Start
$pdf->SetTextColor(0, 0, 0); // Teal color
$pdf->SetFont('helvetica', '', 10);

$html = '<table border="1" cellpadding="5">
            <thead>
                <tr style="background-color:#d3d3d3;">
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Location</th>
                    <th>Course</th>
                    <th>Booked At</th>
                </tr>
            </thead><tbody>';

$sno = 1;
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= "<tr>
                    <td>{$sno}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['number']}</td>
                    <td>{$row['location']}</td>
                    <td>{$row['course']}</td>
                    <td>{$row['created_at']}</td>
                </tr>";
        $sno++;
    }
} else {
    $html .= "<tr><td colspan='6'>No Bookings Found</td></tr>";
}
$html .= '</tbody></table>';

$pdf->writeHTML($html, true, false, true, false, '');

// 🔽 Download trigger
$pdf->Output('bookings.pdf', 'D'); // D = force download

$conn->close();
?>
