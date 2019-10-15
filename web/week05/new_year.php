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

$year = $_POST["year"];
foreach ($db->query('SELECT DISTINCT b.make, a.make_id FROM motor_tbl AS a WHERE a.year = ' . $year . ' INNER JOIN ORDER BY make') as $row) {
   echo '<option value="' . $row["make_id"] . '">' . $row["make"] . '</option>';
}
?>