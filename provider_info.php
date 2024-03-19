<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname ="mysql";


$con = mysqli_connect($server, $username, $password,$dbname);

if (isset($_POST['delete']) && isset($_POST['providerId'])) {
    $providerIdToDelete = $_POST['providerId'];

    // Delete the provider from the database
    $deleteSql = "DELETE FROM `silver connect`.`service_provider` WHERE Provider_Id = '$providerIdToDelete'";
    $deleteResult = mysqli_query($con, $deleteSql);

    if ($deleteResult) {
        // If deletion is successful, redirect to the same page to refresh the data
        header("Location: p_info.php");
        exit();
    } else {
        echo "Error in deleting provider information: " . mysqli_error($con);
    }
}

$s="Financial Help";

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
//query for dance partner

$s1="Dance Partner";

$sql1 ="select Provider_Id,Name from `silver connect`.`service_provider` where Service_Name='$s1'";
$result1 = mysqli_query($con, $sql1);
if($result1){
    $as_ar1= array();
    while ($row = $result1->fetch_assoc()) {
        $key = $row['Provider_Id'];
        $value = $row['Name'];
        $as_ar1[$key] = $value;
    }
}

//query for choreservice
$s2="Chore Service";

$sql2 ="select Provider_Id,Name from `silver connect`.`service_provider` where Service_Name='$s2'";
$result2 = mysqli_query($con, $sql2);
if($result2){
    $as_ar2= array();
    while ($row = $result2->fetch_assoc()) {
        $key = $row['Provider_Id'];
        $value = $row['Name'];
        $as_ar2[$key] = $value;
    }
}

//Medication

$s3="Medication";

$sql3 ="select Provider_Id,Name from `silver connect`.`service_provider` where Service_Name='$s3'";
$result3 = mysqli_query($con, $sql3);
if($result3){
    $as_ar3= array();
    while ($row = $result3->fetch_assoc()) {
        $key = $row['Provider_Id'];
        $value = $row['Name'];
        $as_ar3[$key] = $value;
    }
}

//Personal Care
$s4="Personal Care";

$sql4 ="select Provider_Id,Name from `silver connect`.`service_provider` where Service_Name='$s4'";
$result4 = mysqli_query($con, $sql4);
if($result4){
    $as_ar4= array();
    while ($row = $result4->fetch_assoc()) {
        $key = $row['Provider_Id'];
        $value = $row['Name'];
        $as_ar4[$key] = $value;
    }
}
//Housekeeping

$s5="Housekeeping";

$sql5 ="select Provider_Id,Name from `silver connect`.`service_provider` where Service_Name='$s5'";
$result5 = mysqli_query($con, $sql5);
if($result5){
    $as_ar5= array();
    while ($row = $result5->fetch_assoc()) {
        $key = $row['Provider_Id'];
        $value = $row['Name'];
        $as_ar5[$key] = $value;
    }
}

//Meal Delivery

$s6="Meal Delivery";

$sql6 ="select Provider_Id,Name from `silver connect`.`service_provider` where Service_Name='$s6'";
$result6 = mysqli_query($con, $sql6);
if($result6){
    $as_ar6= array();
    while ($row = $result6->fetch_assoc()) {
        $key = $row['Provider_Id'];
        $value = $row['Name'];
        $as_ar6[$key] = $value;
    }
}

//Health Checkup

$s7="Health Checkup";

$sql7 ="select Provider_Id,Name from `silver connect`.`service_provider` where Service_Name='$s7'";
$result7 = mysqli_query($con, $sql7);
if($result7){
    $as_ar7= array();
    while ($row = $result7->fetch_assoc()) {
        $key = $row['Provider_Id'];
        $value = $row['Name'];
        $as_ar7[$key] = $value;
    }
}

//Respite Care
$s8="Respite care";

$sql8 ="select Provider_Id,Name from `silver connect`.`service_provider` where Service_Name='$s8'";
$result8 = mysqli_query($con, $sql8);
if($result8){
    $as_ar8= array();
    while ($row = $result8->fetch_assoc()) {
        $key = $row['Provider_Id'];
        $value = $row['Name'];
        $as_ar8[$key] = $value;
    }
}
//gossip partner
$s9="Gossip Partner";

$sql9 ="select Provider_Id,Name from `silver connect`.`service_provider` where Service_Name='$s9'";
$result9 = mysqli_query($con, $sql9);
if($result9){
    $as_ar9= array();
    while ($row = $result9->fetch_assoc()) {
        $key = $row['Provider_Id'];
        $value = $row['Name'];
        $as_ar9[$key] = $value;
    }
}

//Home Safety
$s10="Home safety";

$sql10 ="select Provider_Id,Name from `silver connect`.`service_provider` where Service_Name='$s10'";
$result10 = mysqli_query($con, $sql10);
if($result10){
    $as_ar10= array();
    while ($row = $result10->fetch_assoc()) {
        $key = $row['Provider_Id'];
        $value = $row['Name'];
        $as_ar10[$key] = $value;
    }
}

//Transportation

$s11="Transportation";

$sql11 ="select Provider_Id,Name from `silver connect`.`service_provider` where Service_Name='$s11'";
$result11 = mysqli_query($con, $sql11);
if($result11){
    $as_ar11= array();
    while ($row = $result11->fetch_assoc()) {
        $key = $row['Provider_Id'];
        $value = $row['Name'];
        $as_ar11[$key] = $value;
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elderly Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: -webkit-linear-gradient(to right, #6c9f9d, #274d4f);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #a1a6a6,#649284);
            background-size: cover;
            background-color: #f4f4f4;
        }
        .sidebar {
            background-color: #444545;
            color: #fff;
            width: 200px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
          
            .login-btn,
  .register-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #0a777e ;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
   
    width: 140px;
  }
  
  .login-btn:hover,
  .register-btn:hover {
    background-color:#0a777e ;
  }  text-align: center;
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
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #0c0c0c;
            margin-left:150px;
        }

        .info {
            background-color: #d8d9d9;
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
        
    .info button {
        padding: 5px 10px;
        background-color: #c76547;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-left: 500px;}
        
        .info h4 {
            color: #100f0f;
            text-align:left;
        }
         .login-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color:#0a777e ;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
   
    width: 140px;
  }

        .info p {
            color: #070707;
            text-align:left;
        }

        .info ul {
            list-style-type: none;
            padding: 0;
        }

        .info li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul> <br><br>
            <li><a href="dash.php">Dashboard</a></li>
            <li><a href="e_info.php">Elderly Info</a></li>
            <li><a href="p_info.php" class="login-btn">Provider Info</a></li>
        </ul>
    </div>

<div class="container">
    <h1>Providers Information</h1>

    <div class="info">
        <h2>Financial Help </h2><br>
        <?php
foreach ($as_ar as $key => $value) {
    echo "<h4>$value ( $key) </h4>";

    $sql = "SELECT * FROM `silver connect`.`service_provider` WHERE Provider_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['P_Contact'];
        $point=$row['Points'];

        $sql="select * from `silver connect`.`booking` where Provider_Id='$key'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);


        echo "<p>Email: $email</p>";
        echo "<p>Points: $point</p>";

        echo "<p>Contact: $phone</p>";
        echo "<p>Number Of Given Services: $count</p>";
        
    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }

    echo "<form action='p_info.php' method='post'>";
echo "<input type='hidden' name='providerId' value='$key'>";
echo "<p><button type='submit' name='delete'>Delete</button></p>";
echo "</form>";
    
}
?>

      

    

</div>

<!--dance partner-->
<div class="info">
        <h2>Dance Partner </h2><br>
        <?php
foreach ($as_ar1 as $key => $value) {
    echo "<h4>$value ( $key) </h4>";

    $sql = "SELECT * FROM `silver connect`.`service_provider` WHERE Provider_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['P_Contact'];
        $point =$row['Points'];

        $sql="select * from `silver connect`.`booking` where Provider_Id='$key'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);


        echo "<p>Email: $email</p>";
        echo "<p>Points: $point</p>";
        echo "<p>Contact: $phone</p>";
        echo "<p>Number Of Given Services: $count</p>";

    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }

    echo "<form action='p_info.php' method='post'>";
echo "<input type='hidden' name='providerId' value='$key'>";
echo "<p><button type='submit' name='delete'>Delete</button></p>";
echo "</form>";
    
}
?>

      

    

</div>
<!--choreservice-->

<div class="info">
        <h2>Chore Service </h2><br>
        <?php
foreach ($as_ar2 as $key => $value) {
    echo "<h4>$value ( $key) </h4>";

    $sql = "SELECT * FROM `silver connect`.`service_provider` WHERE Provider_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['P_Contact'];
        $point = $row['Points'];

        $sql="select * from `silver connect`.`booking` where Provider_Id='$key'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);


        echo "<p>Email: $email</p>";
        echo "<p>Points: $point</p>";
        echo "<p>Contact: $phone</p>";
        echo "<p>Number Of Given Services: $count</p>";

    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }

    echo "<form action='p_info.php' method='post'>";
echo "<input type='hidden' name='providerId' value='$key'>";
echo "<p><button type='submit' name='delete'>Delete</button></p>";
echo "</form>";
    
}
?>

      

    

</div>

<!--Medication-->

<div class="info">
        <h2>Medication </h2><br>
        <?php
foreach ($as_ar3 as $key => $value) {
    echo "<h4>$value ( $key) </h4>";

    $sql = "SELECT * FROM `silver connect`.`service_provider` WHERE Provider_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['P_Contact'];
        $point = $row['Points'];

        $sql="select * from `silver connect`.`booking` where Provider_Id='$key'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);


        echo "<p>Email: $email</p>";
        echo "<p>Points: $point</p>";
        echo "<p>Contact: $phone</p>";
        echo "<p>Number Of Given Services: $count</p>";

    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }

    echo "<form action='p_info.php' method='post'>";
echo "<input type='hidden' name='providerId' value='$key'>";
echo "<p><button type='submit' name='delete'>Delete</button></p>";
echo "</form>";
    
}
?>

      

    

</div>

   <!--personal care-->
   
   <div class="info">
        <h2>Personal Care </h2><br>
        <?php
foreach ($as_ar4 as $key => $value) {
    echo "<h4>$value ( $key) </h4>";

    $sql = "SELECT * FROM `silver connect`.`service_provider` WHERE Provider_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['P_Contact'];
        $point = $row['Points'];

        $sql="select * from `silver connect`.`booking` where Provider_Id='$key'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);


        echo "<p>Email: $email</p>";
        echo "<p>Points: $point</p>";
        echo "<p>Contact: $phone</p>";
        echo "<p>Number Of Given Services: $count</p>";

    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }

    echo "<form action='p_info.php' method='post'>";
echo "<input type='hidden' name='providerId' value='$key'>";
echo "<p><button type='submit' name='delete'>Delete</button></p>";
echo "</form>";
    
}
?>

      

    

</div>

<!--Housekeeping-->

<div class="info">
        <h2>Housekeeping </h2><br>
        <?php
foreach ($as_ar5 as $key => $value) {
    echo "<h4>$value ( $key) </h4>";

    $sql = "SELECT * FROM `silver connect`.`service_provider` WHERE Provider_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['P_Contact'];
        $point = $row['Points'];

        $sql="select * from `silver connect`.`booking` where Provider_Id='$key'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);


        echo "<p>Email: $email</p>";
        echo "<p>Points: $point</p>";
        echo "<p>Contact: $phone</p>";
        echo "<p>Number Of Given Services: $count</p>";

    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }

    echo "<form action='p_info.php' method='post'>";
echo "<input type='hidden' name='providerId' value='$key'>";
echo "<p><button type='submit' name='delete'>Delete</button></p>";
echo "</form>";
    
}
?>

      

    

</div>

<!--Meal Delivery-->
<div class="info">
        <h2>Meal Delivery </h2><br>
        <?php
foreach ($as_ar6 as $key => $value) {
    echo "<h4>$value ( $key) </h4>";

    $sql = "SELECT * FROM `silver connect`.`service_provider` WHERE Provider_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['P_Contact'];
        $point = $row['Points'];

        $sql="select * from `silver connect`.`booking` where Provider_Id='$key'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);


        echo "<p>Email: $email</p>";
        echo "<p>Points: $point</p>";
        echo "<p>Contact: $phone</p>";
        echo "<p>Number Of Given Services: $count</p>";

    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }

    echo "<form action='p_info.php' method='post'>";
echo "<input type='hidden' name='providerId' value='$key'>";
echo "<p><button type='submit' name='delete'>Delete</button></p>";
echo "</form>";
    
}
?>

      

    

</div>

<!--Health Checkup-->
<div class="info">
        <h2>Health Checkup </h2><br>
        <?php
foreach ($as_ar7 as $key => $value) {
    echo "<h4>$value ( $key) </h4>";

    $sql = "SELECT * FROM `silver connect`.`service_provider` WHERE Provider_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['P_Contact'];
        $point = $row['Points'];

        $sql="select * from `silver connect`.`booking` where Provider_Id='$key'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);


        echo "<p>Email: $email</p>";
        echo "<p>Points: $point</p>";
        echo "<p>Contact: $phone</p>";
        echo "<p>Number Of Given Services: $count</p>";

    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }

    echo "<form action='p_info.php' method='post'>";
echo "<input type='hidden' name='providerId' value='$key'>";
echo "<p><button type='submit' name='delete'>Delete</button></p>";
echo "</form>";
    
}
?>

      

    

</div>

<!--Respite Care-->

<div class="info">
        <h2>Respite Care </h2><br>
        <?php
foreach ($as_ar8 as $key => $value) {
    echo "<h4>$value ( $key) </h4>";

    $sql = "SELECT * FROM `silver connect`.`service_provider` WHERE Provider_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['P_Contact'];
        $point = $row['Points'];

        $sql="select * from `silver connect`.`booking` where Provider_Id='$key'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);


        echo "<p>Email: $email</p>";
        echo "<p>Points: $point</p>";
        echo "<p>Contact: $phone</p>";
        echo "<p>Number Of Given Services: $count</p>";

    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }

    echo "<form action='p_info.php' method='post'>";
echo "<input type='hidden' name='providerId' value='$key'>";
echo "<p><button type='submit' name='delete'>Delete</button></p>";
echo "</form>";
    
}
?>

      

    

</div>

<!--Gossip Partner-->

<div class="info">
        <h2>Gossip Partner </h2><br>
        <?php
foreach ($as_ar9 as $key => $value) {
    echo "<h4>$value ( $key) </h4>";

    $sql = "SELECT * FROM `silver connect`.`service_provider` WHERE Provider_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['P_Contact'];
        $point = $row['Points'];

        $sql="select * from `silver connect`.`booking` where Provider_Id='$key'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);


        echo "<p>Email: $email</p>";
        echo "<p>Points: $point</p>";
        echo "<p>Contact: $phone</p>";
        echo "<p>Number Of Given Services: $count</p>";

    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }

    echo "<form action='p_info.php' method='post'>";
echo "<input type='hidden' name='providerId' value='$key'>";
echo "<p><button type='submit' name='delete'>Delete</button></p>";
echo "</form>";
    
}
?>

      

    

</div>

<!--Home Safety-->
<div class="info">
        <h2>Home Safety </h2><br>
        <?php
foreach ($as_ar10 as $key => $value) {
    echo "<h4>$value ( $key) </h4>";

    $sql = "SELECT * FROM `silver connect`.`service_provider` WHERE Provider_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['P_Contact'];
        $point = $row['Points'];

        $sql="select * from `silver connect`.`booking` where Provider_Id='$key'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);


        echo "<p>Email: $email</p>";
        echo "<p>Points: $point</p>";
        echo "<p>Contact: $phone</p>";
        echo "<p>Number Of Given Services: $count</p>";

    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }

    echo "<form action='p_info.php' method='post'>";
echo "<input type='hidden' name='providerId' value='$key'>";
echo "<p><button type='submit' name='delete'>Delete</button></p>";
echo "</form>";
    
}
?>

      

    

</div>

<!--Transportation-->

<div class="info">
        <h2>Transportation</h2><br>
        <?php
foreach ($as_ar11 as $key => $value) {
    echo "<h4>$value ( $key) </h4>";

    $sql = "SELECT * FROM `silver connect`.`service_provider` WHERE Provider_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['P_Contact'];
        $point = $row['Points'];

        $sql="select * from `silver connect`.`booking` where Provider_Id='$key'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);


        echo "<p>Email: $email</p>";
        echo "<p>Points: $point</p>";
        echo "<p>Contact: $phone</p>";
        echo "<p>Number Of Given Services: $count</p>";

    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }

    echo "<form action='p_info.php' method='post'>";
echo "<input type='hidden' name='providerId' value='$key'>";
echo "<p><button type='submit' name='delete'>Delete</button></p>";
echo "</form>";
    
}
?>

      

    

</div>





</div>

</body>
</html>
