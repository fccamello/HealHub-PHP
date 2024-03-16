<?php    
  session_start(); 
    include '../php/connect.php';
    
    //include 'readrecords.php';   
    // require_once '../includes/header.php'; 
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/index.css">
  <title>Dasboard</title>
</head>

<body>

  <div class="page-header">
    <div class="page-logo">
      HealHub
    </div>

    <div class="page-navbar">
      <ul>
        <li><a href="php/index.php">Home</a></li>
        <li><a href="about-us.html">About Us</a></li>
        <li><a href="contact-us.html">Contact Us</a></li>
      </ul>
    </div>

    <div class="navbar-button-container">
      <a href="index.php">
        <button class="buttons" id="btn-logout"> <?php session_destroy(); ?> Log Out</button>
      </a>
    </div>
  </div>

  <div class="dashboard-text">
    Dashboard <p class="dashboard-description"> Here are your important tasks, updates and alerts </p>
  </div>

  <div class="hello-user">

    <?php

// var_dump($_SESSION);
    // Check if the username is set in the session
    if(isset($_SESSION['username'])) {
        // Display a greeting message with the username
        echo "<p>Hello, {$_SESSION['username']} !</p>";
    }
    else{
      echo "<p>not found</p>";
    }
    ?>
  </div>

  </div>

</body>

</html>