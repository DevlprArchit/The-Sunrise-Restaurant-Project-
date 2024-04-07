<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

  // Check for a success message
  if (isset($_SESSION['success'])) {
    echo '<div class="error success"><h3>' . $_SESSION['success'] . '</h3></div>';
    unset($_SESSION['success']);
  }

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	$_SESSION['success'] = "You have successfully logged out.";
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Account Logged/Signed Up Successfully</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Account Logged In Successfully</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<p style="text-align: center;"> Welcome to the sunrise restaurant, <b>Hope you are having a great time with us.</p>
		<p style="text-align: center;"> Keep Shopping with us</p>
		<p><a href="logout.php?logout=1" style="color: red;">Logout</a></p>
		
		<!-- Add a button to continue to homepage -->
		<p><a href="Loading.html" style=" text-align:center; color: green; ">Continue to Homepage</a></p>
    <?php endif ?>
</div>

</body>
</html>
