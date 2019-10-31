<?php
session_start();
require "dbConnect.php";
$db = get_db();

$username = clean_input($_POST['username']);
$password = clean_input($_POST['password']);

function clean_input($data) {
    $data = htmlspecialchars($data);
    return $data;
}

echo "username = $username";
echo "<br>password = $password";

$statement = $db->prepare("SELECT password FROM user_tbl WHERE username = '$username'");
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);
$hash = $row['password'];
$hash = trim($hash);
echo ("<br>hash = $hash");

if (!$row)
{
    header("Location: signIn.php?err=1");
    exit();
}

if (password_verify($password, $hash)) {
    $_SESSION['username'] = $username;
    echo "<br> It worked!";
    header("Location: " . $_SESSION['return']);
}
else {
    header("Location: signIn.php?err=2");
    echo "<br>Username or Password is incorrect.";
}
?>