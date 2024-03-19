<?php
//session_start();

$server = "localhost";
$username = "root";
$password = "";
$dbname ="mysql";
$con = mysqli_connect($server, $username, $password,$dbname);
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
    margin-left: 0px;
   
    
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

        .sidebar {
            background-color: #444545;
            color: #fff;
            width: 200px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            text-align: center;
        }
        
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        
        .sidebar ul li {
            padding: 10px;
        }
        
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }
        
        .content {
            margin-left: 200px;
            padding: 20px;
            background-color: #89919a;
        }

        .container {
            width: 100%;
            margin: auto;
            padding: 20px;
            margin-left: 320px;
           
        }

        h1 {
            text-align: center;
            color: #0c0c0c;
        }

        .info {
            background-color: #bdc1c1;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            margin-left: 300px;
            width:600px;
            text-align: center;
        }

        .info h2 {
            color: #100f0f;
            margin-top: 0;
        }

        .info p {
            color: #070707;
        }
        .login-btn,
  .login-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color:#0a777e ;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
   
    width: 140px;
  }
  
  .login-btn:hover,
  .register-btn:hover {
    background-color:#89919a;
  }

        .info ul {
            list-style-type: none;
            padding: 0;
        }

        .info li {
            margin-bottom: 10px;
        }


  
  
  .login-btn:hover,
  .register-btn:hover {
    background-color: #0a777e;
   

  }
  .register:hover {
    background-color: #0a777e;
   

  }

.student-profile .table td {
    font-size: 17px;
    padding: 5px 10px;
    color: #000;
    text-align: center;
    height: 50px;
   
}
.student-profile .table th
{
    font-size: 17px;
    padding: 5px 10px;
    color: #110d0d;
    text-align: center;
    height: 50px;
    background-color: #a4aba5 ;
    border-radius: 5px;
}
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <br><br>
            <li><a href="dash.php" class="login-btn">Dashboard</a></li>
            <li><a href="e_info.php" >Elderly Info</a></li>
            <li><a href="p_info.php">Provider Info</a></li>
        
        </ul>
    </div>

  <div class="student-profile py-4">
    <div class="container">
      <div class="row">
       
        <div class="col-lg-10">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent border-0">
              <h3 class="mb-0"><i class="far fa-clone pr-4"></i>Booking Information</h3>
            </div>
            <div class="card-body pt-6">
              <table class="table table-bordered">
              <tr>
                    <th>Elderly Name</th>
                    <th>Provider Name</th>
                    <th>Service</th>
                    <th>Transaction of points </th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>

              <?php
                  $sql ="select * from `silver connect`.`booking`";
                  $result = mysqli_query($con, $sql);
                  if ($result) {
                      $as_ar = array();
                      while ($row = $result->fetch_assoc()) {
                        $provider_id = $row['Provider_Id'];
                        $elderly_id = $row['Elderly_Id'];
                          $service_name = $row['Service_Name'];
                          $status=$row['Status'];
                          $date = $row['Date'];

                              //fetching provider name
    $p_sql = "SELECT Name FROM `silver connect`.`service_provider` WHERE Provider_Id='$provider_id'";
    $p_result = mysqli_query($con, $p_sql);
    $p_name = "";
    if ($p_result && mysqli_num_rows($p_result) > 0) {
        $p_row = mysqli_fetch_assoc($p_result);
        $p_name = $p_row['Name'];
    }

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
                          echo "<td>$p_name</td>";
                          echo "<td>$service_name</td>";
                          echo "<td>$service_point</td>";
                          echo "<td>$date</td>";
                          
                          echo "<td>$status</td>";
                          echo "</tr>";
                      }
                  }
                  ?>


                
              </table>
            </div>
          </div>
            
        </div>
      </div>
    </div>
  </div>
</body>
</html>
