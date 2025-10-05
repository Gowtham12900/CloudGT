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


$payment_screenshot = null;
if(isset($_FILES['payment_screenshot']) && $_FILES['payment_screenshot']['error'] == 0){
    $upload_dir = 'uploads/';
    if(!file_exists($upload_dir)){
        mkdir($upload_dir, 0777, true);
    }

    $tmp_name = $_FILES['payment_screenshot']['tmp_name'];
    $file_name = time().'_'.basename($_FILES['payment_screenshot']['name']);
    $target_file = $upload_dir.$file_name;

    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ['jpg','jpeg','png','gif'];

    if(in_array($file_type, $allowed_types)){
        if(move_uploaded_file($tmp_name, $target_file)){
            $payment_screenshot = $target_file;
        } else {
            echo "Error uploading file."; exit;
        }
    } else {
        echo "Invalid file type. Only images allowed."; exit;
    }
}


$sql = "INSERT INTO bookings (name, number, location, course, payment_screenshot)
        VALUES ('$name', '$number', '$location', '$course', ".($payment_screenshot ? "'$payment_screenshot'" : "NULL").")";
$conn->query($sql);


$_SESSION['popup_name'] = $name;


$group_link = '';
$link_sql = "SELECT group_link FROM whatsapp_links WHERE course_name = ?";
$stmt = $conn->prepare($link_sql);
$stmt->bind_param("s", $course);
$stmt->execute();
$stmt->bind_result($group_link);
$stmt->fetch();
$stmt->close();
$conn->close();


if (!empty($group_link)) {
    $_SESSION['popup_whatsapp'] = $group_link;
} else {
    $_SESSION['popup_whatsapp'] = null;
}


header("Location: index.php");
exit();
?>
