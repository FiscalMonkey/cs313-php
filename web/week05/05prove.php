<?php
session_unset();
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
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
         <?php if (isset($_POST["submit"])) {
            if (!isset($_SESSION["cars"])) {
               $_SESSION["cars"] = array();
            }
            array_push($_SESSION["cars"], $_POST["motor"]);
         } ?>
         <label class="h3" for="car">Enter Vehicle Information</label>
         <form id="car" method="post">
            <div class="form-group">
               <label class="h5" for="year">Year</label>
               <select id="year" class="form-control" onchange="newYear()">
                  <option disabled selected value="">Choose Year</option required>
                  <?php foreach ($db->query('SELECT DISTINCT year FROM motor_tbl ORDER BY year DESC') as $row) {
                     echo '<option value="' . $row["year"] . '">' . $row["year"] . '</option>';
                  } ?>
               </select>
               <label class="h5" for="make">Make</label>
               <select id="make" class="form-control" onchange="newMake()" disabled required>
                  <option disabled selected value="">Choose Make</option>
               </select>
               <label class="h5" for="model">Model</label>
               <select id="model" class="form-control" onchange="newModel()" disabled required>
                  <option disabled selected value="">Choose Model</option>
               </select>
               <label class="h5" for="motor">Engine</label>
               <select id="motor" name="motor" class="form-control" onchange="newMotor()" disabled required>
                  <option disabled selected value="">Choose Engine</option>
               </select>

            </div>
            <input class="btn btn-success btn-lg" type="submit" value="Save Vehicle" name="submit" />
            <div id="oil">
            </div>
         </form>
      </div>
      <div id="cars">
         <?php
         if (isset($_SESSION["cars"])) {
            include("load_cars.php");
         }
         ?>
      </div>
   </div>

   <!-- Using PHP to include the same footer -->
   <?php include("../week02/footer.html"); ?>

   <!-- Optional JavaScript -->
   <script>
      var make = document.getElementById("make");
      var model = document.getElementById("model");
      var motor = document.getElementById("motor");
      var year = document.getElementById("year");

      function newYear() {
         make.disabled = false;
         make.options[0].selected = true;
         model.disabled = true;
         model.options[0].selected = true;
         motor.disabled = true;
         motor.options[0].selected = true;
         $("#make").load("new_year.php", {
            'year': year.value
         }, function(data, status, jqXGR) {
            console.log("data loaded");
         });
         $("#oil").html("");
      }

      function newMake() {
         model.disabled = false;
         model.options[0].selected = true;
         motor.disabled = true;
         motor.options[0].selected = true;
         $("#model").load("new_make.php", {
            'year': year.value,
            'make_id': make.value
         }, function(data, status, jqXGR) {
            console.log("data loaded");
         });
         $("#oil").html("");
      }

      function newModel() {
         motor.disabled = false;
         motor.options[0].selected = true;
         $("#motor").load("new_model.php", {
            'year': year.value,
            'make_id': make.value,
            'model_id': model.value
         }, function(data, status, jqXGR) {
            console.log("data loaded");
         });
         $("#oil").html("");
      }

      function newMotor() {
         $("#oil").load("new_motor.php", {
            'motor_id': motor.value
         }, function(data, status, jqXGR) {
            console.log("data loaded");
         });
      }
   </script>
</body>

</html>