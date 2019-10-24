<?php
if (!isset($_SESSION)) {
   session_start();
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

   <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

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
               <li class="nav-item">
                  <a class="nav-link" href="05prove.php">Access</a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link disabled" href="add_table.php">Add</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="edit_table.php">Edit</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="remove_table.php">Remove</a>
               </li>
            </ul>
         </div>
      </nav>
      <div class="jumbotron">
         <?php if (isset($_POST["submit"])) {
            /*create variable as array if not set */
            if (!isset($_SESSION["cars"])) {
               $_SESSION["cars"] = array();
            }
            /* Search array before adding duplicates */
            if (array_search($_POST["motor"], $_SESSION["cars"]) == false) {
               array_push($_SESSION["cars"], $_POST["motor"]);
            }
         } ?>
         <label class="h3" for="car">Enter Vehicle Information</label>
         <form id="car" method="post" onsubmit="return validateForm(this)">
            <div class="form-group">
               <label class="h5" for="year">Year</label>
               <input class="form-control" id="year" type="number" name="year" tabindex="1" autofocus required>
               <div id="year_error" class="invalid-feedback"></div>
               <label class="h5" for="make">Make</label>
               <input class="form-control" id="make" type="text" name="make" tabindex="2" required>
               <label class="h5" for="model">Model</label>
               <input class="form-control" id="model" type="text" name="model" tabindex="3" required>
               <label class="h5" for="motor">Engine</label>
               <input class="form-control" id="motor" type="text" name="motor" tabindex="4" required>
               <label class="h5" for="oil">Oil Grade</label>
               <input class="form-control" id="oil" type="text" name="oil" tabindex="5" required>
               <label class="h5" for="cap">Engine Oil Capacity</label>
               <input class="form-control" id="cap" type="number" name="cap" tabindex="6" required>
            </div>
            <input class="btn btn-success btn-lg" type="submit" value="Add Vehicle" name="submit" tabindex="7" />
         </form>
      </div>
   </div>

   <!-- Using PHP to include the same footer -->
   <?php include("../week02/footer.html"); ?>

   <!-- Optional JavaScript -->
   <script>
      var curYear = new Date().getFullYear();
      // Initialize form validation on the registration form.
      // It has the name attribute "registration"
      $("#car").validate({
         // Specify validation rules
         rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            year: {
               required: true,
               digits: true,
               rangelength: [4, 4],
               range: [1900, curYear + 1]
            },
            make: "required",
            model: "required",
            motor: "required",
            oil: {
               required: true,

            },
            cap: {
               required: true,
               number: true
               range: [0, 100]
            }
         },
         // Specify validation error messages
         messages: {
            year: {
               required: "Year is required",
               digits: "Year must be numbers",
               rangelength: "Year must be 4 numbers",
               range: "Year must be between 1900-" + (curYear + 1)
            },
            make: "Make is required",
            model: "Model is required",
            motor: "Engine is required",
            oil: {
               required: "",
            },
            cap: {
               required: "Engine Oil Capacity is required",
               number: "Engine Oil Capacity must be a number",
               range: "Engine Oil Capacity must be between 0-100"
            }
         },
         // Make sure the form is submitted to the destination defined
         // in the "action" attribute of the form when valid
         submitHandler: function(form) {
            form.submit();
         }
      });
/*
      function validateForm(form) {
         var valid = false;
         var validYear = validateYear(form.year.value);
         var validOil = validateOil(form.oil.value);
         return valid;
      }

      function validateYear(value) {
         var valid = false;
         var curYear = new Date().getFullYear();
         if (value > curYear + 1 || value < 1900) {
            $("year_error").html("Year must be after 1900 and before " + (curYear + 1));
         } else {
            $("year_error").html("");
            valid = true;
         }
         return valid;
      }

      function validateOil(value) {
         var valid = false;
         /[]/.test(value);
      }*/
   </script>
</body>

</html>