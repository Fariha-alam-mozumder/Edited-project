<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname ="mysql";


$con = mysqli_connect($server, $username, $password,$dbname);

//making associative array for corresponding service provider and keeping id name in it
$s="Dance Partner";

$sql ="select Provider_Id,Name from `silver connect`.`service_provider` where Service_Name='$s'";
$result = mysqli_query($con, $sql);
if($result){
    $as_ar= array();
    while ($row = $result->fetch_assoc()) {
        $key = $row['Provider_Id'];
        $value = $row['Name'];
        $as_ar[$key] = $value;
    }
}

//Fetching provider id then updating

if (isset($_POST['givePoints'])) {
    $providerId = $_POST['providerId'];
//echo $providerId;
    
    $sql ="select * from `silver connect`.`service_provider` where Provider_Id='$providerId'";
  $result = mysqli_query($con, $sql);
  $ro = $result->fetch_assoc();
  $Points =$ro['Points'];
  //echo $Points;

  $sql1 = "UPDATE `silver connect`.`service_provider` SET Points = Points + 20 WHERE Provider_Id = '$providerId'";
  if ($con->query($sql1) === TRUE) {
    //echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}



}


//getting elderly-id
if (isset($_GET['elderlyId'])) {
    $elderlyId = $_GET['elderlyId'];
echo "<form action='dance.php' method='post'>";
echo "<input type='hidden' name='elder' value='$elderlyId'>";
echo "<p><button type='submit' class='disbutton' name='give'>Discard Points</button></p>";


echo "</form>";

 
}  

 //updating elderly point
    if (isset($_POST['give'])) {
        $elderlyId = $_POST['elder'];

    $sql3 ="select * from `silver connect`.`elderly` where Elderly_Id='$elderlyId'";
    $result3 = mysqli_query($con, $sql3);
    $ron = $result3->fetch_assoc();
    $Points =$ron['Points'];
    //echo $Points;



$sql2 = "UPDATE `silver connect`.`elderly` SET Points = Points - 20 WHERE Elderly_Id = '$elderlyId'";
if ($con->query($sql2) === TRUE) {
   // echo "Record updated successfully";
//inserting the update into booking table
    $sql3 = "INSERT INTO `silver connect`.`booking` (`Service_Name`, `Status`, `Elderly_Id`) VALUES ('Dance Partner', 'Confirmed', '$elderlyId');";

    if ($con->query($sql3) === TRUE) {
       echo "Points are discarded successfully";
    } else {
        echo "Error inserting booking record: " . $con->error;
    }
} else {
    echo "Error updating record: " . $con->error;
}

    }


    
  
    
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Service Providers</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #6a766b;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #4ca2cd, #6a766b);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #4ca2cd, #6a766b); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
   
        margin: 80px;
        padding: 0;
    }

    .container {
        
        max-width: 600px;
        margin: 20px auto;
        background-color: #afb6b6;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .service-provider {
        margin-bottom: 15px;
        padding: 10px;
        
    }

    .service-provider h3 {
        margin-top: 0;
    }
    h3 {
    margin-bottom: 2px;
    color: #000000
;}

    .service-provider p {
        margin-bottom: 5px;
        padding: 2pxpx;
    }

    .service-provider button {
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-left: 500px;
    }
    .buttons{
        margin-left: 300px;
    }
    
    .service-provider .buttons {
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        
    }
    .login-btn,
  .register-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #0a777e;
    color: #fff;
   
    border-radius: 5px;
    margin: 0 5px;
    white-space: 10px;
    margin-left: 15px;
   
    text-decoration: none;
   
    
  }
  .disbutton {
    display: inline-block;
    padding: 10px 20px;
    background-color: #0056b3;
    color: #fff;
   
    border-radius: 5px;
    margin: 0 5px;
    white-space: 10px;
    margin-left: 500px;
   
    text-decoration: none;
   
    
  }

    .service-provider button:hover {
        background-color: #0056b3;
       
    }
</style>
</head>
<body>

<div class="container">
    <div class="service-provider">
        <h3>Dance Partner(20)</h3><br>
        <?php
        

// Use the fetched data in the HTML section
foreach ($as_ar as $key => $value) {
    echo "<p>Provider: $key, $value </p>";

    $sql = "SELECT * FROM `silver connect`.`service_provider` WHERE Provider_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['P_Contact'];
        echo "<p>Email: $email</p>";
        echo "<p>Contact: $phone</p>";
    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }

        


echo "<form action='dance.php' method='post'>";
echo "<input type='hidden' name='providerId' value='$key'>";
echo "<p><button type='submit' name='givePoints'>Give Points</button></p>";
echo "</form>";


}

?>

<a href="ef_profile.php" class="login-btn">BACK</a>

        

        
    </div>


</div>

</body>
</html>
