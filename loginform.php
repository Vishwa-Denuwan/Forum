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
            height: 360px;
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
        </div>

    </div>
    <div class="mid">
        <div class="container-fluid">   
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-size">
                    <h1>LOGIN</h1>
                    <form action="loginforum.php" method="post">
                        <div class="form-group">
                            <label for="">User Name:</label>
                            <br>
                            <input type="text"  name="uname" placeholder="Enter User Name" class="form-control">
                        </div>
                        <div  class="form-group">
                            <label for="">Password:</label>
                            <br>
                            <input type="password" name="pass1" placeholder="Enter User Name" class="form-control">
                        </div>
                        <div  class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary" style="margin:10px;"> Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">

    </div>
</body>
</html>