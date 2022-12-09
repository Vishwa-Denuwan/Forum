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
            padding-right:70%;
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
            height: 400px;
            background-color:white;
            
            padding:10px;
            border-radius:4px;
            margin-top:10px;
        }
    </style>
</head>
<body>
<?php 
    $uName=$email=$pass1=$pass2="";
    $uNameError=$emailError=$passError1=$passError2=$passError3="";
    $error=array();
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST["uname"])||!isset($_POST["uname"])){
            $uNameError="Enter user name";
            $error=array_push($uNameError);
        }else{
            $uName=test($_POST["uname"]);
        }
        if(empty($_POST["email"])|| !isset($_POST["email"])){
            $emailError="Enter your email";
            $error=array_push($emailError);
        }else{
            $email=test($_POST["email"]);
        }
        if(empty($_POST["pass1"])|| !isset($_POST["pass1"])){
            $passError1="Enter your password";
            $error=array_push($passError1);
        }else{
            $pass1=test($_POST["pass1"]);
        }
        if(empty($_POST["pass2"])|| !isset($_POST["pass2"])){
            $passError2="Enter your password";
            $error=array_push($passError2);
        }else{
            $pass2=test($_POST["pass2"]);
        }
        if(isset($upass1) !== isset($upass2)){
            $passError3="Confirm password";
            $error=array_push($passError3);
        }
    }
    function test($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
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
    $sql="INSERT INTO user(user_id,user_name,email,pass1,pass2)
        VALUE('','$uName','$email','$pass1','$pass2')";
    if ($conn->query($sql)===FALSE){
        echo "error".$sql."<br>".$conn->error;
    }
    $conn->close();
    


?>
    <div class="header">
        <div>
            <h1>ABC Forum</h1>
        </div>
        <div class="btn-group btn-group-lg">
            <button class="btn btn-primary"><a href="userRegistation.php" style="color:white; text-decoration:none;">Sign Up</a></button>
            <button class="btn btn-primary"><a href="loginform.php" style="color:white; text-decoration:none;">Login</a></button>
        </div>

    </div>
    <div class="mid">
        <div class="container-fluid">
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="form-size">
                        <h1>Sign Up</h1>
                        <form action="" method="post" class="container">
                            <div class="form-group">
                                <label for="">User Name:</label>
                                <br>
                                <input type="text"  name="uname" placeholder="Enter User Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email:</label>
                                <br>
                                <input type="email"  name="email" placeholder="Enter Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password:</label>
                                <br>
                                <input type="password" name="pass1" placeholder="Enter password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password:</label>
                                <br>
                                <input type="password" name="pass2" placeholder="password again" class="form-control">
                            </div>
                            <div class="form-group" style="margin:10px;">
                                <button type="submit" class="btn btn-primary"> Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">

    </div>
</body>
</html>