<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$dbname ="mysql";


$con = mysqli_connect($server, $username, $password,$dbname);
$id= $_SESSION['Elderly_Id'];
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
     /* fallback for old browsers */
     background: -webkit-linear-gradient(to right, #6c9f9d, #274d4f);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #a1a6a6,#649284);/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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
  .container {
            width: 100%;
            margin: auto;
            padding: 20px;
            margin-left: 320px;
           
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
       
        <div class="col-lg-8">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent border-0">
              <h3 class="mb-0"><i class="far fa-clone pr-2"></i>Taken Services</h3>
            </div>
            <div class="card-body pt-4">
              <table class="table table-bordered">
                <tr>
                    <th>Provider Name</th>
                    <th>Service </th>
                    <th>Date</th>
                    <th>Points</th>
                  </tr>
                  <?php
                  $sql ="select * from `silver connect`.`booking` where Elderly_Id='$id'";
                  $result = mysqli_query($con, $sql);
                  if ($result) {
                      $as_ar = array();
                      while ($row = $result->fetch_assoc()) {
                        $provider_id = $row['Provider_Id'];
                          $service_name = $row['Service_Name'];
                          
                          $date = $row['Date'];


    //fetching provider name
    $elderly_sql = "SELECT Name FROM `silver connect`.`service_provider` WHERE Provider_Id='$provider_id'";
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
                          echo "<td>$service_name</td>";
                          echo "<td>$date</td>";
                          echo "<td>$service_point</td>";
                          
                          echo "</tr>";
                      }
                  }
                  

                  ?>
                  <!--<tr>
                    <td>Numan Khan
                       
                    </td>
                    <td>Dance Partner
                       
                    </td>
                    <td>03/02/2024
                       
                    </td>
                    <td>30
                       
                    </td>
                  </tr>
                  <tr>
                    <td>Fariha alam
                    <td>Gossip Partner
                       
                    </td>
                    <td>17/03/2024
                       
                    </td>
                    <td>20
                       
                    </td>
                
                  </tr>-->
                 
                
              </table>
              <a href="ef_profile.php" class="register">Back</a>
            </div>
          </div>
            
        </div>
      </div>
    </div>
  </div>
</body>
</html>
