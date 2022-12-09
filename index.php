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
            padding:20px 0px 20px 10px;
            text-align:center;
            font-size:50px;
        }
        .display{
            display:inline;
        }
        .register{
            width:200px;
            height:100px;
            float:right;
            margin:20px;
            border-radius:50%;
            text-align:center;
            padding:20px;
            background-color:#9BB7D4;
        }
        .about{
            background-color:#3e4444;
            width:500px;
            height:550px;
            border-radius:10px;
            margin:8px;
            color:#ffffff;
            
        }
        .reg{
            background-color:#F5DF4D;
            width:600px;
            height:300px;
            float:right;
            margin-top:70px;
            margin-right:100px;
            margin-bottom:200px;
            margin-left:400px;
            border-radius:10px;
            box-shadow:0px 4px  2px 4px rgba(0,0,0,0.4);

        }
        .bottom{
            background-color:#3e4444;
            padding:20px 0px 20px 10px;
            height:120px;
        }

    </style>
</head>
<body>
    <div class="header ">
        <div>
            <h1>ABC Forum</h1>
        </div>
        <div class="btn-group btn-group-lg">
            <button class="btn btn-primary"><a href="userRegistation.php" style="color:white; text-decoration:none;">Sign Up</a></button>
            <button class="btn btn-primary"><a href="loginform.php" style="color:white; text-decoration:none;">Login</a></button>
        </div>

    </div>
    <div class=" container-fluid mid">
        <div class="display" >
            <div class="register" ><h1>Go </h1></div>
            <div class="register" ><h1>java</h1></div>
            <div class="register" ><h1>C</h1></div>
            <div class="register" ><h1>Python</h1></div>
        </div>
        <div class="reg"></div>
        <div class="about"><h2>Welcome....</h2></div>
    </div>
    <div class="bottom">

    </div>
</body>
</html>