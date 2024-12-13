<?php
session_start();
session_destroy();
$_SESSION['logout_message'] = "You have been logged out.";
header("Location: index.php");
exit;
?>