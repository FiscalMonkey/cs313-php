<!DOCTYPE html>
<html lang="en-us">

<head>
   <meta charset="UTF-8">
   <title>Login</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="we are doing the coolest ever stuff with php and databases">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
   <header>
      <div class="jumbotron">
         <h1 class="display-4">Login</h1>
      </div>
   </header>

   <div class="container">
      <div class="shadow p-4 mb-4 bg-white">
         <?php

         if ($_GET['err'] == 1) {
            echo "<p style='color:red;'>Invalid Username</p>";
         }

         if ($_GET['err'] == 2) {
            echo "<p style='color:red;'>Invalid password</p>";
         }

         ?>
         <form action="verify_login.php" method="post">
            <div class="form-group">
               <label for="exampleInputEmail1">Username</label>
               <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
               <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
         </form>
         <br>
         <br>
         <label for="signup">Don't have a login?</label>
         <a href="signUp.php"><button id="signup" class="btn btn-primary">Sign Up</button></a>
      </div>
   </div>


   <?php include "../week02/footer.html" ?>
</body>

</html>