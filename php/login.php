<?php    
ob_start(); 
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
  <title>Log In</title>
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/auth.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
  <!-- <script type="module" src="../scripts/login.js" defer></script> -->
</head>

<body>

  <div data-auth-login class="page-wrapper">
    <div id="left-content">
      <h1 style="margin-right: auto; margin-bottom: 30px; margin-top: 30px; margin-left: 20px; color: white">HealHub
      </h1>
      <div class="greeting-wrapper">
        <p style="color: white; font-size: 3rem">Hey There!</p>
        <p style="color: white; font-size: 1.2rem">Welcome Back.</p>
        <p style="color: white; font-size: 1.2rem">Your wellness at your fingertips.</p>
      </div>
      <p style="color: white; opacity: 0.5; font-size: 1rem; margin-top: 20px">Don't have an account?</p>
      
      <button id="nav-to-register" class="btn-create-account">Sign Up</button>

     
    </div>
    <div id="right-content">
      <h1 style="margin-right: auto; margin-bottom: 30px; margin-top: 30px; margin-left: 50px; color: #584cf5">SIGN IN
      </h1>
      <form id="login-form" class="auth-login-wrapper" method="post">
        <div style="height: fit-content; width: 100%; display: flex; flex-direction: column; gap: 20px">
          <input id="login-email" data-focus data-login-input name = "txtemail" type="email" placeholder="Email">
          <input id="login-password" data-focus data-login-input name="txtpassword" placeholder="Password">
        </div>
        <div style="height: 50px; width: 100%; display: flex; justify-content: left; align-items: center; gap: 20px">
          <input id="keep-logged-in" type="checkbox" style="height: 20px; width: 20px; margin-left: 10px">
          <p data-message style="text-align: center; display: inline-block; margin: 0; color: gray">Keep me logged in
          </p>
        </div>
        <button id="login-button" class="btn-login" name ="btnLogin" type="submit">Log In</button>
      </form>

      <div id = "responseContainer"
          style="display: flex; justify-content: center; align-items: center; width: 100%; height: 30px;">
          <p style="margin: auto" id="response-message"></p>
        </div>

      <div class="socials-wrapper">

      </div>
    </div>
  </div>

</body>

</html>


<?php	
	if(isset($_POST['btnLogin'])){
		$email=$_POST['txtemail'];
		$pwd=$_POST['txtpassword'];
		//check tbluseraccount if username is existing
		$sql ="Select * from tbluseraccount where email='".$email."'";

		$result = mysqli_query($connection,$sql);	

   
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);


    $passver = password_verify($pwd, $row['password']);
		
		if ($count == 0) {
      echo "<script>
      document.getElementById('response-message').innerHTML = 'Email not existing. Please try again.';
      document.getElementById('responseContainer').classList.add('error-wrapper');
      document.getElementById('login-email').classList.add('login-error');
      document.getElementById('login-password').classList.add('login-error');
      
      setTimeout(function(){
          document.getElementById('response-message').innerHTML = '';
          document.getElementById('responseContainer').classList.remove('error-wrapper');
          document.getElementById('login-email').classList.remove('login-error');
          document.getElementById('login-password').classList.remove('login-error');
      }, 1500); 
  </script>";         
  
  } else if   ($passver == true )  {
    $_SESSION['email'] = $row['email'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['account_id'] = $row['account_id'];

    echo "<script language='javascript'>
            document.getElementById('response-message').innerHTML = 'SUCCESS';
            // document.getElementById('response-message').style.display = 'block';
            document.getElementById('responseContainer').classList.add('success-wrapper');
            document.getElementById('login-email').classList.add('login-success');
            document.getElementById('login-password').classList.add('login-success');
            setTimeout(function(){
              window.location.href = 'dashboard.php';
          }, 1500);
				  </script>";
         

    // header("Location:dashboard.php");
    // exit(); 
      
  } else {
    echo "<script>
    document.getElementById('response-message').innerHTML = 'Incorrect password. Please try again.';
    document.getElementById('responseContainer').classList.add('error-wrapper');
    document.getElementById('login-email').classList.add('login-error');
    document.getElementById('login-password').classList.add('login-error');
    
    setTimeout(function(){
        document.getElementById('response-message').innerHTML = '';
        document.getElementById('responseContainer').classList.remove('error-wrapper');
        document.getElementById('login-email').classList.remove('login-error');
        document.getElementById('login-password').classList.remove('login-error');
    }, 1500); 
</script>";         
  }
		
	}
		

?>

<script>

const btnNavigateToRegister = document.getElementById("nav-to-register");
    btnNavigateToRegister.addEventListener("click", () => {
        window.location.href = "register.php";
    });

    </script>

<!-- 
<?php require_once 'includes/footer.php'; ?> -->