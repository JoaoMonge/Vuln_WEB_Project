<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
echo "Welcome, " . $_SESSION['user'];
?>
<a href="profile.php?id=1">Profile</a> | <a href="admin.php">Admin</a>
