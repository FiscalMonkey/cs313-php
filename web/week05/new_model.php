<?php 
try {
   $dbUrl = getenv('DATABASE_URL');

   $dbOpts = parse_url($dbUrl);

   $dbHost = $dbOpts["host"];
   $dbPort = $dbOpts["port"];
   $dbUser = $dbOpts["user"];
   $dbPassword = $dbOpts["pass"];
   $dbName = ltrim($dbOpts["path"], '/');

   $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
   echo 'Error!: ' . $ex->getMessage();
   die();
}
echo '<option disabled selected value="">Choose Engine</option>';
$year = $_POST['year'];
$make_id = $_POST['make_id'];
$model_id = $_POST['model_id'];

foreach ($db->query('SELECT motor, motor_id FROM motor_tbl WHERE year = ' . $year . ' AND make_id = ' . $make_id . ' AND model_id = ' . $model_id) as $row) {
   echo '<option value="' . $row["motor_id"] . '">' . $row["motor"] . '</option>';
}
?>