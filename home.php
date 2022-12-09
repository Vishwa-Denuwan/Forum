<?
session_start();
if(!isset($_SESSION["loginuser"])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
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
            height:600px;
            padding:100px;
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
        .register{
            width:300px;
            height:200px;
            margin:20px;
            text-align:center;
            align:left;
            padding:40px 20px 40px 20px;
            background-color:#9BB7D4;
            font-size:50px;
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
    <div class="mid">
        <div class="register">
            <a href="question.php" style="color:black; text-decoration:none;">Ask Question</a>
        </div>
        <div class="register">
            <a href="reply.php" style="color:black; text-decoration:none;">Question</a>
        </div>
        <div>
            
        </div>

    </div>
    <div class="bottom">

    </div>
</body>
</html>