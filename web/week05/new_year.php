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
echo '<option disabled selected value="">Choose Make</option>';
$_SESSION["year"] = $_POST['year'];
$_SESSION["query"] = 'SELECT DISTINCT b.make, a.make_id FROM motor_tbl AS a INNER JOIN make_tbl AS b ON a.make_id = b.make_id WHERE a.year = ' . $_SESSION["year"];

foreach ($db->query($_SESSION["query"]) as $row) {
   echo '<option value="' . $row["make_id"] . '">' . $row["make"] . '</option>';
}
?>