<?php
require('config.php');
session_start();
$errormsg = "";
if (isset($_POST['email'])) {
  $error_message = ""; // To store error messages
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($con, $email);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($con, $password);
  $query = "SELECT * FROM `users` WHERE email='$email'and password='" . md5($password) . "'";
  $result = mysqli_query($con, $query) or die(mysqli_error($con));
  $rows = mysqli_num_rows($result);
  if ($rows == 1) {
    $_SESSION['email'] = $email;
    header("Location: index.php");
  } else {
    $error_message  = "invalid Credentials";
  }
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Login</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <style>
    .login-form {
      width: 340px;
      margin: 50px auto;
      font-size: 15px;
    }

    .login-form form {
      margin-bottom: 15px;
      background: #fff;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      padding: 30px;
      border: 1px solid #ddd;
    }

    .login-form h2 {
      color: #636363;
      margin: 0 0 15px;
      position: relative;
      text-align: center;
    }

    .login-form h2:before {
      left: 0;
    }

    .login-form h2:after {
      right: 0;
    }

    .login-form .hint-text {
      color: #999;
      margin-bottom: 30px;
      text-align: center;
    }

    .login-form a:hover {
      text-decoration: none;
    }

    .form-control,
    .btn {
      min-height: 38px;
      border-radius: 2px;
    }

    .btn {
      font-size: 15px;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="login-form">
    <form action="" method="POST" autocomplete="off">
	<?php if (!empty($error_message)): ?>
       <div id="error-alert" class="alert alert-danger w-100">
       <?php echo $error_message; ?>
       </div>
    <?php endif; ?>
	
      <h2 class="text-center">Expense Hub</h2>
      <p class="hint-text">Login Panel</p>
      <div class="form-group">
        <input type="text" name="email" class="form-control" placeholder="Email" required="required">
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password" required="required">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" style="border-radius:0%;">Login</button>
      </div>
    </form>
    <p class="text-center">Don't have an account?<a href="register.php" class="text-danger"> Register Here</a></p>
  </div>
</body>
<!-- Bootstrap core JavaScript -->

<script src="js/bootstrap.min.js"></script>
<script src="js/feather.min.js"></script>
   <script type="text/javascript">
        $(document).ready(function() {
			setTimeout(function() {
            document.querySelector('#error-alert').remove();
            }, 5000);
        });
    </script>
<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>
<script>
  feather.replace()
</script>
 
</html>