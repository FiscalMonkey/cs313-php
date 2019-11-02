<?php
session_start();
require "../dbConnect.php";
$db = get_db();

$username = clean_input($_POST['username1']);
$password = clean_input($_POST['password1']);

function clean_input($data) {
    $data = htmlspecialchars($data);
    return $data;
}

echo "<br>password = $password";
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "<br>username = $username";
echo "<br>hashed password = $hash";
$hash = trim($hash);
$statement = $db->prepare("INSERT INTO user_tbl(username, pswrd) VALUES('$username', '$hash')");
$statement->execute();
$_SESSION['username'] = $username;

header("Location: welcome.php");

?>