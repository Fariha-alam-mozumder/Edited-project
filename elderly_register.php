<?php
if(isset($_POST['Name'])){
$server = "localhost";
$username = "root";
$password = "";
$dbname ="mysql";


$con = mysqli_connect($server, $username, $password,$dbname);

if(!$con){
    die("connection failed due to" . mysqli_connect_error());
}


//echo "connection successful";
$Name = $_POST['Name'];
$Age = $_POST['Age'];
$Address = $_POST['Address'];
$Contact = $_POST['Contact'];

$Password = $_POST['Password'];


$sql = "INSERT INTO `silver connect`.`elderly` ( `Name`, `Age`, `Address`, `Contact`, `Password`) VALUES ('$Name', '$Age', '$Address', '$Contact', '$Password');";

if($con->query($sql)== true){
    // echo "successfully inserted";
   }
   else{
     echo "ERROR: $sql <br> $con->error";
   }
    $con->close();
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elderly </title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('elderly register.jpeg'); /* Replace 'background.jpg' with the path to your image */
    background-size: cover;
    background-position: center;
  }

    .container {
        width: 400px;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      margin-left: 100px;
    }

    h2 {
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="password"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      background-color: #0e573c;
      color: #fff;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color: #0e573c;
    }

    .link {
      color: #4caf50;
      text-decoration: none;
    }

    .link:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>

<div class="container">
  <h2>Elderly</h2>
  <form action="elderly.php" method="POST">
    
    <input type="text" name="Name" id="Name" placeholder="Username" required>
    <input type="number" name="Age" id="Age" placeholder="Age" required>
    <input type="text" name="Address" id="Address" placeholder="Address" required>
    <input type="number" name="Contact" id="Contact" placeholder="contact" required>

    <input type="password" name="Password" id="Password" placeholder="Password" required>
    

    <button type="submit" class="button">Submit</button>
  </form>
  <p>Already Registered? <a href="Elderly_login_page.html" class="link">Login here</a></p>
</div>

</body>
</html>
