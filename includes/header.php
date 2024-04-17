<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/index.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>HealHub</title>
</head>
<!-- 
<div class= "page-header">
    <div class = "page-logo">
      HealHub
    </div>

    <div class="page-navbar"> 
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about-us.php">About Us</a></li>
        <li><a href="contact-us.php">Contact Us</a></li>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="appointment.php">Appointment</a></li>
      </ul>
    </div>

   
  </div> -->


  <!-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #8a2be2; height:  101px"> -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #8a2be2; height:101px">
  <a class="navbar-brand" href="#" style="color: white;   font-size: 35px;   font-weight: 600;   padding-left: 70px;   font-family: montserrat;
">HealHub</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php" style="color: white;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about-us.php" style="color: white;">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact-us.php" style="color: white;">Contact Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
          Patient
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="dashboard.php" style="color: #8a2be2; font-weight: 500">Dashboard</a>
          <a class="dropdown-item" href="appointment.php" style="color: #8a2be2; font-weight: 500">Set Appointment</a>
          <!-- <a class="dropdown-item" href="#" style="color: black;">Something else here</a> -->
        </div>
      </li>
    </ul>

    <?php
  // Check if we want to include login and register buttons
  if ($includeLoginRegister) {
    ?>
    <ul class="navbar-nav">
      <li>
        <a href="login.php" style="color: white;">
          <button class="buttons" id="btn-login">Login</button>
        </a>
      </li>

      <li>
        <a href="register.php" style="color: white;">
          <button class="buttons" id="btn-register">Register</button>
        </a>
      </li>
    </ul>
  </div>
  <?php
  }
  ?>
</nav>
