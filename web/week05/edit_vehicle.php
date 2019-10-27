<?php
if (!isset($_SESSION)) {
   session_start();
}

require "../dbConnect.php";
$db = get_db();
$motor_id = $_GET['motor'];
$car = $db->query('SELECT a.year, b.make, c.model, a.motor, d.grade1, e.grade2, a.oil_cap 
FROM motor_tbl as a
INNER JOIN make_tbl AS b ON a.make_id = b.make_id
INNER JOIN model_tbl AS c ON a.model_id = c.model_id
INNER JOIN grade1_tbl AS d ON a.grade1_id = d.grade1_id
INNER JOIN grade2_tbl AS e ON a.grade2_id = e.grade2_id
WHERE motor_id = ' . (int) $motor_id);
//echo 'Year = ' . $car['year'] . ': ' . gettype($car['year']);
echo $car['grade1'];
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



   <title>Edit Vehicle</title>
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
               <li class="nav-item">
                  <a class="nav-link" href="edit_table.php">Edit</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="remove_table.php">Remove</a>
               </li>
            </ul>
         </div>
      </nav>
      <?php if (isset($_POST['submit'])) {
         // initialize variables
         $year = $_POST['year'];
         $make = $_POST['make'];
         $model = $_POST['model'];
         $motor = $_POST['motor'];
         $grade1 = $_POST['grade1'];
         $grade2 = $_POST['grade2'];
         $cap = $_POST['cap'];
         $motor_id = $_POST['motor_id'];
         // insert make if doesn't exist 
         try {
            $makeUp = $db->prepare('UPDATE motor_tbl SET make_id = (SELECT make_id FROM make_tbl WHERE make = :make) WHERE motor_id = ' . (int) $motor_id);
            $makeUp->execute(array(':make' => $make));
         } catch (PDOException $e) {
            try {
               $makeIn = $db->prepare('INSERT INTO make_tbl (make) VALUES (:make) ON CONFLICT (make) DO NOTHING');
               $makeIn->execute(array(':make' => $make));
               $makeUp = $db->prepare('UPDATE motor_tbl SET make_id = (SELECT make_id FROM make_tbl WHERE make = :make) WHERE motor_id = ' . (int) $motor_id);
               $makeUp->execute(array(':make' => $make));
            } catch (PDOException $e) {
               $message = 'Make insertion and update failed: ' . $e;
               echo "<script type='text/javascript'>alert('$message');</script>";
               echo $message;
            }
         }
         // insert model if doesn't exist 
         try {
            $modelUp = $db->prepare('UPDATE motor_tbl SET model_id = (SELECT model_id FROM model_tbl WHERE model = :model) WHERE motor_id = ' . (int) $motor_id);
            $modelUp->execute(array(':model' => $model));
         } catch (PDOException $e) {
            try {
               $modelIn = $db->prepare('INSERT INTO model_tbl (model, make_id) VALUES (:model, (SELECT make_id FROM make_tbl WHERE make = :make)) ON CONFLICT (model) DO NOTHING');
               $modelIn->execute(array(':model' => $model, ':make' => $make));
               $modelUp = $db->prepare('UPDATE motor_tbl SET model_id = (SELECT model_id FROM model_tbl WHERE model = :model) WHERE motor_id = ' . (int) $motor_id);
               $modelUp->execute(array(':model' => $model));
            } catch (PDOException $e) {
               $message = 'Model insertion and update failed: ' . $e;
               echo "<script type='text/javascript'>alert('$message');</script>";
               echo $message;
            }
         }
         // insert motor into database
         try {
            $motorSt = $db->prepare('UPDATE motor_tbl 
            SET year = :year
            , motor = :motor
            , grade1_id = (SELECT grade1_id FROM grade1_tbl WHERE grade1 = :grade1)
            , grade2_id = (SELECT grade2_id FROM grade2_tbl WHERE grade2 = :grade2
            , oil_cap = :cap
            WHERE motor_id = ' . $motor_id);
            $motorSt->execute(array(':motor' => $motor, ':year' => (int) $year, ':grade1' => (int) $grade1, ':grade2' => (int) $grade2, ':cap' => (float) $cap));
         } catch (PDOException $e) {
            $message = 'Vehicle update failed: ' . $e;
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo $message;
         }

         $message = "Vehicle was added.";
         echo "<script type='text/javascript'>alert('$message');</script>";

         unset($_POST['submit']);
      } ?>
      <div class="jumbotron">
         <label class="h3" for="car">Edit Vehicle</label>
         <form id="car" method="post">
            <div class="form-row">
               <div class="col-md-2 mb-1">
                  <label class="h5" for="year">Year</label>
                  <select class="form-control" name="year" id="year" tabindex="1" autofocus required>
                     <?php for ($i = date("Y") + 1; $i >= 1900; $i--) {
                        if ($i == $car['year']) {
                           echo '<option value="' . $i . '" selected>' . $i . '</option>';
                        } else {
                           echo '<option value"' . $i . '">' . $i . '</option>';
                        }
                     } ?>
                  </select>
               </div>
               <div class="col-md-4 mb-3">
                  <label class="h5" for="make">Make</label>
                  <input class="form-control auto-cap" id="make" type="text" name="make" value="<?php echo $car['make']; ?>" tabindex="2" required>
               </div>
               <div class="col-md-4 mb-3">
                  <label class="h5" for="model">Model</label>
                  <input class="form-control auto-cap" id="model" type="text" name="model" value="<?php echo $car['model']; ?>" tabindex="3" required>
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-4 mb-3">
                  <label class="h5" for="motor">Engine</label>
                  <input class="form-control" id="motor" type="text" name="motor" value="<?php echo $car['motor']; ?>" tabindex="4" required>
               </div>
               <div class="col-md-2 mb-1">
                  <label class="h5" for="oil1">Oil Grade 1</label>
                  <select id="oil1" class="form-control" name="grade1" tabindex="5" required>
                     <?php foreach ($db->query('SELECT grade1_id, grade1 FROM grade1_tbl') as $row) {
                        if ($row['grade1'] != $car['grade1']) {
                           echo '<option value="' . $row["grade1_id"] . '">' . $row["grade1"] . '</option>';
                        } else {
                           echo '<option value="' . $row["grade1_id"] . '" selected>' . $row["grade1"] . '</option>';
                        }
                     } ?>
                  </select>
               </div>
               <div class="col-md-2 mb-1">
                  <label class="h5" for="oil2">Oil Grade 2</label>
                  <select id="oil2" class="form-control" name="grade2" tabindex="6" required>
                     <option value="" disabled selected>Grade 2</option>
                     <?php foreach ($db->query('SELECT grade2_id, grade2 FROM grade2_tbl') as $row) {
                        if ($row['grade2'] != $car['grade2']) {
                           echo '<option value="' . $row["grade2_id"] . '">' . $row["grade2"] . '</option>';
                        } else {
                           echo '<option value="' . $row["grade2_id"] . '" selected>' . $row["grade2"] . '</option>';
                        }
                     } ?>
                  </select>
               </div>
               <div class="col-md-2 mb-1">
                  <label class="h5" for="cap">Oil Capacity</label>
                  <input class="form-control" id="cap" type="number" name="cap" min="0" max="15" step="0.1" value="<?php echo $car['oil_cap']; ?>" tabindex="7" required>
               </div>
            </div>
            <input type="hidden" name="motor_id" value="<?php echo $motor_id; ?>" >
            <input class="btn btn-success btn-lg" type="submit" value="Submit Vehicle" name="submit" tabindex="8" />
         </form>
      </div>
   </div>

   <!-- Using PHP to include the same footer -->
   <?php include("../week02/footer.html"); ?>
</body>

</html>