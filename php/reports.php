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
    <title>Document</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/reports.css">

</head>
<body>
      
<?php 

//list of all doctors
// SELECT  * from student_address INNER JOIN student_marks on student_address.sid=student_marks.sid;

    $query2 = "SELECT up.firstname as user_fname, up.lastname as user_lname, up.gender as user_gender FROM tbluseraccount ua JOIN tbluserprofile up ON up.user_id=ua.account_id 
    WHERE ua.user_type=1";
     $result2 = mysqli_query($connection, $query2);



     $query3 = "SELECT up.firstname as user_fname, up.lastname as user_lname, up.gender as user_gender, d.specialization as doctor_specialization FROM tbluseraccount ua 
     JOIN tbluserprofile up ON up.user_id=ua.account_id JOIN tbldoctor d ON d.account_id=ua.account_id GROUP BY d.specialization";
      $result3 = mysqli_query($connection, $query3);
 
    
    

?>

    <div class ="doctorlist">
    LIST OF ALL DOCTORS
    <br>
    <br>
    <br>
        <table> 
        
        <thead>
                    <tr>
                        <th> First Name</th>
                        <th> Last Name </th>
                        <th> Gender </th>
                    </tr>
        </thead>
                <tbody>
                <?php while ( $doctors = mysqli_fetch_assoc($result2)){?> 
                        <tr> 
                            <td style="text-align: center;"><?php echo $doctors['user_fname'] ?></td>
                            <td style="text-align: center;"><?php echo $doctors['user_lname'] ?></td>
                            <td style="text-align: center;"><?php echo $doctors['user_gender'] ?></td>
                            <td style="text-align: center;">
                            </td>
                        </tr>
                        <?php }?>
                </tbody>
            
        </table>

    </div>

    <div class ="specializations">
    LIST OF SPECIALIZATIONS
    <br>
    <br>
    <br>
        <table>

        <thead>
                    <tr>
                        <!-- <th> First Name</th>
                        <th> Last Name </th>
                        <th> Gender </th> -->
                        <th> Specialization </th>
                    </tr>
        </thead>
                <tbody>
                <?php while (   $specialization = mysqli_fetch_assoc($result3)){?>
                        <tr> 
                            <!-- <td style="text-align: center;"><?php echo $specialization['user_fname'] ?></td>
                            <td style="text-align: center;"><?php echo $specialization['user_lname'] ?></td>
                            <td style="text-align: center;"><?php echo $specialization['user_gender'] ?></td> -->
                            <td style="text-align: center;"><?php echo $specialization['doctor_specialization'] ?></td>
                            </td>
                        </tr>
                        <?php }?>
                </tbody>
            
        </table>


    </div>


</body>
</html>