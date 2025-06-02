<?php
include 'includes/db.php';
$id = $_GET['id']; // IDOR
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
echo "Username: " . $user['username'];
?>
