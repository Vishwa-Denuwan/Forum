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
           // $sql="SELECT answer_id,count(vote) as mostval FROM vote WHERE  question_id='$id' GROUP BY answer_id order by mostval desc";
           $sql="SELECT answer_id,answer,subdate, MAX(vote) as mostval FROM answer WHERE question_id=$id GROUP BY answer_id ORDER BY mostval desc";
           $result=$conn->query($sql);
           if($result->num_rows>0){
                try{
                    while($row=$result->fetch_assoc()){
                        echo "No: ".$row["answer_id"]."<br>";
                        echo "<b>Answer: </b>: ".$row["answer"]."<br>";
                        echo "Date: ".$row["subdate"]."<br>";
                        echo "<div>
                                    <form action='voteanswer.php?quesId=$id&ansId=$row[answer_id]' method='post'>
                                        <button type='submit'class='btn btn-success' name='vote1' value='1'> Up</button>
                                        <button type='submit'class='btn btn-warning' name='vote2' value='-1'> Down</button>
                                    </form>
                            </div>";
                        echo "<hr>";
                    }
                } catch(Exception $e){
                    echo $e->getMessage();
                }
            }  $sqlUp="SELECT answer_id,count(vote) as mostval FROM vote WHERE  question_id='$id' GROUP BY answer_id order by mostval desc";
            $resultUp=$conn->query($sqlUp);
            $sqlDown="SELECT answer_id,count(vote) as mostval FROM vote WHERE  question_id='$id' GROUP BY answer_id order by mostval desc";
            $resultDown=$conn->query($sqlDown);
            if($resultDown===TRUE && $resultDown->num_rows>0){

            }else{
                // get answer with out oder
                $sqlAns="SELECT answer_id,answer,subdate FROM answer WHERE question_id=$id";
                $resultAns=$conn->query($sqlAns);
                if($resultAns->num_rows>0){
                    while($rowAns=$resultAns->fetch_assoc()){
                        echo "No: ".$rowAns["answer_id"]."<br>";
                        echo "<b>Answer: </b>: ".$rowAns["answer"]."<br>";
                        echo "Date: ".$rowAns["subdate"]."<br>";
                        echo "<div>
                                    <form action='voteanswer.php?user=$user&quesId=$id&ansId=$rowAns[answer_id]' method='post'>
                                        <button type='submit'class='btn btn-success' name='vote1' value='1'> Up</button>
                                        <button type='submit'class='btn btn-warning' name='vote2' value='-1'> Down</button>
                                    </form>
                            </div>";
                        echo "<hr>";
                    }
                }  
            }
            $conn->close();    
            ?>

























$Ans="SELECT * FROM answer WHERE  question_id='$id' ";
            $resultsAns=$conn->query($Ans);
            if($resultsAns->num_rows>0){
                while($rowAns=$resultsAns->fetch_array()){
                    $ansId=$rowAns['answer_id'];
                    $count1="SELECT question_id,answer_id,count(vote) as ValueFrequency FROM vote WHERE vote=1 group by question_id,answer_id order by ValueFrequency desc";
        
                }
            }






























































































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
            float:;
        }
        .bg-top{
            background-color:#999966;
            width:auto;
            height:50px;
            margin:3px;
            padding:10px;
            float:right;
        }
        .bg-bottom{
            background-color:#999966;
            width:auto;
            height:200px;
            margin:10px;
            padding:3px;
            color:white;
        }
        .bg-middle{
            background-color:#999966;
            width:auto;
            height:500px;
            margin:10px;
            padding:3px;
        }
        .bg-topic{
            background-color:#999966;
            width:auto;
            height:200px;
            margin:10px;
            padding:3px;
        }
        a{
            text-decoration:none;
        }
        .form-size{
            width: 500px;
            height: 400px;
            background-color:white;
            margin:5px;
            padding:5px;
            border-radius:4px;
        }
        .top{
            display:inline;
           
        }
        h1{
            font-family:"Times New Roman",Times,serif;
            color:#e6ac00;
            text-align:center;
            margin-top:50px;
            margin-bottom:50px;
            font-size:100px;
            text-shadow:2px 2px 4px #000000;
        }
       
       .flex-container{
           display:flex;
           align-items:stretch;
           background-color:#999966;
           justify-content:flex-end;
       }
       .flex-container>div{
           background-color:#e6ac00;
           color:black;
           text-align:center;
           margin:30px;
           border-radius:10px;
           box-shadow:5px 5px 5px #664d00;
           width:600px;
           height:440px;
           
       }
       .button{
            background-color:#009933;
            border-Radius:10px;
            width:100px;
            height:50px;
            font-size:30px;
       }
       .intro{
           float:left;
           color:white;
           margin:0px 0px 0px 100px;
           font-size:50px;
           font-family: "Lucida Console", "Courier New", monospace;

       }

        
    </style>
</head>
<body>
    <header>
    
            
        <ul>
            <li class="top"><button class="btn btn-primary" ><a href="userRegistation.php" style="color:white;" >Sign Up</a></button></li>
            <li class="top"><button class="btn btn-primary" ><a href="loginform.php" style="color:white;" >Login</a></button></li>
        </ul>
        
    </header>
    <div class="container-fluid">
        <div class="bg-topic">
            <div>
                <h1> ABC forum</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="bg-middle  flex-container">
            <div>
                <h2>Hello ...</h2>
                <br>
                <br>
                <h3>Now You Can Register In ABC Forum..</h3>
                <button class="button">
                    <a href="userRegistation.php">Register Now</a>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="bg-bottom">
            <h2>hfduhfjdsbfjsdhf djfbdjbfjdnf jdbjdcjdncj</h2>
        </div>
    </div>



</body>
</html>