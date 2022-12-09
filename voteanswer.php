<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $serverName="localhost";
    $userName="root";
    $password="";
    $dbName="forum";
    $vote="";
    if ((isset($_GET["user"]))||(isset($_GET["quesId"]))|| (isset($_GET["ansId"]))){
        $qId=$_GET["quesId"];
        $aId=$_GET["ansId"];
        $uName=$_GET["user"];
    }
    if ((isset($_POST["vote1"]))){
        $vote=$_POST["vote1"];
    }
    if ((isset($_POST["vote2"]))){
        $vote=$_POST["vote2"];
    }
    // create connection
    $conn=new mysqli($serverName,$userName,$password,$dbName);
    //check connection
    if($conn->connect_error){
        die("connection faild" .$conn->connect_error);
    }
    echo "<br>";
    
    //create recode
    $sql="INSERT IGNORE INTO vote(answer_id,user_name,vote)
        VALUES ('$aId','$uName','$vote') ";
    if ($conn->query($sql)===FALSE){
            echo "error".$sql."<br>".$conn->error;
    }
    $conn->close();
    


?>
</body>
</html>