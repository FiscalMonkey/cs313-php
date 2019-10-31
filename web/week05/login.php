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
            <button id="signup" class="btn btn-primary" data-toggle="modal" data-target="#new_user">Sign Up</button>
         </div>
      </div>
   </div>
   <!-- Modal -->
   <div class="modal fade" id="new_user" tabindex="-1" role="dialog" aria-labelledby="Sign Up" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <form id="sign_up_user">
               <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">Sign Up</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="form-group">
                     <label for="username1">Username</label>
                     <input type="text" class="form-control" id="username1" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                     <label for="password1">Password</label>
                     <input type="password" class="form-control" id="password1" onchange="validPassword()" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                     <label for="password2">Confirm Password</label>
                     <input type="password" class="form-control" id="password2" onchange="validPassword()" placeholder="Confirm Password" required>
                     <div class="invalid-feedback" id="password_invalid"></div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary">Sign Up</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <?php include "../week02/footer.html" ?>
</body>

</html>