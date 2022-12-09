<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .header{
            background-color:#3e4444;
            padding:20px 0px 20px 10px;
            height:90px;
            color:#ffffff;

        }
        .header h1{
            float:left;
            padding-right:60%;
            text-shadow:2px 2px 4px #c83349;
            font-family: Arial, Helvetica, sans-serif;
        }
        .mid{
            background-color:#d6d6c2;
            height:600px;
            padding:100px 400px 100px 400px;
            text-align:left;
            font-size:20px;
            align:center;
        }
        .bottom{
            background-color:#3e4444;
            padding:20px 0px 20px 10px;
            height:120px;
        }
        .form-size{
            width: 700px;
            height: 420px;
            background-color:white;
            
            padding:10px;
            border-radius:4px;
            margin-top:10px;
        }
    </style>
</head>


<body>
    <div class="header">
        <div>
            <h1>ABC Forum</h1>
        </div>
        <div class="btn-group btn-group-lg">
            <button class="btn btn-primary"><a href="userRegistation.php" style="color:white; text-decoration:none;">Sign Up</a></button>
            <button class="btn btn-primary"><a href="loginform.php" style="color:white; text-decoration:none;">Login</a></button>
            <button class="btn btn-primary"><a href="logout.php" style="color:white; text-decoration:none;">Log Out</a></button>
        </div>

    </div>
    <div class="container">
    <h1>Questions</h1>
    <?php
    $serverName="localhost";
    $userName="root";
    $password="";
    $dbName="forum";
    // create connection
    $conn=new mysqli($serverName,$userName,$password,$dbName);
    //check connection
    if($conn->connect_error){
        die("connection faild" .$conn->connect_error);
    }
    echo "<br>";
    //create recode
    $sql="SELECT * FROM question";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "No: ".$row["question_id"]."<br>";
            echo "Question: "."<a href='answer.php?quesId=$row[question_id]' style='text-decoration:none; font-size:20px;'>" .$row["question"]. "</a>"."<br>";
            // get user name from user tb
            $sqlUName="SELECT user_name FROM user WHERE user_id='$row[user_id]'";
            $resultUName=$conn->query($sqlUName);
            if($resultUName->num_rows==1){
                while($rowUName=$resultUName->fetch_assoc()){
                    echo " <h6 style='color:green; padding:0px 0px 0px 1000px;'> From : " .$rowUName["user_name"]."</h6>";
                }
            }
            echo " <h6 style='color:green; padding:0px 0px 0px 1000px;''> Date : ".$row["subdate"]."</h6><br>";
            echo "<hr>";
        }
    }
    $conn->close();    
    ?>
    </div>
    <div class="bottom">

    </div>
    
</body>
</html>