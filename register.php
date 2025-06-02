<?php
include 'includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password']; // Stored as plain text
    $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
    mysqli_query($conn, $sql);
    echo "User registered.";
}
?>
<form method="post">
    <input name="username" placeholder="Username">
    <input name="password" placeholder="Password" type="password">
    <button type="submit">Register</button>
</form>
