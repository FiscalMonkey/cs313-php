<?php 
require "../dbConnect.php";
$db = get_db();

echo '<option disabled selected value="">Choose Model</option>';
$year = $_POST['year'];
$make_id = $_POST['make_id'];

foreach ($db->query('SELECT DISTINCT b.model, a.model_id FROM motor_tbl AS a INNER JOIN model_tbl AS b ON a.model_id = b.model_id WHERE a.year = ' . $year . ' AND a.make_id = ' . $make_id) as $row) {
   echo '<option value="' . $row["model_id"] . '">' . $row["model"] . '</option>';
}
echo 'something
on another line';
?>