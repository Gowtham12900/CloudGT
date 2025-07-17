<?php
include 'db.php';
date_default_timezone_set('Asia/Kolkata'); // India time

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newPassword = $_POST['newpassword'];
    $confirmPassword = $_POST['confirmpassword'];
    $token = $_POST['token']; // Hidden field la irukkum

    // 1. Empty check
    if (empty($newPassword) || empty($confirmPassword)) {
        echo "<script>alert('❌ Please fill all fields'); window.history.back();</script>";
        exit;
    }

    // 2. Password match check
    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('❌ Passwords do not match'); window.history.back();</script>";
        exit;
    }

    // 3. Token validate
    $stmt = $conn->prepare("SELECT * FROM greens WHERE reset_token = ? AND token_expiry > NOW()");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows !== 1) {
        echo "<script>alert('❌ Token expired or invalid'); window.location.href='index.php';</script>";
        exit;
    }

    // 4. Password update
    $hashedPassword = $newPassword; // ❗ No hash, plain (as per your request)

    $stmt = $conn->prepare("UPDATE greens SET password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?");
    $stmt->bind_param("ss", $hashedPassword, $token);
    $stmt->execute();

    echo "<script>alert('✅ Password changed successfully'); window.location.href='index.php';</script>";
}
?>
