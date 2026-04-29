<?php
session_start();

// destroy session
$_SESSION = [];
session_destroy();

// redirect
header("Location: index.php");
exit();
?>