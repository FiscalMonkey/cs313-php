<?php 
require "../dbConnect.php";
$db = get_db();

$motor_id = $_POST["motor_id"];

foreach ($db->query('SELECT mt.oil_cap, g1.grade1, g2.grade2 FROM motor_tbl AS mt INNER JOIN grade1_tbl AS g1 ON mt.grade1_id = g1.grade1_id INNER JOIN grade2_tbl AS g2 ON mt.grade2_id = g2.grade2_id WHERE motor_id = ' . $motor_id) as $row) {
   echo '<br /><p class="h5">Your vehicle holds approx. <strong>' . $row["oil_cap"] . '</strong> liters of <strong>' . $row["grade1"] . '-' . $row["grade2"] . '</strong> grade oil.</p>';
}
?>