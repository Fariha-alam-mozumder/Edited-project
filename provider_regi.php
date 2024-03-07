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

$number = $_POST['number'];
$dropdown = $_POST['dropdown'];
$password = $_POST['password'];



$sql = "INSERT INTO `silver connect`.`service_provider` ( `Name`, `P_Contact`, `Service_Name`, `Password`) VALUES ('$Name', '$number', '$dropdown', '$password');";
//echo $sql;

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
  <title>Elderly</title>
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
    background-image: url('provider register.jpeg'); /* Replace 'background.jpg' with the path to your image */
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
      margin-left: 900px;
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
      background-color:  #082140;
      color: #fff;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color:#082140;
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
  <h2>Service Provider</h2>
  <form action="p_regi.php" method="POST">
    
    <input type="text" name="Name" id="Name" placeholder="Username" required>
    
    
    <input type="number" name="number" id="number" placeholder="contact" required>
    <label for="dropdown">Choose an option:</label>
  
  <select id="dropdown" name="dropdown">
    <option value="personalcare">Personal Care</option>
    <option value="Transportation">Transportation</option>
    <option value="Meal Delivery">Meal Delivery</option>
    <option value="Dance Partner">Dance Partner</option>
    <option value="Housekeeping">Housekeeping</option>
    <option value="Home Safety">Home Safety</option>
    <option value="Financial Help">Financial Help</option>
    <option value="Medication">Medication</option>
    <option value="Health Checkup">Health Checkup</option>
    <option value="Respite Care">Respite Care</option>
    <option value="Gossip Partner">Gossip Partner</option>
    <option value="Chore Service">Chore Service</option>
    
   
  </select>
  <input type="password" name="password" id="password" placeholder="Password" required>
  
   
    <button type="submit" class="button">Submit</button>
  </form>
  <p>Already Registered? <a href="Providerlogin.html" class="link">Login here</a></p>
</div>

</body>
</html>

