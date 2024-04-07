<?php 
session_start();

// initializing variables
$username = "";
$password = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php'); // Redirect to homepage or another page after successful login
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login - The Sunrise Restaurant</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
  <h2>Login</h2>
</div>    
<div class="content">
  <?php if (count($errors) > 0) : ?>
    <div class="error">
      <?php foreach ($errors as $error) : ?>
        <p><?php echo $error; ?></p>
      <?php endforeach ?>
    </div>
  <?php endif ?>

  <form method="post" action="login.php">
    <label>Username:</label>
    <input type="text" name="username">

    <label>Password:</label>
    <input type="password" name="password">

    <button type="submit" name="login_user">Login</button>
  </form>
</div>

</body>
</html>
