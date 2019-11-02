<?php
if (!isset($_SESSION)) {
    session_start();
}
require "../dbConnect.php";
$db = get_db();

$username = clean_input($_POST['username']);
$password = clean_input($_POST['password']);

function clean_input($data) {
    $data = htmlspecialchars($data);
    return $data;
}

$statement = $db->prepare("SELECT user_id, pswrd FROM user_tbl WHERE username = '$username'");
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);
$hash = $row['pswrd'];
$user_id = $row['user_id'];
$hash = trim($hash);

if (password_verify($password, $hash)) {
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user_id;
    echo "<script type='text/javascript'>
            alert('Login successfull');
            window.location.href='https://sleepy-citadel-12320.herokuapp.com/week05/" . $_SESSION['return'] . ";
            </script>";
    if (isset($_SESSION['return'])) {
        header("Location: " . $_SESSION['return']);
    } else {
        header("Location: 05prove.php");
    }
}
else {
    header("Location: login.php?err=1");
}
?>