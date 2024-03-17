<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Account</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    
  <!-- <script type="module" src="../scripts/register.js" defer></script> -->
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/auth.css">
</head>

</head>


<?php    
    include '../php/connect.php';
    //include 'readrecords.php';   
    // require_once '../includes/header.php'; 
?>

<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Account creation failed</h5>
          <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="modalMessage" style="display: inline-block; margin: 0; color: black"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



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

      <div style="color: green; font-weight: bold;" id="successMessage"></div>

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
		
		
		//Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
		$sql2 ="Select * from tbluseraccount where username='".$uname."'";
		$result = mysqli_query($connection,$sql2);
		$row = mysqli_num_rows($result);
		if($row == 0){

      $sql1 ="Insert into tbluserprofile(firstname,lastname,gender,birthdate) values('".$fname."','".$lname."', '".$gender."', '".$birthdate."')";
		  mysqli_query($connection,$sql1);

      $user_id = mysqli_insert_id($connection);

			$sql ="Insert into tbluseraccount(account_id, email,username,password, user_type) values('$user_id', '$email', '$uname', '$hashed_password', '$usertype')";
			mysqli_query($connection,$sql);
			echo "<script>
      var successMessage = document.getElementById('successMessage');
      successMessage.innerHTML = 'New Record Saved';
      setTimeout(function(){
        window.location.href = 'login.php'; 
          }, 1500);
      
      </script>";
         
		}else{
			echo "<script>
      document.getElementById('modalMessage').innerHTML = 'Username already existing';
      $('#messageModal').modal('show');
      </script>";
		}
			
	}
?>