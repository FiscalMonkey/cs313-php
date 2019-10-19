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

$motor_id = $_POST["motor_id"];

foreach ($db->query('SELECT a.oil_cap, b.oil FROM motor_tbl AS a INNER JOIN oil_tbl AS b ON a.oil_id = b.oil_id WHERE motor_id = ' . $motor_id) as $row) {
   echo '<p class="h5">Your vehicle takes <strong>' . $row["oil"] . '</strong> and holds approx. <strong>' . $row["oil_cap"] . '</strong> liters.</p>';
}
?>