<?php 
require "../dbConnect.php";
$db = get_db();

echo '<option disabled selected value="">Choose Make</option>';
$year = $_POST['year'];

foreach ($db->query('SELECT DISTINCT b.make, a.make_id FROM motor_tbl AS a INNER JOIN make_tbl AS b ON a.make_id = b.make_id WHERE a.year = ' . $year) as $row) {
   echo '<option value="' . $row["make_id"] . '">' . $row["make"] . '</option>';
}
?>