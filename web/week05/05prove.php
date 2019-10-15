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
/*
$stmt = $db->prepare('SELECT DISTINCT year FROM motor_tbl ORDER BY year DESC');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   <title>CS 313 - 05Prove</title>
</head>

<body>
   <div class="container">
      <div class="page-header">
         <h1>Which Oil is Right for You?</h1>
      </div>
   </div>
   <div class="container">
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
         <div id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link disabled" href="05prove.php">Access</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link disabled" href="#">Add</a>
               </li>
            </ul>
         </div>
      </nav>
      <div class="jumbotron">
         <label class="h3" for="car">Enter Vehicle Information</label>
         <form id="car">
            <div class="form-group">
               <label class="h5" for="year">Year</label>
               <select id="year" class="form-control" onclick="newYear()">
                  <option disabled selected value="">Choose Year</option>
                  <?php foreach ($db->query('SELECT DISTINCT year FROM motor_tbl ORDER BY year DESC') as $row) {
                     echo '<option value="' . $row["year"] . '">' . $row["year"] . '</option>';
                  } ?>
               </select>
               <label class="h5" for="make">Make</label>
               <select id="make" class="form-control" onchange="newMake()" disabled>
                  <option disabled selected value="">Choose Make</option>
                  <div id="makes"></div>
               </select>
               <label class="h5" for="model">Model</label>
               <select id="model" class="form-control" onchange="newModel()" disabled>
                  <option disabled selected value="">Choose Model</option>
                  <?php foreach ($db->query('SELECT DISTINCT model, model_id FROM motor_tbl ORDER BY model') as $row) {
                     echo '<option value="' . $row["model_id"] . '">' . $row["model"] . '</option>';
                  }?>
               </select>
               <label class="h5" for="motor">Engine</label>
               <select id="motor" class="form-control" disabled>
                  <option disabled selected value="">Choose Engine</option>
                  <?php foreach ($db->query('SELECT motor, motor_id FROM motor_tbl ORDER BY motor') as $row) {
                     echo '<option value="' . $row["motor_id"] . '">' . $row["motor"] . '</option>';
                  }?>
               </select>
            </div>
         </form>
      </div>
   </div>

   <!-- Using PHP to include the same footer -->
   <?php include("../week02/footer.html"); ?>

   <!-- Optional JavaScript -->
   <script>
      var make = document.getElementById("make");
      var model = document.getElementById("model");
      var motor = document.getElementById("motor");

      function newYear() {
         make.disabled = false;
         make.options[0].selected = true;
         model.disabled = true;
         model.options[0].selected = true;
         motor.disabled = true;
         motor.options[0].selected = true;
         var year = document.getElementById("year").value;
         $.post("new_year.php", {year: year},
         function(data) {
            $("#makes").html(data);
         });
      }

      function newMake() {
         model.disabled = false;
         model.options[0].selected = true;
         motor.disabled = true;
         motor.options[0].selected = true;
      }

      function newModel() {
         motor.disabled = false;
         motor.options[0].selected = true;
      }
   </script>
   
</body>

</html>