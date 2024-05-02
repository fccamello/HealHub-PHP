<?php    
  session_start(); 
    include '../php/connect.php';
    
    //include 'readrecords.php';   
    $includeLoginRegister = false;
    require_once '../includes/header.php'; 
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/index.css">
  <title>Dashboard</title>
</head>

<body>
<!-- 
  <div class="page-header">
    <div class="page-logo">
      HealHub
    </div>

    <div class="page-navbar">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about-us.php">About Us</a></li>
        <li><a href="contact-us.php">Contact Us</a></li>
      </ul>
    </div>

    <div class="navbar-button-container">
       <a href="index.php"> -->
      <!-- <button class="buttons" id="btn-logout"> Log Out</button>      </a> -->
    <!-- </div>
  </div>  -->

  <div class="dashboard-text">
    Dashboard <p class="dashboard-description"> Here are your important tasks, updates and alerts </p>
  </div>

  <div class="hello-user">

   
             
  <?php
if(isset($_SESSION['username'])) {
    ?>
    <p>Hello, <?php echo $_SESSION['username']; ?>!</p>

    <?php
    if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 0) {
    ?>
        <form method="POST">
            <p>Want to be a doctor?</p>
            <input id="doctor-specialization" name="doctor-specialization" placeholder="Specialization">
            <!-- Use button type="submit" to properly submit the form -->
            <button id="doctor-request-button" name="btnrequestdoctor" type="submit">Click here</button>
        </form>
    <?php
    } elseif(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) { 
        // Display a message indicating that the user is already a doctor
        echo "You are now a doctor.";    
    ?>
       

        <?php
    }
}  else {
    echo "<p>PLEASE LOG IN FIRST</p>";
}
?>



<?php

if (isset($_POST['btnrequestdoctor'])) {

  $accountID =  $_SESSION['account_id'];
  
  $query1= "SELECT firstname, lastname, user_id FROM tbluserprofile WHERE user_id = $accountID";
  $result1 = mysqli_query($connection, $query1);

  if ($result1) {
    // Fetch the row
    $row = mysqli_fetch_assoc($result1);

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $userID = $row['user_id'];

    $specialization = $_POST['doctor-specialization'];

    //  Debugging: Print out the values to check if they are correct
   // echo "Firstname: $firstname, Lastname: $lastname, Account ID: $accountID, Specialization: $specialization";

  
  //  get the user information from user profile table based from the ids of the rows with user_type="1"/doctor
  $query2 = "SELECT * FROM tbluseraccount WHERE user_type = 1";
  $result2 = mysqli_query($connection, $query2);

    if ($result2 === false) {
        die("Error in queryyyyy." . mysqli_error($connection));
    }

    $user_ids = [];
    while ($row = mysqli_fetch_assoc($result2)) {
        $user_ids[] = $row["account_id"];
    }

    //get all rows of doctors
    if (!empty($user_ids)) {
      $id_list = implode(",", $user_ids);
      $query9 = "SELECT * FROM tbluserprofile WHERE user_id IN ($id_list) AND firstname = '$firstname' AND lastname = '$lastname'";
      // echo "Query: $query9<br>"; // Debugging statement
  
      $result1 = mysqli_query($connection, $query9);
  
      if ($result1 === false) {
          die("Error in query: " . mysqli_error($connection));
      }
  
      if (mysqli_num_rows($result1) != 0) {
        echo "<p>User is already a doctor.</p>";
        // echo json_encode(array("success" => false, "message" => "User is already a doctor."));
          die();
      }
   
  
    //check in the requests db if the account is already in there
    $query4 = "SELECT * FROM tblupgraderequest WHERE account_id = '$accountID'";
    $result = mysqli_query($connection, $query4);

    if (mysqli_num_rows($result) != 0) {
      echo "<p>ERROR! Request already sent. Account is currently being verified</p>";
        // echo json_encode(array("success" => false, "message" => "Request already sent. Account is currently being verified."));
        die();
    }
  }

    //if the request has not been sent yet, insert it into the database for requests
    $query5 = "INSERT INTO tblupgraderequest (account_id, specialization) VALUES ('$accountID', '$specialization')";

    if (mysqli_query($connection, $query5)) {
      echo "<p>Request to be a doctor successfully sent.</p>";
        // echo json_encode(array("success" => true, "message" => "Request to be a doctor successfully sent. Account is now being verified."), JSON_PRETTY_PRINT);
    } else {
        // Error handling: Print the error message if the query fails
        die("Error in query: " . mysqli_error($connection));
    }

}
}





?>

</div>

<?php 
$mysqli = new mysqli('127.0.0.1', 'root','','dbcamellof1') or die (mysqli_error($mysqli));
$mysqli2 = new mysqli('127.0.0.1', 'root','','dbcamellof1') or die (mysqli_error($mysqli2));

$resultset = $mysqli->query("SELECT* from tblupgraderequest") or die ($mysqli->error);
$resultsetdoctor = $mysqli2->query("SELECT* from tbldoctor") or die ($mysqli2->error);

?>


<?php 
if(isset($_SESSION['username']) && $_SESSION['user_type'] == '2') {
?>
    <p style="text-align: center; margin-top: 2%">REQUEST DOCTOR TABLE</p>
    <table id="tblupgraderequest" cellspacing="0" width="100%" style="margin-top: 40px;">
        <thead>
            <tr>
                <th> Request ID </th>
                <th> Account ID </th>
                <th> Specialization </th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $resultset -> fetch_assoc()) : ?>
                <tr> 
                    <td style="text-align: center;"><?php echo $row['request_id'] ?></td>
                    <td style="text-align: center;"><?php echo $row['account_id'] ?></td>
                    <td style="text-align: center;"><?php echo $row['specialization'] ?></td>
                    <td style="text-align: center;">
                        <form method="POST"> 
                            <input type="hidden" name="request_id" value="<?php echo $row['request_id'] ?>">
                            <input type="hidden" name="account_id" value="<?php echo $row['account_id'] ?>">
                            <input type="hidden" name="specialization" value="<?php echo $row['specialization'] ?>">
                            <button type="submit" name="accept_doctor">ACCEPT AS DOCTOR</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>

    <p style="text-align: center; margin-top: 2%">ACCEPTED DOCTOR TABLE</p>
    <table id="tbldoctor" cellspacing="0" width="100%" style="margin-top: 40px;">
        <thead>
            <tr>
                <th> Doctor ID </th>
                <th> Account ID </th>
                <th> Specialization </th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $resultsetdoctor -> fetch_assoc() ) : ?>
                <tr> 
                    <td style="text-align: center;"><?php echo $row['doctor_id'] ?></td>
                    <td style="text-align: center;"><?php echo $row['account_id'] ?></td>
                    <td style="text-align: center;"><?php echo $row['specialization'] ?></td>
                    <td> 
                        <form method ="POST">
                            <input type="hidden" name="doctor_id" value="<?php echo $row['doctor_id'] ?>">
                            <input type="hidden" name="account_id" value="<?php echo $row['account_id'] ?>">
                            <input type="hidden" name="specialization" value="<?php echo $row['specialization'] ?>">
                         <input id ="updated-specialization" name="updated-doctor-specialization" placeholder="Add specialization">
                         <button id ="add-specialization" name="add-specialization" type="submit" > Update specialization </button> 
                         <!-- <button id ="resign-doctor" name="resign-doctor" type="submit" > Resign Doctor </button>  -->
                         </form>

                         <form method ="POST">
                            <input type="hidden" name="doctor_id2" value="<?php echo $row['doctor_id'] ?>">
                            <input type="hidden" name="account_id2" value="<?php echo $row['account_id'] ?>">
                            <input type="hidden" name="specialization2" value="<?php echo $row['specialization'] ?>">
                         <button id ="resign-doctor" name="resign-doctor" type="submit" > Resign Doctor </button> 
                         </form>
                    </td>

                </tr>
            <?php endwhile;?>
        </tbody>
    </table>
            
    
  
    <?php

    if (isset($_POST['add-specialization']))
    {
        $doctor_id = $mysqli->real_escape_string($_POST['doctor_id']);
        $account_id = $mysqli->real_escape_string($_POST['account_id']);
        $specialization = $mysqli->real_escape_string($_POST['specialization']);
        $updated_specialization =  $_POST['updated-doctor-specialization'];
         
        // $newSpecialization = json_encode($updated_specialization, JSON_PRETTY_PRINT);

        if (!empty($updated_specialization))
        {
            $query_update_doctor = "UPDATE tbldoctor SET specialization = '$updated_specialization' WHERE doctor_id = '$doctor_id'";
            $result_updated_specialization = $mysqli->query($query_update_doctor);
        }

        echo '<script> window.location.href = "dashboard.php"; </script>';
    }
    ?>
    
  
  


    
    <?php 
    
    if (isset($_POST['accept_doctor'])) {
      // Sanitize and retrieve data from the form
      $account_id = $mysqli->real_escape_string($_POST['account_id']);
      $request_id = $mysqli->real_escape_string($_POST['request_id']);
      $specialization = $mysqli->real_escape_string($_POST['specialization']);
      
      if (!empty($request_id) && !empty($account_id)) {
          // Insert data into tbldoctor table
          $query_insert_doctor = "INSERT INTO tbldoctor (account_id, specialization) VALUES ('$account_id', '$specialization')";
          $result_insert_doctor = $mysqli->query($query_insert_doctor);
  
          if ($result_insert_doctor) {
              // Delete the request from tblupgraderequest
              $query_delete_request = "DELETE FROM tblupgraderequest WHERE request_id = '$request_id'";
              $result_delete_request = $mysqli->query($query_delete_request);
  
              if ($result_delete_request) {
                  // Update user_type in tbluseraccount
                  $query_update_user_type = "UPDATE tbluseraccount SET user_type = 1 WHERE account_id = '$account_id'";
                  $result_update_user_type = $mysqli->query($query_update_user_type);
              }else {
                  echo 'Error deleting request: ' . $mysqli->error;
              }
              echo '<script> window.location.href = "dashboard.php"; </script>';
          } else {
              echo 'Error inserting doctor: ' . $mysqli->error;
          }
      } else {
          echo 'Error: Request ID or Account ID is empty.';
      }
  }
  ?>


<?php

if (isset($_POST['resign-doctor']))
{

    $doctor_id2 = $mysqli->real_escape_string($_POST['doctor_id2']);
    $account_id2 = $mysqli->real_escape_string($_POST['account_id2']);


            if (!empty($doctor_id2)) {
                // Insert data into tbldoctor table                
                // var_dump($doctor_id2);

                $query_delete_doctor = "DELETE FROM tbldoctor WHERE account_id = '$account_id2'";
                $result_delete_doctor = $mysqli->query($query_delete_doctor);
                if ($result_delete_doctor){
                    $query_update_user_type_delete_doctor = "UPDATE tbluseraccount SET user_type = 0 WHERE account_id = '$account_id2'";
                $mysqli->query($query_update_user_type_delete_doctor);
                }
                else{
                    echo 'Error updating user type: ' . $mysqli->error;
                }
        }
        else {
            echo 'Error deleting doctor: ' . $mysqli->error;
        }

        echo '<script> window.location.href = "dashboard.php"; </script>';

    }
?>


    
    <?php
    }



?>

    


 

</body>

</html>
