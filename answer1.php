<?php
    session_start();
    $serverName="localhost";
    $userName="root";
    $password="";
    $dbName="forum";
    if((isset($_POST["qId"])||$_POST["qId"])||(isset($_POST["answ"])||$_POST["answ"])){
        $quesId=$_POST["qId"];
        $answer=$_POST["answ"];
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
        $sql="INSERT INTO answer(answer_id,user_id,question_id,subdate,answer)
        VALUES('','$UId','$quesId',now(),'$answer')";
        if ($conn->query($sql)===True){
            echo"New recode created";
        }else{
            echo "error".$sql."<br>".$conn->error;
        }
        $conn->close();
        }
?>