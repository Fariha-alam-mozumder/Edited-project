<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname ="mysql";


$con = mysqli_connect($server, $username, $password,$dbname);

if (isset($_POST['delete']) && isset($_POST['elderlyId'])) {
    $elderlyIdToDelete = $_POST['elderlyId'];

    // Delete the elderly information from the database
    $deleteSql = "DELETE FROM `silver connect`.`elderly` WHERE Elderly_Id = '$elderlyIdToDelete'";
    $deleteResult = mysqli_query($con, $deleteSql);
    $deleteSql1 = "DELETE FROM `silver connect`.`booking` WHERE Elderly_Id ='$elderlyIdToDelete'";

    if ($deleteResult ) {
        // If deletion is successful, redirect to the same page to refresh the data
        header("Location: e_info.php");
        exit();
    } else {
        echo "Error in deleting elderly information: " . mysqli_error($con);
    }
}


$sql= "select* from `silver connect`.`elderly`";
$result = mysqli_query($con, $sql);
if($result){
    $as_ar= array();
    while ($row = $result->fetch_assoc()) {
        $key = $row['Elderly_Id'];
        $value = $row['Name'];
        $as_ar[$key] = $value;
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
    background: linear-gradient(to right, #99a2a2,rgb(89, 129, 142));
            
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
        }

        .container {
            width: 100%;
            margin: auto;
            padding: 20px;
           
        }

        h1 {
            margin-left:500px;
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
            text-align:left;
        }

        .info p {
            color: #070707;
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
    
  .register-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #89919a;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
   
    width: 140px;
  }
  

  .register-btn:hover {
    background-color:#89919a;
  }

        .info ul {
            list-style-type: none;
            padding: 0;
        }
        .info button {
        padding: 5px 10px;
        background-color: #c76547;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-left: 500px;}

        .info li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul> <br><br>
            <li><a href="dash.php">Dashboard</a></li>
            <li><a href="e_info.php" class="login-btn">Elderly Info</a></li>
            <li><a href="p_info.php">Provider Info</a></li>
       
        </ul>
    </div>

<div class="container">
    <h1>Elderly Information</h1>
    <?php
foreach ($as_ar as $key => $value) {
    echo "<div class='info'>";
    echo "<h2>$value</h2>"; 
    //echo "<p>Elderly: $key, $value </p>";

    $sql = "SELECT * FROM `silver connect`.`elderly` where Elderly_Id='$key'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $age = $row['Age'];
        $add = $row['Address'];
        $point= $row['Points'];
        $contact=$row['Contact'];
        $sql="select * from `silver connect`.`booking` where Elderly_Id='$key'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        echo "<p>Age: $age</p>";
        echo "<p>Point: $point</p>";
        echo "<p>Address: $add</p>";
        echo "<p>Contact: $contact</p>";
       
        echo "<p>Number of taken services: $count</p>";
    } else {
        echo "Error in SQL query: " . mysqli_error($con);
    }
    echo "<form action='e_info.php' method='post'>";
    echo "<input type='hidden' name='elderlyId' value='$key'>";
    echo "<p><button type='submit' name='delete'>Delete</button></p>";
    echo "</form>";

   echo "</div>";     
}
?>


    
    

</div>

</body>
</html>
