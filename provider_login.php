<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname ="mysql";
//$schema ="silver connect"

$con = mysqli_connect($server, $username, $password,$dbname);


//echo "success";
if(!empty($_POST['submit'])){
  $Name= $_POST['Name'];
  $Password =$_POST['Password'];

  $sql ="select * from `silver connect`.`service_provider` where Name='$Name' and Password='$Password'";
  $result = mysqli_query($con, $sql);
  //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);
  
  if($count>0){
    
    //echo "login successful";
    $row = $result->fetch_assoc();
    $_SESSION['Name'] = $Name;
    $Provider_Id =$row['Provider_Id'];
    $_SESSION['Provider_Id'] = $Provider_Id;
    $Service_Name= $row['Service_Name'];
    $_SESSION['Service_Name']= $Service_Name;
    $Points= $row['Points'];
    $_SESSION['Points']= $Points;
$Percentage= $row['Percentage'];
$_SESSION['Percentage']=$Percentage;
    
    header("Location: p_f_profile.php");
    exit;
  }
  else{
  echo "invalid user";
  }
  $con->close();
}
  





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('bc.jpeg'); /* Replace 'background.jpg' with the path to your image */
    background-size: cover;
    background-position: center;
  }
    .container {
      max-width: 300px;
      margin: 200px auto;
      padding: 20px;
      background: #b3adad;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      position: relative;
      margin-right: 50px;
   

     
    }
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
    padding: 0;
    background-image: url('p3.jpeg'); /* Replace 'background.jpg' with the path to your image */
    background-size: cover;
    background-position: center;
  }

    a{
        text-decoration: none;
        color:green ;
    }

    p {
    color: black;
    text-align: center;
  }
    h2 {
      text-align: center;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      width: 100%;
      background-color:  #000000;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color:  #000000 ;
      
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Login</h2>

  <form method="POST">
    <input type="text" name="Name" id="Name" placeholder="Username" required>
    <input type="password" name="Password" id="Password" placeholder="Password" required>

    <input type="submit" name="submit" id="submit" value="Login">
</form>
    <p>Don't have an account? <a href="p_regi.php" class="link">Register here</a></p>
  
</div>

</body>
</html>
