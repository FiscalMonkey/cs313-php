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
echo '<option disabled selected value="">Choose Model</option>';
$_SESSION["make_id"] = $_POST['make_id'];

foreach ($db->query('SELECT DISTINCT b.model, a.model_id FROM motor_tbl AS a INNER JOIN model_tbl AS b ON (a.model_id = b.model_id) WHERE a.make_id = ' . $_SESSION["make_id"] . '') as $row) {
   echo '<option value="' . $row["model_id"] . '">' . $row["model"] . '</option>';
}
?>