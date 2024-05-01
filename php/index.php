<?php    
    include '../php/connect.php';
    //include 'readrecords.php';   
    $includeLoginRegister = true;
    require_once '../includes/header.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/index.css">
  <title>HealHub</title>
</head>
<body>
  <div class="page-contents-container">
    <div class="header-container">
      <div class="header-text">
        <div class="header-text-content">
         
        <p style="width: auto">Get <span class="text-highlight" style="width: auto;">immediate medical advice</span> anytime, with <br> our <span class="text-underline">appointment</span> service!</p>
       <div>
        <p class="header-lowtext">Talk with a doctor now!</p>
        <div class="header-buttons">
        <button class="book-an-appointment">Book an Appointment</button>
        <button class="chat-a-doctor">Chat a Doctor</button>
      </div>
       </div>
        
        </div>
      </div>

      <div>
      <img src="/images/index-banner.png" style="width: 114%; height: 105%" class="header-image">
      </div>
      
    </div>

    <div class="about-us-container">
      
      <img src="/images/about-us-index.png" style="width: 95%; height: 95%" >
      
    </div> 

    <footer class="page-footer">
    <h2>Fria Mae Camello</h2>
    <h4>BSCS - 2</h4>
  </footer>
  
</div>

  
</body>
</html>
