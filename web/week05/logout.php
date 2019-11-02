<?php
if (!isset($_SESSION)) {
   session_start();
}
$_SESSION = array();
unset($_SESSION['user_id']);
unset($_SESSION['username']);
header("Location: 05prove.php");
?>