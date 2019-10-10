<?php if (!isset($_SESSION)) {
   session_start();
   $_SESSION["total"] = 0;
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
   <link rel="stylesheet" href="03prove.css" />

   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   <title>CS 313 - 03Prove Confirmation</title>
</head>

<body>
   <div class="container">
      <div class="page-header">
         <h1>Thanks for you business!</h1>
      </div>
      <nav class="navbar navbar-dark bg-dark">
         <a href="03prove.php"><button class="btn btn-secondary" value="Back">Back to Browse</button></a>
      </nav>
      <div class="jumbotron">
         <label class="h2" for="order">Order</label>
         <div id="order">
            <?php
            for ($i = 0; $i < count($_SESSION["items"]); $i++) {
               if (intval($_SESSION["items"][$i]["inCartCount"]) > 0) {
                  echo '<div class="list-group-item media">';
                  echo '<img class="media-thingy" src="' . $_SESSION["items"][$i]["url"] . '" style="height: 7rem;" />';
                  echo '<div class="media-body">';
                  echo  '<h5 class="mt-0">' . $_SESSION["items"][$i]["name"] . '</h5>';
                  echo  '<div class="d-flex justify-content-between">';
                  echo    '<h4 class="font-weight-bold ">Quantity: ' . $_SESSION["items"][$i]["inCartCount"] . '</h4>';
                  echo  '</div></div></div>';
                  $_SESSION["total"] += ($_SESSION["items"][$i]["price"] * $_SESSION["items"][$i]["inCartCount"]);
               }
            }
            ?>
         </div>
         <label class="h2" for="ship_info">Shipping Info</label>
         <div id="ship_info">
            <?php
            echo '<p>' . $_POST["name"] . '<br />';
            echo $_POST["address"] . '<br />';
            echo $_POST["city"] . ', ' . $_POST["state"] . '</p>';
            ?>
         </div>
      </div>
   </div>
   <!-- Include Footer and Erase session variables -->
   <?php include("../week02/footer.html");
   session_unset(); ?>

   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>