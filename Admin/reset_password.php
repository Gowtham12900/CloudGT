<?php
include 'db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $stmt = $conn->prepare("SELECT * FROM greens WHERE reset_token=? AND token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        ?>
        <form method="POST">
            <input type="hidden" name="token" value="<?= $token ?>">
            <input type="password" name="new_password" placeholder="New Password" required><br>
            <input type="submit" name="reset" value="Reset Password">
        </form>
        <?php
    } else {
        echo "Invalid or expired token.";
    }
}

if (isset($_POST['reset'])) {
    $token = $_POST['token'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("UPDATE greens SET password=?, reset_token=NULL, token_expiry=NULL WHERE reset_token=?");
    $stmt->bind_param("ss", $new_password, $token);
    $stmt->execute();

    echo "Password updated successfully!";
}
?>
