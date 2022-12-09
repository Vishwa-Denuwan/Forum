<?php
session_start();
$serverName="localhost";
$userName="root";
$password="";
$dbName="forum";
if((isset($_POST["uname"]))||(isset($_POST["pass1"]))){
    $uName=$_POST["uname"];
    $pass=$_POST["pass1"];
    // create connection
    $conn=new mysqli($serverName,$userName,$password,$dbName);
    //check connection
    if($conn->connect_error){
        die("connection faild" .$conn->connect_error);
    }
    echo "<br>";
    $sql="SELECT * FROM user WHERE user_name='$uName' AND pass1='$pass'";
    $result=$conn->query($sql);
    if ($result!==FALSE && $result->num_rows==1){
        $_SESSION["loginuser"]=$uName;
        header("location:home.php");
    }else{
        $error="Invalid Username or Password ";
    }

    $conn->close();
    }

?>