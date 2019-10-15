<?php 
$year = $_POST["year"];
foreach ($db->query('SELECT DISTINCT b.make, a.make_id FROM motor_tbl AS a WHERE a.year = ' . $year . ' INNER JOIN ORDER BY make') as $row) {
   echo '<option value="' . $row["make_id"] . '">' . $row["make"] . '</option>';
}
?>