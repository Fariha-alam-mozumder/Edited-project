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

  if($Name=='admin' && $Password =='silver16'){
    echo "login successful";
    header("Location: dash.php");
  }
  else{
    echo "you are not admin";
  }
}
$con->close();
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

  
    .container {
      max-width: 300px;
      height: 300px;
      margin: 200px auto;
      padding: 20px;
      background: #889796;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      position: relative;
      margin-right: 100px;
     
    }
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
    padding: 0;
    background-image: url('admin.jpeg'); /* Replace 'background.jpg' with the path to your image */
    background-size: cover;
    background-position: center;
  }

  

    p {
    color: #193539;
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
      border: 1px solid#6c9f9d;
      border-radius: 5px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      width: 100%;
      background-color:#1c4f4c ;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color:#124f4c;
    }
  </style>
</head>
<body>

<div class="container">
  <h2> Admin Login </h2>
  
  <form method="POST">
    <input type="text" name="Name" id="Name" placeholder="Username" required>
    <input type="password" name="Password" id="Password" placeholder="Password" required><br><br>

    <input type="submit" name="submit" id="submit" value="Login">
    </form>

</div>

</body>
</html>
