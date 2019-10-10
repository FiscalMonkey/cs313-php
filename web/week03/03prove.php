<?php if (!isset($_SESSION)) {
  session_start();
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

  <title>CS 313 - 03Prove</title>
</head>

<body>
  <?php
  if (!isset($_SESSION["items"])) $_SESSION["items"] =
    array(
      array("inCartCount" => 0, "name" => "Souls of Hades", "url" => "http://4.bp.blogspot.com/-aWL0RrDSna4/VqlB1wFJL5I/AAAAAAAAieY/6vZzZ8xYfZI/s1600/Hercules-br-disneyscreencaps.com-9886.jpg", "id" => 1, "price" => 14.99, "desc" => "Slimy and aged souls perfect for enchanting. From the depths of Hades, these souls have aged from millenia."),
      array("inCartCount" => 0, "name" => "Druid Magic: The Practice of Celtic Wisdom", "url" => "https://prodimage.images-bn.com/pimages/9781567184815_p0_v6_s550x406.jpg", "id" => 2, "price" => 7.99, "desc" => "by Maya Magee Sutton & Nicholas Mann. publ. 2000"),
      array("inCartCount" => 0, "name" => "Chockwe Witch Doctor Mask", "url" => "https://cdn.shopify.com/s/files/1/1757/5495/products/c2c75b4c0306e8a2a3445e7e63b1db2495cfc56e_1024x.jpg?v=1528921914", "id" => 3, "price" => 1199.99, "desc" => "A mask from a witch doctor of the Chockwe people found in Central and Southern Africa."),
      array("inCartCount" => 0, "name" => "Plague Doctor Mask", "url" => "https://pbs.twimg.com/media/EEHifGWU4AE8h7W.jpg", "id" => 4, "price" => 549.99, "desc" => "An authentic plague doctor mask from 17th century Naples."),
      array("inCartCount" => 0, "name" => "Miasma", "url" => "https://c.stocksy.com/a/6Ln200/z9/666320.jpg?1560234505", "id" => 5, "price" => 79.99, "desc" => "Potent miasma gathered from the French Catacombs. <i>DO NOT INHALE!</i>"),
      array("inCartCount" => 0, "name" => "Apple of Hesperides", "url" => "https://greeking.me/images/golden-apples-julia-kobzeva-shutterstock.jpg", "id" => 6, "price" => 999999999, "desc" => "One of the mythical apples gifted to Hera on her wedding day from Gaia. <i>Hurry while supplies last!</i>"),
    );
  if (!isset($_SESSION["cart"])) $_SESSION["cart"] = [];
  if (isset($_POST["submit"])) {
    $item_id = $_POST["itemId"];

    $id = array_search($item_id, array_column($_SESSION["items"], 'id'));
    $currentCount = intval($_SESSION["items"][$id]['inCartCount']);
    $_SESSION["items"][$id]['inCartCount'] = $currentCount + 1;
  }
  ?>
  <div class="container">
    <div class="page-header">
      <h1>Shopping and Such</h1>
    </div>
    <nav class="navbar navbar-dark bg-dark">
      <a href="cart.php"><button class="btn btn-secondary" value="Cart">Cart</button></a>
    </nav>
    <div class="jumbotron">
      <label class="h3" for="merch">Merchandise</label>
      <div id="merch" class="d-inline-flex flex-wrap">
        <?php
        for ($i = 0; $i < count($_SESSION["items"]); $i++) {
          echo '<div class="card">';
          echo '<img src="' . $_SESSION["items"][$i]["url"] . '" class="card-img-top">';
          echo '<div class="card-body">';
          echo  '<h5 class="card-title">' . $_SESSION["items"][$i]["name"] . '</h5>';
          echo  '<p class="card-text">' . $_SESSION["items"][$i]["desc"] . '</p>';
          echo  '<div class="d-flex justify-content-between">';
          echo    '<h4 class="font-weight-bold ">$' . $_SESSION["items"][$i]["price"] . '</h4>';
          echo    '<form method="post">';
          echo    '<input type="hidden" name="itemId" value=' . $_SESSION["items"][$i]["id"] . '/>';
          echo    '<input type="submit" value="Add to Cart" name="submit" class="btn btn-primary" />';
          echo  '</form></div></div></div>';
        }
        ?>
      </div>
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