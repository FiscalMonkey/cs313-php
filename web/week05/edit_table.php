<?php
if (!isset($_SESSION)) {
   session_start();
}
if(!isset($_SESSION['user_id'])){ //if login in session is not set
   $_SESSION['return'] = "edit_table.php";
   header("Location: login.php");
}

require "../dbConnect.php";
$db = get_db();
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



   <title>CS 313 - 05Prove Edit</title>
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
               <li class="nav-item">
                  <a class="nav-link" href="05prove.php">Access</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="add_table.php">Add</a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link disabled" href="edit_table.php">Edit</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="remove_table.php">Remove</a>
               </li>
            </ul>
            <?php
            echo '<span id="user">' . $_SESSION['username'] . '</span><a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>';
            ?>
         </div>
      </nav>
      <div class="jumbotron">
         <label class="h3" for="car">Select Vehicle to Edit</label>
         <form id="car" method="get" action="edit_vehicle.php">
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
               <select id="motor" name="motor" name="motor" class="form-control" disabled required>
                  <option disabled selected value="">Choose Engine</option>
               </select>
            </div>
            <input class="btn btn-primary btn-lg" type="submit" value="Edit Vehicle" name="submit" />
         </form>
      </div>
      <div id="cars">

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

   </script>
</body>

</html>