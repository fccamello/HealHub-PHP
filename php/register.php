<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Account</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
  <!-- <script type="module" src="../scripts/register.js" defer></script> -->
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/auth.css">
</head>


<?php    
    include '../php/connect.php';
    //include 'readrecords.php';   
    // require_once '../includes/header.php'; 
?>

<div data-auth-register class="page-wrapper">
    <form id="register-form" class="auth-register-wrapper" method="post">
      <div>
        <h1><span style="color: #6e63f5">Empowering</span> your healthcare journey</h1>
        <p style="font-size: 1rem">Sign up now for seamless access</p>
        <div style="width: 100%; height: 3px; background-color: #584cf5; margin-top: 10px;"></div>
      </div>
      <div data-name-wrapper>
        <input id="register-firstname" name ="txtfirstname" data-focus data-signup-input placeholder="Firstname">
        <input id="register-lastname" name ="txtlastname" data-focus data-signup-input placeholder="Lastname">
      </div>
      <input id="register-email" name = "txtemail" data-focus data-signup-input type="email" placeholder="Email">
      <input id="register-username" name = "txtuname" data-focus data-signup-input placeholder="Username">
      <input id="register-password" name ="txtpassword" data-focus data-signup-input placeholder="Password">
      <div data-birthdate-wrapper>
        <select data-focus id="month-dropdown" name="month">
          <option value="1">Jan</option>
          <option value="2">Feb</option>
          <option value="3">Mar</option>
          <option value="4">Apr</option>
          <option value="5">May</option>
          <option value="6">Jun</option>
          <option value="7">Jul</option>
          <option value="8">Aug</option>
          <option value="9">Aug</option>
          <option value="10">Oct</option>
          <option value="11">Nov</option>
          <option value="12">Dec</option>
        </select>
        <select data-focus id="day-dropdown" name="day">
          <script>
            for (let i = 1; i <= 31; i++) {
              document.write(`<option value="${i}">${i}</option>`);
            }
          </script>
        </select>
        <select data-focus id="year-dropdown" name ="year">
          <script>
            for (let i = 2024; i >= 1960; i--) {
              document.write(`<option value="${i}">${i}</option>`);
            }
          </script>
        </select>
      </div>
      <div data-gender-wrapper>
        <div class="gender-choice-wrapper">
          <p>Male</p>
          <input type="radio" name="gender-option" value="Male">
        </div>
        <div class="gender-choice-wrapper">
          <p>Female</p>
          <input type="radio" name="gender-option" value="Female">
        </div>
      </div>

      <button id="signup-button" class="btn-sign-up" name ="btnRegister" type="submit">Sign Up</button>
      <a class="nav-link" href="login.php">Already have an account?</a>
    </form>
  </div>

  
<?php	
	if(isset($_POST['btnRegister'])){		
		//retrieve data from form and save the value to a variable
		//for tbluserprofile
    $usertype = 0;
		$fname=$_POST['txtfirstname'];		
		$lname=$_POST['txtlastname'];
		
		
		//for tbluseraccount
		$email=$_POST['txtemail'];		
		$uname=$_POST['txtuname'];
		$pword=$_POST['txtpassword'];
    $hashed_password = password_hash($pword, PASSWORD_BCRYPT);
    $gender=$_POST['gender-option'];

    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];
    
    $birthdate = "$year-$month-$day";
		
		//save data to tbluserprofile			
		$sql1 ="Insert into tbluserprofile(firstname,lastname,gender,birthdate) values('".$fname."','".$lname."', '".$gender."', '".$birthdate."')";
		mysqli_query($connection,$sql1);
		
		//Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
		$sql2 ="Select * from tbluseraccount where username='".$uname."'";

    $user_id = mysqli_insert_id($connection);
		$result = mysqli_query($connection,$sql2);
		$row = mysqli_num_rows($result);
		if($row == 0){
			$sql ="Insert into tbluseraccount(account_id, email,username,password, user_type) values('$user_id', '$email', '$uname', '$hashed_password', '$usertype')";
			mysqli_query($connection,$sql);
			echo "<script language='javascript'>
						alert('New record saved.');
            window.location.href = 'login.php'; 
				  </script>";
         
		}else{
			echo "<script language='javascript'>
						alert('Username already existing');
				  </script>";
		}
			
	}
?>

