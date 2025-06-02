<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = $_POST['message']; // XSS vulnerable
    echo "Message received: $msg";
}
?>
<form method="post">
    <textarea name="message"></textarea>
    <button type="submit">Send</button>
</form>
