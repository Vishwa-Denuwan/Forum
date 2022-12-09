<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
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
            height:700px;
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
            height: 500px;
            background-color:white;
            padding:10px;
            border-radius:4px;
            margin-top:10px;
        }
    </style>
</head>
<body>
<?php
    session_start();
    $serverName="localhost";
    $userName="root";
    $password="";
    $dbName="forum";
    if((isset($_POST["cata"]))||(isset($_POST["ques"]))){
        $question=$_POST["ques"];
        $catagary=$_POST["cata"];
        // create connection
        $conn=new mysqli($serverName,$userName,$password,$dbName);
        //check connection
        if($conn->connect_error){
            die("connection faild" .$conn->connect_error);
        }
        echo "<br>";
        //get user id to the question tb
        $sqlUId="SELECT * FROM user WHERE user_name='$_SESSION[loginuser]'";
            $resultUId=$conn->query($sqlUId);
            if($resultUId->num_rows==1){
                while($rowUId=$resultUId->fetch_assoc()){
                    $UId=$rowUId["user_id"];
                }

            }
        //create recode
        $sql="INSERT INTO question(question_id,user_id,subdate,catagary,question)
        VALUES('','$UId',now(),'$catagary','$question')";
        if ($conn->query($sql)===TRUE){
            echo"New recode created";
        }else{
            echo "error".$sql."<br>".$conn->error;
        }
        $conn->close();
    }
    
?>
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
    <div class="mid">
        <div class="container-fluid"> 
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-size">
                    <h1>Submit Your Question:</h1>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">select catagary </label>
                            <select name="cata" id="" class="form-control">
                                <option value="Python">Python</option>
                                <option value="Java">Java</option>
                                <option value="c">c</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for=""> Ask question:</label><br>
                            <textarea rows="10" cols="20" name="ques" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="margin:10px;"> Submit </button>
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