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
   <script type="text/javascript">
      function validPassword() {
         var pass1 = $('#password1').val();
         var pass2 = $("#password2").val();
         if (pass1 != pass2) {
            $("#password2").removeClass("is-valid").addClass("is-invalid");
            $("#password_invalid").html("Passwords must match!");
         } else {
            $("#password2").removeClass("is-invalid").addClass("is-valid");
            $("#password_invalid").html("");
         }
      }
   </script>
</head>

<body>
   <div class="container">
      <header>
         <div class="jumbotron">
            <h1 class="display-4">Login</h1>
         </div>
      </header>
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
         <div class="form-group">
            <label for="signup">Don't have a login?</label>
            <button id="signup" class="btn btn-primary form-control" data-togle="modal" data-target="#new_user">Sign Up</button>
         </div>
      </div>
   </div>
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

   <?php include "../week02/footer.html" ?>
</body>

</html>