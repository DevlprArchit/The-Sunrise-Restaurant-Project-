<?php
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// You can retrieve user-specific information from the database here if needed

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - The Sunrise Restaurant</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
        }

        .navbar {
            background-color: #444;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            padding: 20px;
        }

        .welcome-msg {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .logout-link {
            color: #333;
            background-color: #ddd;
            padding: 8px 16px;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .logout-link:hover {
            background-color: #555;
            color: white;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="#dashboard">Dashboard</a>
    <a href="#order-history">Order History</a>
    <a href="#newsletter">Subscribe to Newsletter</a>
    <a href="logout.php" class="logout-link">Logout</a>
</div>
<div class="header">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
</div>
<div class="content">
    <div class="welcome-msg">Your personalized content goes here.</div>

    <!-- Placeholder for Order History -->
    <div id="order-history">
        <h3>Order History</h3>
        <p>Displaying user's order history here.</p>
        <p> Still we haven't added any db for this so its empty</p>
    </div>

   
    
</div>

</body>
</html>
