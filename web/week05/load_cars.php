<?php
require "../dbConnect.php";
$db = get_db();

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
try {
foreach ($_SESSION["cars"] as $car) {
   foreach ($db->query('SELECT mtr.year, mke.make, mdl.model, mtr.motor, (gd1.grade1 || "-" ) || gd2.grade2 oil, mtr.oil_cap 
FROM motor_tbl as mtr
INNER JOIN make_tbl AS mke ON mtr.make_id = mke.make_id
INNER JOIN model_tbl AS mdl ON mtr.model_id = mdl.model_id
INNER JOIN grade1_tbl AS gd1 ON mtr.grade1_id = gd1.grade1_id
INNER JOIN grade2_tbl AS gd2 ON mtr.grade2_id = gd2.grade2_id
WHERE mtr.motor_id = ' . $car) as $row) {
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
} catch (PDOException $e) {
   echo $e;
}
