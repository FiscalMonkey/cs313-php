<?php 
require "../dbConnect.php";
$db = get_db();

$motor_id = $_POST["motor"];

$stmt = $db->prepare('DELETE FROM motor_tbl WHERE motor_id = ' . $motor_id);
$stmt->execute();

header("Location: remove_table.php");

$message = "Vehicle was deleted.";
echo "<script type='text/javascript'>alert('$message');</script>";
?>