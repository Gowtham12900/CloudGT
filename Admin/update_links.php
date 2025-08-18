<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = $_POST['course_name'];
    $link = $_POST['link_value'];

    // Insert or Update the group link for the specific course
    $stmt = $conn->prepare("INSERT INTO whatsapp_links (course_name, group_link) 
        VALUES (?, ?) ON DUPLICATE KEY UPDATE group_link = VALUES(group_link)");
    $stmt->bind_param("ss", $course, $link);
    $stmt->execute();

    echo "<script>alert('Link for $course updated successfully!'); window.location.href='whatsapp.php';</script>";
}
?>
