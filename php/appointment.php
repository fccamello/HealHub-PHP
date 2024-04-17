<?php    
  session_start(); 
    include '../php/connect.php';
    
    //include 'readrecords.php';   
    require_once '../includes/header.php'; 
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/appointment.css">
  <link rel="stylesheet" href="../css/index.css">
  <title>Dasboard</title>
</head>

<body>

<div id = "appointment-form">

<form id="appointment-form" class="auth-login-wrapper" method="post">
        <p style = "text-align: center;"> BOOK AN APPOINTMENT </p>
        <!-- date -->
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
        <button id="set-appointment" name ="btnSetAppointment" type="submit" style ="text-align: center;"> Set Appointment</button>
</form>

</div>

</body>

</html>


<?php	
	if(isset($_POST['btnSetAppointment'])){		
		//retrieve data from form and save the value to a variable
		//for tbluserprofile
    
    
    $PatientID = 1;
    $DoctorID = 2;
   
    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];
    
    $appointmentDate = "$year-$month-$day";
		
		//save data to tbluserprofile			

    $sql1 ="INSERT INTO tblappointment(patient_id,doctor_id,appointment_date) VALUES('$PatientID', '$DoctorID', '$appointmentDate')";
		mysqli_query($connection, $sql1);
		
  }
  ?>


<?php 
$mysqli = new mysqli('127.0.0.1', 'root','','dbcamellof1') or die (mysqli_error($mysqli));
$resultset = $mysqli->query("SELECT* from tblappointment") or die ($mysqli->error);
?>

<p style = "text-align: center; margin-top: 2%" > APPOINTMENT TABLE </p>
  <table id ="tblappointment" cellspacing="0" width="100%" >

  <thead>
    <tr>
      <th> Appointment ID </th>
      <th> Patient ID </th>
      <th> Doctor ID </th>
      <th> Appointment Date </th>
  </thead>

  <tbody>
    <?php while ($row = $resultset -> fetch_assoc()) : ?>

      <tr> 
        <td> <?php echo $row['appointment_id'] ?> </td>
        <td> <?php echo $row['patient_id'] ?> </td>
        <td> <?php echo $row['doctor_id'] ?> </td>
        <td> <?php echo $row['appointment_date'] ?> </td>
        <td> 
          <a href = ""> VIEW </a>
          <a href = ""> DELETE </a>
    </tr>
    <?php endwhile;?>

  </tbody>


  </table>

  <footer class="page-footer" style="margin-top: 10%";>
            <h2>Fria Mae Camello</h2>
            <h4>BSCS - 2</h4>
  </footer>