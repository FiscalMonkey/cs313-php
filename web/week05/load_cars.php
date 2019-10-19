<?php
if (!isset($_SESSION)) {
   session_start();
}
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
echo '<label for="car_table" class="h5">Saved Vehicles</label>';
echo '<div id="car_table" class="table-responsive"><table class="table table-striped">
            <thead class="thead-dark"><tr>
               <th scope="col">Year</th>
               <th scope="col">Make</th>
               <th scope="col">Model</th>
               <th scope="col">Engine</th>
               <th scope="col">Oil Grade</th>
               <th scope="col">Engine Cap. (l)</th>
            </tr></thead>
            <tbody>';
foreach ($_SESSION["cars"] as $car) {
   foreach ($db->query('SELECT a.year, b.make, c.model, a.motor, d.oil, a.oil_cap 
FROM motor_tbl as a
INNER JOIN make_tbl AS b ON a.make_id = b.make_id
INNER JOIN model_tbl AS c ON a.model_id = c.model_id
INNER JOIN oil_tbl AS d ON a.oil_id = d.oil_id
WHERE motor_id = ' . $car) as $row) {
      echo '<tr>
      <th scope="row">' . $row["year"] . '</th>
      <td>' . $row["make"] . '</td>
      <td>' . $row["model"] . '</td>
      <td>' . $row["motor"] . '</td>
      <td>' . $row["oil"] . '</td>
      <td>' . $row["oil_cap"] . '</td>
      <td style="display:none;">' . $car . '</td>
   </tr>';
   }
}
echo '</tbody></table></div>';
