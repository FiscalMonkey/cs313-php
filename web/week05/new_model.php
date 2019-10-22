<?php 
require "../dbConnect.php";
$db = get_db();

echo '<option disabled selected value="">Choose Engine</option>';
$year = $_POST['year'];
$make_id = $_POST['make_id'];
$model_id = $_POST['model_id'];

foreach ($db->query('SELECT motor, motor_id FROM motor_tbl WHERE year = ' . $year . ' AND make_id = ' . $make_id . ' AND model_id = ' . $model_id) as $row) {
   echo '<option value="' . $row["motor_id"] . '">' . $row["motor"] . '</option>';
}
?>