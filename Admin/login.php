<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Get user by email
    $stmt = $conn->prepare("SELECT * FROM greens WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Plain text compare (NO hash)
        if ($password === $row['password']) {
            $_SESSION['admin_email'] = $email;
            header("Location: syllabus.php");
            exit;
        } else {
            echo "<script>alert('Incorrect Password'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Email Not Found'); window.location.href='index.php';</script>";
    }
}
?>