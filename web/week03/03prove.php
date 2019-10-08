<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="03prove.css"/>

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>CS 313 - 03Teach</title>
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <h1>Shopping and Such</h1>
      </div>
      <nav class="navbar navbar-dark bg-dark">
        <button class="btn btn-secondary" value="Cart">Cart<span class="badge badge-danger"><?php ?></span></button>
      </nav>
      <div class="jumbotron">
        <label class="h3" for="merch">Merchandise</label>
        <div id="merch" class="d-inline-flex flex-wrap">
          <div class="card">
            <img src="https://a.rgbimg.com/users/m/ma/matchstick/600/mllKDdI.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Souls of Hades</h5>
              <p class="card-text">Slimy and aged souls perfect for enchanting. From the depths of Hades, these souls have aged from millenia.</p>
              <div class="d-flex justify-content-between">
                <h4 class="font-weight-bold ">$14.99</h4>
                <button type="button" class="btn btn-primary">Add to Cart</a>
              </div>
            </div>
          </div>
          <div class="card">
            <img src="https://prodimage.images-bn.com/pimages/9781567184815_p0_v6_s550x406.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Druid Magic: The Practice of Celtic Wisdom</h5>
              <p class="card-text">by Maya Magee Sutton & Nicholas Mann. publ. 2000</p>
              <div class="d-flex justify-content-between">
                <h4 class="font-weight-bold ">$7.99</h4>
                <a href="#" class="btn btn-primary">Add to Cart</a>
              </div>
            </div>
          </div>
          <div class="card">
            <img src="https://cdn.shopify.com/s/files/1/1757/5495/products/c2c75b4c0306e8a2a3445e7e63b1db2495cfc56e_1024x.jpg?v=1528921914" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Chockwe Witch Doctor Mask</h5>
              <p class="card-text">A mask from a witch doctor of the Chockwe people found in Central and Southern Africa.</p>
              <div class="d-flex justify-content-between">
                <h4 class="font-weight-bold ">$1199.99</h4>
                <a href="#" class="btn btn-primary">Add to Cart</a>
              </div>
            </div>
          </div>
          <div class="card">
            <img src="https://pbs.twimg.com/media/EEHifGWU4AE8h7W.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Plague Doctor Mask</h5>
              <p class="card-text">An authentic plague doctor mask from 17th century Naples.</p>
              <div class="d-flex justify-content-between">
                <h4 class="font-weight-bold ">$149.99</h4>
                <a href="#" class="btn btn-primary">Add to Cart</a>
              </div>
            </div>
          </div>
          <div class="card">
            <img src="https://c.stocksy.com/a/6Ln200/z9/666320.jpg?1560234505" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Miasma</h5>
              <p class="card-text">Potent miasma gathered from the French Catacombs. <i>DO NOT INHALE!</i></p>
              <div class="d-flex justify-content-between">
                <h4 class="font-weight-bold ">$79.99</h4>
                <a href="#" class="btn btn-primary">Add to Cart</a>
              </div>
            </div>
          </div>
          <div class="card">
            <img src="https://greeking.me/images/golden-apples-julia-kobzeva-shutterstock.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Apple of Hesperides</h5>
              <p class="card-text">One of the mythical apples gifted to Hera on her wedding day from Gaia. <i>Hurry while supplies last!</i></p>
              <div class="d-flex justify-content-between">
                <h4 class="font-weight-bold ">$999999999</h4>
                <a href="#" class="btn btn-primary">Add to Cart</a>
              </div>
            </div>
          </div>
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