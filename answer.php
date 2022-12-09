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

    <div class="mid">
        <div class="container-fluid"> 
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="form-size">
                        <h1>Submit your Answer:</h1>
                        <form action="answer1.php" method="post">
                            <div class="form-group">
                                <?php if (isset($_GET["quesId"])){$id=$_GET["quesId"];}?>
                                <input type="hidden" name="qId" value="<?php echo $id ;?>">
                                <label for="">Answer:</label><br>
                                <textarea rows="10" cols="20" name="answ" class="form-control"></textarea>
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
    <div>
            
        <h3>Other Replies:-</h3>
        <div class="answer">
            <?php
            session_start();
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
            $user=$_SESSION["loginuser"];
            //echo $user;
            // Get most vote answer
            /**$AnsCount="SELECT count(answer) as count FROM answer WHERE  question_id='$id' ";
            $resultsAnsCount=$conn->query($AnsCount);
            if($resultsAnsCount->num_rows==1){
                $rowAnsCount=$resultsAnsCount->fetch_assoc();
                echo $rowAnsCount['count'];
                $count=$rowAnsCount['count'];
            }**/
    
                // get answer with out oder
            $sqlAns="SELECT answer.*,count(vote.vote) AS vcount
            FROM answer LEFT JOIN vote 
            ON answer.answer_id=vote.answer_id 
            WHERE answer.question_id=$id 
            GROUP BY answer.answer_id ORDER BY  vcount DESC;";
            $resultAns=$conn->query($sqlAns);
            if($resultAns->num_rows>0){
                while($rowAns=$resultAns->fetch_assoc()){
                    echo "No: ".$rowAns["answer_id"]."<br>";
                    echo "<b>Answer: </b>: ".$rowAns["answer"]."<br>";
                    echo "Date: ".$rowAns["subdate"]."<br>";
                    echo "<div>
                            <form action='voteanswer.php?user=$user&quesId=$id&ansId=$rowAns[answer_id]' method='post'>
                                <button type='submit'class='btn btn-success' name='vote1' value='1'> Up</button>
                                <button type='submit'class='btn btn-warning' name='vote2' value='0'> Down</button>
                            </form>
                        </div>";
                    echo "<hr>";
                }
            }else {
                $sqlAns2="SELECT * FROM answer WHERE question_id=$id  ";
                $resultAns2=$conn->query($sqlAns2);
                if($resultAns2->num_rows>0){
                    while($rowAns2=$resultAns2->fetch_assoc()){
                        echo "No: ".$rowAns2["answer_id"]."<br>";
                        echo "<b>Answer: </b>: ".$rowAns2["answer"]."<br>";
                        echo "Date: ".$rowAns2["subdate"]."<br>";
                        echo "<div>
                            <form action='voteanswer.php?user=$user&quesId=$id&ansId=$rowAns2[answer_id]' method='post'>
                                <button type='submit'class='btn btn-success' name='vote1' value='1'> Up</button>
                                <button type='submit'class='btn btn-warning' name='vote2' value='0'> Down</button>
                            </form>
                            </div>";
                        echo "<hr>";
                    }
                }
            }                   
            $conn->close();    
            ?>
        </div>
    </div>
    <div class="bottom">

    </div>

</body>
</html>