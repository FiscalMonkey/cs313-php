<?php 
require "../dbConnect.php";
$db = get_db();

$motor_id = $_POST["motor_id"];

foreach ($db->query('SELECT a.oil_cap, b.oil FROM motor_tbl AS a INNER JOIN oil_tbl AS b ON a.oil_id = b.oil_id WHERE motor_id = ' . $motor_id) as $row) {
   echo '<br /><p class="h5">Your vehicle takes <strong>' . $row["oil"] . '</strong> grade oil and holds approx. <strong>' . $row["oil_cap"] . '</strong> liters.</p>';
}
?>