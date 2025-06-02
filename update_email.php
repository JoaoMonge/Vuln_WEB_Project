<?php
session_start();
include 'includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $user = $_SESSION['user'];
    $sql = "UPDATE users SET email='$email' WHERE username='$user'";
    mysqli_query($conn, $sql);
    echo "Email updated.";
}
?>
<form method="post" action="update_email.php">
    <input name="email" type="email">
    <button type="submit">Update Email</button>
</form>
