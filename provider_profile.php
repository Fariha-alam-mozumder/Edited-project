<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname ="mysql";
//$schema ="silver connect"

$con = mysqli_connect($server, $username, $password,$dbname);
if(!$con){
    die("connection failed due to" . mysqli_connect_error());
}


//echo "connection successful";
$name= $_SESSION['Name'];
$id= $_SESSION['Provider_Id'];

$se =$_SESSION['Service_Name'];
$points=$_SESSION['Points'];

//fetching booking info

/*$sql ="select * from `silver connect`.`booking` where Provider_Id='$id'";
$result = mysqli_query($con, $sql);
if($result){
    $as_ar= array();
    while ($row = $result->fetch_assoc()) {
        $key = $row['Provider_Id'];
        
        
        $value = $row['Service_Name'];
        $as_ar[$key] = $value;
    }
}*/
if(isset($_POST['task_completed'])) {
    // Perform update query to set the status of booking as "Completed"
    $update_sql = "UPDATE `silver connect`.`booking` SET Status='Completed' WHERE Provider_Id='$id' AND Status='In process'";
    $update_result = mysqli_query($con, $update_sql);
    /*if($update_result) {
        echo "<script>alert('Tasks completed successfully.');</script>";
        // You can redirect to another page or perform any other action here after updating the status.
    } else {
        echo "<script>alert('Failed to update tasks.');</script>";
    }*/
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Profile</title>
    <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
<!-- Bootstrap CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<!-- Font Awesome CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <style>
        body {
    background: #67B26F;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #4ca2cd, #67B26F);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #4ca2cd, #67B26F); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    padding: 0;
    margin: 0;
    font-family: 'Lato', sans-serif;
    color: #000;
}
.student-profile .card {
    margin-top: 50px;
    border-radius: 10px;
}
.student-profile .card .card-header .profile_img {
    width: 300px;
    height: 300px;
    object-fit: cover;
     margin-top: 50px auto;
    border: 5px solid #ccc;
    border-radius: 50%;
}
.student-profile .card h3 {
    font-size: 20px;
    font-weight: 700;
}
.student-profile .card p {
    font-size: 16px;
    color: #000;
}
.login-btn,
  .register-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #0a777e;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin: 0 2px;
    white-space: 10px;
    margin-left: 80px;
   
    
  }
  h3 {
   margin-left: 200px;
   margin-bottom:2px;
   color: #000000
   
;
 }
  
  .register {
    display: inline-block;
    padding: 10px 20px;
    background-color: #0a777e;
    color: #fff;
   
    border-radius: 5px;
    margin: 0 10px;
    white-space: 10px;
    margin-left: 280px;
    text-decoration: none;
   
    
  }


  
  
  .login-btn:hover,
  .register-btn:hover {
    background-color: #0a777e;
   

  }
  .register:hover {
    background-color: #0a777e;
   

  }
.student-profile .table th,
.student-profile .table td {
    font-size: 16px;
    padding: 5px 10px;
    color: #000;
    text-align: center;
}
    </style>
</head>
<body>
  <div class="student-profile py-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent text-center">
              <img class="profile_img" src="pro.jpeg" alt="student dp">
              <h2><?php echo $name; ?></h2>
            </div>
            <div class="card-body">
                <p class="mb-0"><strong class="pr-1">Service:</strong><?php echo $se; ?></p>
              <p class="mb-0"><strong class="pr-1">Provider ID:</strong><?php echo $id; ?></p>
              <p class="mb-0"><strong class="pr-1">Points:</strong><?php echo $points; ?></p><br>
              <!--<button class="login-btn">Task Completed</button>-->
              <form method="post">
            <button class="login-btn" name="task_completed">Task Completed</button>
        </form>
              
            
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent border-0">
              <h3 class="mb-0"><i class="far fa-clone pr-2"></i>Booking Information</h3>
            </div>
            <div class="card-body pt-4">
              <table class="table table-bordered">
                <tr>
                    <th>Elderly Name</th>
                    <th>Transaction of points </th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                 <?php
                  $sql = "SELECT * FROM `silver connect`.`booking` WHERE Provider_Id='$id'";
                  $result = mysqli_query($con, $sql);
                  if ($result) {
                      $as_ar = array();
                      while ($row = $result->fetch_assoc()) {
                          $elderly_id = $row['Elderly_Id'];
                          $service_name = $row['Service_Name'];
                          
                          $date = $row['Date'];
                          $status = $row['Status'];
                  
                          // Fetching elderly name from the elderly table
                          $elderly_sql = "SELECT Name FROM `silver connect`.`elderly` WHERE Elderly_Id='$elderly_id'";
                          $elderly_result = mysqli_query($con, $elderly_sql);
                          $elderly_name = "";
                          if ($elderly_result && mysqli_num_rows($elderly_result) > 0) {
                              $elderly_row = mysqli_fetch_assoc($elderly_result);
                              $elderly_name = $elderly_row['Name'];
                          }
                  
                          // Fetching service point from the service table
                          $service_sql = "SELECT Service_point FROM `silver connect`.`service` WHERE Service_Name='$service_name'";
                          $service_result = mysqli_query($con, $service_sql);
                          $service_point = "";
                          if ($service_result && mysqli_num_rows($service_result) > 0) {
                              $service_row = mysqli_fetch_assoc($service_result);
                              $service_point = $service_row['Service_point'];
                          }
                  
                          echo "<tr>";
                          echo "<td>$elderly_name</td>";
                          echo "<td>$service_point</td>";
                          echo "<td>$date</td>";
                          
                          echo "<td>$status</td>";
                          echo "</tr>";
                      }
                  }
                  ?>

                
              </table>
              <a href="p_logout.php" class="register">LOG OUT</a>
             

            </div>
          </div>
            
        </div>
      </div>
    </div>
  </div>
</body>
</html>
