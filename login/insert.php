<?php  
	$db = mysqli_connect('localhost', 'id12999702_pritam', 'rise123', 'id12999702_online')
	or die("Sorry!It cannot connect to mysql database");
$qid=$_POST['qid'];
$qn=$_POST['qn'];
 $answer_id  = $_POST['answer'];
      $result=mysqli_query($db,"INSERT INTO checking1(qid,qn,quizcheck) 
            VALUES('$qid','$qn','$answer_id')") or die("Failed".mysql_error());
 ?>  