<?php
session_start();
include 'includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
    } else {
        echo "Login failed.";
    }
}
?>
<form method="post">
    <input name="username" placeholder="Username">
    <input name="password" placeholder="Password" type="password">
    <button type="submit">Login</button>
</form>
