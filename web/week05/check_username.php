<?php
session_start();
require "dbConnect.php";
$db = get_db();

$username = clean_input($_POST['username']);
echo $username;
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$statement = $db->prepare("SELECT username FROM user_tbl WHERE username = $username");
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);
$taken = $row['username'];
$isGood = true;
if ($taken) {
    $isGood = false;
}

echo $isGood;
?>