<?php if (!isset($_SESSION)) {
  session_start();
  $_SESSION["total"] = 0;
} ?>

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

  <title>CS 313 - 03Prove Cart</title>
</head>

<body>
  <?php
  if (isset($_POST["submit"])) {
    $item_id = $_POST["itemId"];

    $id = array_search($item_id, array_column($_SESSION["items"], 'id'));
    $currentCount = intval($_SESSION["items"][$id]['inCartCount']);
    $_SESSION["items"][$id]['inCartCount'] = 0;
  }

  ?>
  <div class="container">
    <div class="page-header">
      <h1>Your Cart and Stuff</h1>
    </div>
    <nav class="navbar navbar-dark bg-dark">
      <a href="03prove.php"><button class="btn btn-secondary" value="Back">Back to Browse</button></a>
    </nav>
    <div class="jumbotron">
      <label class="h3" for="cart">In Cart</label>
      <div id="cart" class="list-group">
        <?php
        $_SESSION["total"] = 0.0;
        for ($i = 0; $i < count($_SESSION["items"]); $i++) {
          if (intval($_SESSION["items"][$i]["inCartCount"]) > 0) {
            echo '<div class="list-group-item media">';
            echo '<img class="media-thingy" src="' . $_SESSION["items"][$i]["url"] . '" style="height: 7rem;" />';
            echo '<div class="media-body">';
            echo  '<h5 class="mt-0">' . $_SESSION["items"][$i]["name"] . '</h5>';
            echo  '<div class="d-flex justify-content-between">';
            echo    '<h4 class="font-weight-bold ">$' . $_SESSION["items"][$i]["price"] . ' X ' . $_SESSION["items"][$i]["inCartCount"] . '</h4>';
            echo    '<form method="post">';
            echo    '<input type="hidden" name="itemId" value=' . $_SESSION["items"][$i]["id"] . '/>';
            echo    '<input type="submit" value="Remove from Cart" name="submit" class="btn btn-primary" />';
            echo  '</form></div></div></div>';
            $_SESSION["total"] += ($_SESSION["items"][$i]["price"] * $_SESSION["items"][$i]["inCartCount"]);
          }
        }
        ?>
      </div>
      <form method="post" action="checkout.php">
        <h3>Total = $<?php echo $_SESSION["total"]; ?></h3>
        <input type="hidden" name="total" value="<?php echo $_SESSION["total"]; ?>"/>
        <input type="submit" value="Check Out" name="submit">
      </form>
    </div>
  </div>
  <!-- Include Footer -->
  <?php include("../week02/footer.html"); ?>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>